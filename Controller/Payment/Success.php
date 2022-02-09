<?php

namespace Paycorp\Payments\Controller\Payment;

use Magento\Framework\App\Action\Action;
use Magento\Sales\Model\Order\Payment\Transaction;

class Success extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Checkout\Helper\Data
     */
    protected $checkoutHelper;

    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * @var \Paycorp\Payments\Helper\Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Sales\Model\Service\InvoiceService
     */
    protected $invoiceService;

    /**
     * @var \Magento\Framework\DB\Transaction
     */
    protected $dbTransaction;

    /**
     * @var \Magento\Sales\Api\TransactionRepositoryInterface
     */
    protected $transactionRepository;

    /**
     * @var \Magento\Sales\Model\Order\Email\Sender\OrderSender
     */
    protected $orderSender;

    /**
     * Payment constructor.
     *
     * @param \Magento\Framework\App\Action\Context       $context
     * @param \Magento\Framework\View\Result\PageFactory  $resultPageFactory
     * @param \Magento\Checkout\Helper\Data               $checkoutHelper
     * @param \Magento\Sales\Model\OrderFactory           $orderFactory
     * @param \Paycorp\Payments\Helper\Data               $helper
     * @param \Magento\Sales\Model\Service\InvoiceService $invoiceService
     * @param \Magento\Framework\DB\Transaction           $dbTransaction
     * @param \Magento\Sales\Api\TransactionRepositoryInterface $transactionRepository
     * @param \Magento\Sales\Model\Order\Email\Sender\OrderSender $orderSender
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Paycorp\Payments\Helper\Data $helper,
        \Magento\Sales\Model\Service\InvoiceService $invoiceService,
        \Magento\Framework\DB\Transaction $dbTransaction,
        \Magento\Sales\Api\TransactionRepositoryInterface $transactionRepository,
        \Magento\Sales\Model\Order\Email\Sender\OrderSender $orderSender
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);

        $this->checkoutHelper = $checkoutHelper;
        $this->orderFactory = $orderFactory;

        $this->helper = $helper;
        $this->urlBuilder = $context->getUrl();
        $this->invoiceService = $invoiceService;
        $this->dbTransaction = $dbTransaction;
        $this->transactionRepository = $transactionRepository;
        $this->orderSender = $orderSender;
    }

    public function execute()
    {
        $session = $this->checkoutHelper->getCheckout();

        // Load Order
        $incrementId = $session->getLastRealOrderId();
        $order       = $this->orderFactory->create()->loadByIncrementId($incrementId);
        if (!$order->getId()) {
            $this->checkoutHelper->getCheckout()->restoreQuote();
            $this->messageManager->addError(__('No order for processing found'));
            $this->_redirect('checkout/cart');

            return;
        }

        /** @var \Magento\Payment\Model\Method\AbstractMethod $method */
        $method = $order->getPayment()->getMethodInstance();

        $clientConfig = new \ClientConfig();
        $clientConfig->setServiceEndpoint($method->getConfigData('pg_domain'));
        $clientConfig->setAuthToken($method->getConfigData('auth_token'));
        $clientConfig->setHmacSecret($method->getConfigData('hmac_secret'));

        $client = new \GatewayClient($clientConfig);

        $completeRequest = new \PaymentCompleteRequest();
        $completeRequest->setClientId($method->getConfigData('client_id'));
        $completeRequest->setReqid($_GET['reqid']);

        $completeResponse = $client->payment()->complete($completeRequest);

        $response_code = $completeResponse->getResponseCode();
        $transaction_id = $completeResponse->getTxnReference();

        $incrementId = $completeResponse->getClientRef();
        /* $order = $this->orderFactory->create()->loadByIncrementId($incrementId);
        if (!$order->getId()) {
            $this->checkoutHelper->getCheckout()->restoreQuote();
            $this->messageManager->addError(__('No order for processing found'));
            $this->_redirect('checkout/cart');

            return;
        } */

        switch ($response_code) {
            case '00':
                // Payment is success
                $message = sprintf('Transaction success. Transaction ID: %s. ', $transaction_id);

                // Change order status
                $orderState = \Magento\Sales\Model\Order::STATE_PROCESSING;
                $orderStatus = $order->getConfig()->getStateDefaultStatus($orderState);
                $order->setData('state', $orderState);
                $order->setStatus($orderStatus);
                $order->addStatusHistoryComment($message, $orderStatus);

                // Check Transaction is already registered
                $trans = $this->transactionRepository->getByTransactionId(
                    $transaction_id,
                    $order->getPayment()->getId(),
                    $order->getId()
                );

                // Register Transaction
                if (!$trans) {
                    $order->getPayment()->setTransactionId($transaction_id);
                    $trans = $order->getPayment()->addTransaction(Transaction::TYPE_PAYMENT, null, true);
                    $trans->setIsClosed(0);
                    //$trans->setAdditionalInformation(Transaction::RAW_DETAILS, $transaction);
                    $trans->save();

                    // Set Last Transaction ID
                    $order->getPayment()->setLastTransId($transaction_id)->save();
                }

                $invoice = $this->helper->makeInvoice($order, [], false);
                $invoice->setTransactionId($transaction_id);
                $invoice->save();

                $order->save();

                // Send order notification
                try {
                    $this->orderSender->send($order);
                } catch (\Exception $e) {
                    $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                }

                // Redirect to Success Page
                $this->checkoutHelper->getCheckout()->getQuote()->setIsActive(false)->save();
                $this->_redirect('checkout/onepage/success');
                break;
            default:
                $message = sprintf('Transaction failed. Transaction ID: %s. Code: %s', $transaction_id, $response_code);

                // Cancel order
                $order->cancel();
                $order->addStatusHistoryComment($message);
                $order->save();

                $this->checkoutHelper->getCheckout()->restoreQuote();
                $this->messageManager->addError($message);
                $this->_redirect('checkout/cart');
                break;
        }
    }
}
