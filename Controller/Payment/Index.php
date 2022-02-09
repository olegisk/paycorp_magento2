<?php

namespace Paycorp\Payments\Controller\Payment;

use Magento\Framework\App\Action\Action;

class Index extends Action
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
     * Payment constructor.
     *
     * @param \Magento\Framework\App\Action\Context       $context
     * @param \Magento\Framework\View\Result\PageFactory  $resultPageFactory
     * @param \Magento\Checkout\Helper\Data               $checkoutHelper
     * @param \Magento\Sales\Model\OrderFactory           $orderFactory
     * @param \Paycorp\Payments\Helper\Data               $helper
     * @param \Magento\Sales\Model\Service\InvoiceService $invoiceService
     * @param \Magento\Framework\DB\Transaction           $dbTransaction
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Paycorp\Payments\Helper\Data $helper,
        \Magento\Sales\Model\Service\InvoiceService $invoiceService,
        \Magento\Framework\DB\Transaction $dbTransaction
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
    }

    public function execute()
    {
        $session = $this->checkoutHelper->getCheckout();

        // Load Order
        $incrementId = $session->getLastRealOrderId();
        $order       = $this->orderFactory->create()->loadByIncrementId($incrementId);
        if ( ! $order->getId()) {
            $this->checkoutHelper->getCheckout()->restoreQuote();
            $this->messageManager->addError(__('No order for processing found'));
            $this->_redirect('checkout/cart');

            return;
        }

        /** @var \Magento\Payment\Model\Method\AbstractMethod $method */
        $method = $order->getPayment()->getMethodInstance();

        $currency_code = $order->getOrderCurrency()->getCurrencyCode();
        $amount        = $order->getGrandTotal();

        try {
            $clientConfig = new \ClientConfig();
            $clientConfig->setServiceEndpoint($method->getConfigData('pg_domain'));
            $clientConfig->setAuthToken($method->getConfigData('auth_token'));
            $clientConfig->setHmacSecret($method->getConfigData('hmac_secret'));
            $clientConfig->setValidateOnly(false);

            $client = new \GatewayClient($clientConfig);

            $initRequest = new \PaymentInitRequest();
            $initRequest->setClientId($method->getConfigData('client_id'));
            $initRequest->setTransactionType($method->getConfigData('transaction_type'));
            $initRequest->setClientRef($incrementId);
            $initRequest->setComment('');
            $initRequest->setTokenize(false);
            //$initRequest->setExtraData(array('msisdn' => $msisdn));

            $transactionAmount = new \TransactionAmount(intval($amount * 100));
            //$transactionAmount->setTotalAmount(intval($amount * 100));
            $transactionAmount->setServiceFeeAmount(0);
            $transactionAmount->setPaymentAmount(intval($amount * 100));
            $transactionAmount->setCurrency($currency_code);
            $initRequest->setTransactionAmount($transactionAmount);

            $redirect = new \Redirect();
            $redirect->setReturnUrl($this->urlBuilder->getUrl('paycorp/payment/success', [
                '_secure' => $this->getRequest()->isSecure()
            ]));
            $redirect->setReturnMethod('GET');
            $initRequest->setRedirect($redirect);

            //$initResponse = $client->getPayment()->init( $initRequest );
            $initResponse = $client->payment()->init($initRequest);
        } catch (\Exception $e) {
            // Cancel order
            $message = $e->getMessage();

            $order->addStatusHistoryComment($message);
            $this->helper->cancelOrCloseOrder($order);
            $session->restoreQuote();
            $this->messageManager->addError($message);
            $this->_redirect('checkout/cart');

            return;
        }

        // Redirect to Paycorp
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($initResponse->getPaymentPageUrl());

        return $resultRedirect;

        // Redirect to Success page
        //$this->checkoutHelper->getCheckout()->getQuote()->setIsActive(false)->save();
        //$this->_redirect('checkout/onepage/success');
    }
}
