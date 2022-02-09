<?php

class UpdateCardResponse {

    private $responseCode;
    private $responseText;
    private $completed;
    private $authResponseCode;
    private $authResponseText;
    private $authTxnRef;

    public function __construct() {
        
    }

    public function getResponseCode() {
        return $this->responseCode;
    }

    public function setResponseCode($responseCode) {
        $this->responseCode = $responseCode;
    }

    public function getResponseText() {
        return $this->responseText;
    }

    public function setResponseText($responseText) {
        $this->responseText = $responseText;
    }
	
	public function getCompleted() {
        return $this->completed;
    }

    public function setCompleted($completed) {
        $this->completed = $completed;
    }
    
    public function getAuthResponseText(){
        return $this->authResponseText;
    }
    
    public function setAuthResponseText($authResponseText){
        $this->authResponseText = $authResponseText;
    }
    
    public function getAuthResponseCode(){
        return $this->authResponseCode;
    }
    
    public function setAuthResponseCode($authResponseCode){
        $this->authResponseCode = $authResponseCode;
    }
    
    public function getAuthTxnRef(){
        return $this->authTxnRef;
    }
    
    public function setAuthTxnRef($authTxnRef){
        $this->authTxnRef = $authTxnRef;
    }

}
