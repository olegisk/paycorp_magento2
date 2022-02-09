<?php

class BasicReportRequest {
    private $fromDate;

    private $toDate;

    private $dateType;

    private $customerId;

    private $clientIds;

    private $batchReference;

    private $txnReference;

    private $transactionTypes;

    private $creditCardNumber;

    private $creditCardExpiry;

    private $creditCardTypes;

    private $responseCodes;

    private $clientRef;

    private $minAmount;

    private $maxAmount;

    protected $resultsetSize = 10;
    
    public function getFromDate() {
        return $this->fromDate;
    }

    public function setFromDate($fromDate) {
        $this->fromDate = $fromDate;
    }

    public function getToDate() {
        return $this->toDate;
    }

    public function setToDate($toDate) {
        $this->toDate = $toDate;
    }

    public function getDateType() {
        return $this->dateType;
    }

    public function setDateType($dateType) {
        $this->dateType = $dateType;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    public function  setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    public function getClientIds() {
        return $this->clientIds;
    }

    public function setClientIds($clientIds) {
        $this->clientIds = $clientIds;
    }

    public function getBatchReference() {
        return $this->batchReference;
    }

    public function setBatchReference($batchReference) {
        $this->batchReference = $batchReference;
    }

    public function  getCreditCardNumber() {
        return $this->creditCardNumber;
    }

    public function setCreditCardNumber($creditCardNumber) {
        $this->creditCardNumber = $creditCardNumber;
    }

    public function getCreditCardExpiry() {
        return $this->creditCardExpiry;
    }

    public function setCreditCardExpiry($creditCardExpiry) {
        $this->creditCardExpiry = $creditCardExpiry;
    }

    public function getCreditCardTypes() {
        return $this->creditCardTypes;
    }

    public function setCreditCardTypes($creditCardTypes) {
        $this->creditCardTypes = $creditCardTypes;
    }

    public function  getTxnReference() {
        return $this->txnReference;
    }

    public function setTxnReference($txnReference) {
        $this->txnReference = $txnReference;
    }

    public function getTransactionTypes() {
        return $this->transactionTypes;
    }

    public function setTransactionTypes($transactionTypes) {
        $this->transactionTypes = $transactionTypes;
    }

    public function getResponseCodes() {
        return $this->responseCodes;
    }

    public function setResponseCodes($responseCodes) {
        $this->responseCodes = $responseCodes;
    }

    public function getClientRef() {
        return $this->clientRef;
    }

    public function setClientRef($clientRef) {
        $this->clientRef = $clientRef;
    }

    public function getMinAmount() {
        return $this->minAmount;
    }

    public function setMinAmount($minAmount) {
        $this->minAmount = $minAmount;
    }

    public function getMaxAmount() {
        return $this->maxAmount;
    }

    public function setMaxAmount($maxAmount) {
        $this->maxAmount = $maxAmount;
    }

    public function getResultsetSize() {
        return $this->resultsetSize;
    }

    public function setResultsetSize($resultsetSize) {
        $this->resultsetSize = $resultsetSize;
    }
}
