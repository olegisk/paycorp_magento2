<?php

namespace Paycorp\Payments\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Payment\Helper\Data as PaymentHelper;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\ObjectManager;

use Paycorp\Payments\Model\Method\Cc as PaymentMethod;
use Paycorp\Payments\Model\Method\Promotion as PromotionPaymentMethod;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \Magento\Framework\App\State
     */
    private $appState;

    /**
     * @var \Magento\Checkout\Helper\Data
     */
    private $checkoutHelper;

    /**
     * @var PaymentHelper
     */
    private $paymentHelper;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Checkout\Helper\Data $checkoutHelper
     * @param PaymentHelper $paymentHelper
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        PaymentHelper $paymentHelper,
        UrlInterface $urlBuilder
    ) {
        $this->appState = $context->getAppState();
        $this->checkoutHelper = $checkoutHelper;
        $this->paymentHelper = $paymentHelper;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        try {
            /** @var PaymentMethod $method */
            $method = $this->paymentHelper->getMethodInstance(PaymentMethod::METHOD_CODE);
            if ($method->isAvailable()) {
                $redirectUrl = $method->getCheckoutRedirectUrl();
            } else {
                $redirectUrl = null;
            }
        } catch (\Exception $e) {
            $redirectUrl = null;
        }

        try {
            /** @var PromotionPaymentMethod $method */
            $method = $this->paymentHelper->getMethodInstance(PromotionPaymentMethod::METHOD_CODE);
            if ($method->isAvailable()) {
                $redirectUrlPromotion = $method->getCheckoutRedirectUrl();
            } else {
                $redirectUrlPromotion = null;
            }
        } catch (\Exception $e) {
            $redirectUrlPromotion = null;
        }

        return [
            'payment' => [
                PaymentMethod::METHOD_CODE => [
                    'redirect_url' => $redirectUrl
                ],
                PromotionPaymentMethod::METHOD_CODE => [
                    'redirect_url' => $redirectUrlPromotion
                ],
            ],
        ];
    }
}
