<?php

class AmexWalletCompleteRequest {

    private $clientId;
    private $reqid;
    
    public function getClientId() {
        return $this->clientId;
    }

    public function getReqid() {
        return $this->reqid;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    public function setReqid($reqid) {
        $this->reqid = $reqid;
    }



}
