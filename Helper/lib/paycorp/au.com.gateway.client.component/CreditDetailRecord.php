<?php

class CreditDetailRecord {

    private $txnReference;
    private $transactionType;
    private $clientId;
    private $customerId;
    private $responseCode;
    private $responseText;
    private $authCode;
    private $creditCardNumber;
    private $creditCardExpiry;
    private $creditCardType;
    private $creditCardHolderName;
    private $terminalType;
    private $settlementDate;
    private $eventTime;
    private $terminalId;
    private $merchantId;
    private $stan;
    private $comment;
    private $clientRef;
    private $paymentAmount;
    private $currency;
    //private $refundedAmount;
    private $batchReference;
    private $originalTxnReference;
    //private $relatedTxnReference;
    
    
    public function  getTxnReference() {
        return $this->txnReference;
    }

    public function  setTxnReference($txnReference) {
        $this->txnReference = $txnReference;
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

    public function  getResponseCode() {
        return $this-> responseCode;
    }

    public function  setResponseCode($responseCode) {
        $this->responseCode = $responseCode;
    }

    public function  getResponseText() {
        return $this-> responseText;
    }

    public function  setResponseText($responseText) {
        $this->responseText = $responseText;
    }

    public function  getAuthCode() {
        return $this-> authCode;
    }

    public function  setAuthCode($authCode) {
        $this->authCode = $authCode;
    }

    public function  getCurrency() {
        return $this-> currency;
    }

    public function  setCurrency($currency) {
        $this->currency = $currency;
    }

    public function  getCreditCardNumber() {
        return $this-> creditCardNumber;
    }

    public function  setCreditCardNumber($creditCardNumber) {
        $this->creditCardNumber = $creditCardNumber;
    }

    public function  getCreditCardExpiry() {
        return $this-> creditCardExpiry;
    }

    public function  setCreditCardExpiry($creditCardExpiry) {
        $this->creditCardExpiry = $creditCardExpiry;
    }

    public function  getCreditCardType() {
        return $this-> creditCardType;
    }

    public function  setCreditCardType($creditCardType) {
        $this->creditCardType = $creditCardType;
    }

    public function  getCreditCardHolderName() {
        return $this-> creditCardHolderName;
    }

    public function  setCreditCardHolderName($creditCardHolderName) {
        $this->creditCardHolderName = $creditCardHolderName;
    }

    public function  getTerminalType() {
        return $this-> terminalType;
    }

    public function  setTerminalType($terminalType) {
        $this->terminalType = $terminalType;
    }

    public function  getSettlementDate() {
        return $this-> settlementDate;
    }

    public function  setSettlementDate($settlementDate) {
        $this->settlementDate = $settlementDate;
    }

    public function getEventTime() {
        return $this-> eventTime;
    }

    public function  setEventTime($eventTime) {
        $this->eventTime = $eventTime;
    }

    public function  getTerminalId() {
        return $this-> terminalId;
    }

    public function  setTerminalId($terminalId) {
        $this->terminalId = $terminalId;
    }

    public function  getMerchantId() {
        return $this-> merchantId;
    }

    public function  setMerchantId($merchantId) {
        $this->merchantId = $merchantId;
    }

    public function  getStan() {
        return $this-> stan;
    }

    public function  setStan($stan) {
        $this->stan = $stan;
    }

    public function  getComment() {
        return $this-> comment;
    }

    public function  setComment($comment) {
        $this->comment = $comment;
    }

    public function  getClientRef() {
        return $this-> clientRef;
    }

    public function  setClientRef($clientRef) {
        $this->clientRef = $clientRef;
    }

    public function  getPaymentAmount() {
        return $this-> paymentAmount;
    }

    public function  setPaymentAmount($paymentAmount) {
        $this->paymentAmount = $paymentAmount;
    }

    public function  getTransactionType() {
        return $this-> transactionType;
    }

    public function  setTransactionType($transactionType) {
        $this->transactionType = $transactionType;
    }

    public function  getBatchReference() {
        return $this-> batchReference;
    }

    public function  setBatchReference($batchReference) {
        $this->batchReference = $batchReference;
    }

    public function  getOriginalTxnReference() {
        return $this-> originalTxnReference;
    }

    public function  setOriginalTxnReference($originalTxnReference) {
        $this->originalTxnReference = $originalTxnReference;
    }
}
