<?php

class SettlementRecord {
    private $customerId;
    private $clientId;
    private $merchantId;
    private $settlementDate;
    private $creditCardType;
    private $settledAmount;
    private $approvedAmount;
    private $approvedCount;
    private $refundedAmount;
    private $refundedCount;
    
    public function  getCreditCardType() {
        return $this-> creditCardType;
    }

    public function  setCreditCardType($creditCardType) {
        $this->creditCardType = $creditCardType;
    }

    public function  getClientId() {
        return $this-> clientId;
    }

    public function  setClientId($clientId) {
        $this->clientId = $clientId;
    }

    public function  getCustomerId() {
        return $this-> customerId;
    }

    public function  setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    public function  getMerchantId() {
        return $this-> merchantId;
    }

    public function  setMerchantId($merchantId) {
        $this->merchantId = $merchantId;
    }

    public function getSettlementDate() {
        return $this-> settlementDate;
    }

    public function  setSettlementDate($settlementDate) {
        $this->settlementDate = $settlementDate;
    }

    public function  getSettledAmount() {
        return $this-> settledAmount;
    }

    public function  setSettledAmount($settledAmount) {
        $this->settledAmount = $settledAmount;
    }

    public function  getApprovedAmount() {
        return $this-> approvedAmount;
    }

    public function  setApprovedAmount($approvedAmount) {
        $this->approvedAmount = $approvedAmount;
    }

    public function  getApprovedCount() {
        return $this-> approvedCount;
    }

    public function  setApprovedCount($approvedCount) {
        $this->approvedCount = $approvedCount;
    }

    public function  getRefundedAmount() {
        return $this-> refundedAmount;
    }

    public function  setRefundedAmount($refundedAmount) {
        $this->refundedAmount = $refundedAmount;
    }

    public function getRefundedCount() {
        return $this-> refundedCount;
    }

    public function  setRefundedCount($refundedCount) {
        $this->refundedCount = $refundedCount;
    }
}
