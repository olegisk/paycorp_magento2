<?php

class AmexWalletCompleteResponse {
    
    private $reqid;
    
    public function getReqid() {
        return $this->reqid;
    }

    public function setReqid($reqid) {
        $this->reqid = $reqid;
    }

}
