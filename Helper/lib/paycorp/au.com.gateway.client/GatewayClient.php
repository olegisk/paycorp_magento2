<?php
 
class GatewayClient {

    private $payment;
    private $vault;
    private $report;
    private $amexWallet;

    public function __construct(ClientConfig $config) {
        
        $this->payment = new Payment($config);
        $this->vault = new Vault($config);
        $this->report = new Report($config);
        $this->amexWallet = new AmexWallet($config);
    }

    public function payment() {
        return $this->payment;
    }

    public function vault() {
        
        return $this->vault;
    }

    public function report() {
        return $this->report;
    }
    
    public function amexWallet() {
        return $this->amexWallet;
    }

}
