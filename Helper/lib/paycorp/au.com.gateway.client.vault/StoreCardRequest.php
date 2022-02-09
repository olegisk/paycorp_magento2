<?php

class StoreCardRequest {

    private $clientId;
    private $clientRef;
    private $creditCard;
    private $comment;
    private $extraData;

    public function __construct() {
        
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    public function getClientRef() {
        return $this->clientRef;
    }

    public function setClientRef($clientRef) {
        $this->clientRef = $clientRef;
    }

    public function getCreditCard() {
        return $this->creditCard;
    }

    public function setCreditCard($creditCard) {
        $this->creditCard = $creditCard;
    }
    
     public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function getExtraData() {
        return $this->extraData;
    }

    public function setExtraData($extraData) {
        $this->extraData = $extraData;
    }

}
