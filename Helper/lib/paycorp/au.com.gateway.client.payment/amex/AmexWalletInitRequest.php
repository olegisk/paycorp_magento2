<?php

class AmexWalletInitRequest {

    private $clientId;
    private $transactionType;
    private $transactionAmount;
    private $redirect;
    private $clientRef;
    private $comment;
    private $extraData;
    private $tokenize;
    private $tokenReference;
    private $shipToCountries;
    private $shippingMethods;
    
    public function getClientId() {
        return $this->clientId;
    }

    public function getTransactionType() {
        return $this->transactionType;
    }

    public function getTransactionAmount() {
        return $this->transactionAmount;
    }

    public function getRedirect() {
        return $this->redirect;
    }

    public function getClientRef() {
        return $this->clientRef;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getExtraData() {
        return $this->extraData;
    }

    public function getTokenize() {
        return $this->tokenize;
    }

    public function getTokenReference() {
        return $this->tokenReference;
    }

    public function getShipToCountries() {
        return $this->shipToCountries;
    }

    public function getShippingMethods() {
        return $this->shippingMethods;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    public function setTransactionType($transactionType) {
        $this->transactionType = $transactionType;
    }

    public function setTransactionAmount($transactionAmount) {
        $this->transactionAmount = $transactionAmount;
    }

    public function setRedirect($redirect) {
        $this->redirect = $redirect;
    }

    public function setClientRef($clientRef) {
        $this->clientRef = $clientRef;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setExtraData($extraData) {
        $this->extraData = $extraData;
    }

    public function setTokenize($tokenize) {
        $this->tokenize = $tokenize;
    }

    public function setTokenReference($tokenReference) {
        $this->tokenReference = $tokenReference;
    }

    public function setShipToCountries($shipToCountries) {
        $this->shipToCountries = $shipToCountries;
    }

    public function setShippingMethods($shippingMethods) {
        $this->shippingMethods = $shippingMethods;
    }



}
