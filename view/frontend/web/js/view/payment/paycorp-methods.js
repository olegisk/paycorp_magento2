define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'paycorp_cc',
                component: 'Paycorp_Payments/js/view/payment/method-renderer/paycorp-cc-method'
            },
            {
                type: 'paycorp_promotion',
                component: 'Paycorp_Payments/js/view/payment/method-renderer/paycorp-promotion-method'
            }
        );

        /** Add view logic here if needed */
        return Component.extend({});
    }
);
