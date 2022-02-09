<?php

final class AmexWallet extends BaseFacade {
   
    public function __construct($config) {
        parent::__construct($config);
    }
    
    public function init($request) {
        $amexWalletInitJsonHelper = new AmexWalletInitJsonHelper();
        return parent::process($request, Operation::$AMEX_WALLET_INIT, $amexWalletInitJsonHelper);
    }

    public function complete($request) {
        $paymentCompleteJsonHelper = new PaymentCompleteJsonHelper();
        return parent::process($request, Operation::$AMEX_WALLET_COMPLETE, $paymentCompleteJsonHelper);
    }
    
}
