/*browser:true*/
/*global define*/
define(
    [
        'jquery',
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/action/place-order',
        'Magento_Checkout/js/action/select-payment-method',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Magento_Checkout/js/model/quote',
        'Magento_Customer/js/customer-data',
        'Magento_Checkout/js/model/full-screen-loader'
    ],
    function (
        $,
        Component,
        placeOrderAction,
        selectPaymentMethodAction,
        additionalValidators,
        quote,
        customerData,
        fullScreenLoader
    ) {
        'use strict';

        return Component.extend({
            defaults: {
                self: this,
                template: 'Paycorp_Payments/payment/promotion'
            },
            redirectAfterPlaceOrder: false,

            /** Redirect to Paycorp */
            placeOrder: function () {
                if (additionalValidators.validate()) {
                    var self = this;
                    selectPaymentMethodAction(this.getData());
                    placeOrderAction(self.getData(), self.messageContainer).done(function () {
                        fullScreenLoader.startLoader();
                        customerData.invalidate(['cart']);
                        $.mage.redirect(window.checkoutConfig.payment.paycorp_promotion.redirect_url);
                    });

                    return false;
                }
            }
        });
    }
);
