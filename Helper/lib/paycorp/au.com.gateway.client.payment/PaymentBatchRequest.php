<?php

class PaymentBatchRequest {
    
    private $batchComment;
    private $processAt;
    private $batchClientRef;
    private $creditTransactions;
    
    public function  getBatchComment() {
        return $this->batchComment;
    }

    public function  setBatchComment($batchComment) {
        $this->batchComment = $batchComment;
    }

    public function  getProcessAt() {
        return $this->processAt;
    }
    
    public function  setProcessAt($processAt) {
        $this->processAt = $processAt;
    }

    public function  getBatchClientRef() {
        return $this->batchClientRef;
    }

    public function  setBatchClientRef($batchClientRef) {
        $this->batchClientRef = $batchClientRef;
    }

    public function  getCreditTransactions() {
        return $this->creditTransactions;
    }

    public function  setCreditTransactions($creditTransactions) {
        $this->creditTransactions = $creditTransactions;
    }
}
