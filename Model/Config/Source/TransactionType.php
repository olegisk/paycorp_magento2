<?php

namespace Paycrop\Payments\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

if (class_exists('\\Paycrop\\Payments\\Model\\Config\\Source\\TransactionType', false)) {
    //return;
}

class TransactionType implements ArrayInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function toOptionArray()
	{
		return [
			['value' => 'AUTHORISATION', 'label' => __('Authorization')],
			['value' => 'PURCHASE', 'label' => __('Purchase')]
		];
	}
}
