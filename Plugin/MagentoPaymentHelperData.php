<?php

namespace Paycorp\Payments\Plugin;

class MagentoPaymentHelperData
{
    const XML_PATH_PAYMENT_METHODS = 'payment';

    /**
     * @var \Magento\Framework\App\Config\Initial
     */
    protected $_initialConfig;

    /**
     * Construct
     *
     * @param \Magento\Framework\App\Config\Initial $initialConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\Initial $initialConfig
    ) {
        $this->_initialConfig = $initialConfig;
    }

    public function aroundGetPaymentMethods(
        \Magento\Payment\Helper\Data $subject,
        \Closure $proceed
    ) {
        return $result = $this->_initialConfig->getData('default')[self::XML_PATH_PAYMENT_METHODS];

        $result['paycorp_cc1'] = [
             'active' => 1,
             'model' => 'Paycorp\Payments\Model\Method\Cc',
             'title' => 'XXXXXXXXXXX',
             'pg_domain' => 'http://ya.ru',
             'transaction_type' => 'PURCHASE',
             'allowspecific' => 0
        ];

        return $this->_initialConfig->getData('default')[self::XML_PATH_PAYMENT_METHODS];
    }
}
