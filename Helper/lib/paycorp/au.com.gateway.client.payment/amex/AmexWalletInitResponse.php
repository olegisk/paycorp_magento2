<?php

class AmexWalletInitResponse {

    private $buttonUrl;
    private $reqid;
    private $expireAt;
    
    public function getButtonUrl() {
        return $this->buttonUrl;
    }

    public function getReqid() {
        return $this->reqid;
    }

    public function getExpireAt() {
        return $this->expireAt;
    }

    public function setButtonUrl($buttonUrl) {
        $this->buttonUrl = $buttonUrl;
    }

    public function setReqid($reqid) {
        $this->reqid = $reqid;
    }

    public function setExpireAt($expireAt) {
        $this->expireAt = $expireAt;
    }



}
