<?php

class SettlementReportResponse {
    
    private $responseDate;
    private $settlementRecords;

    public function getResponseDate() {
        return $this->responseDate;
    }

    public function setResponseDate($responseDate) {
        $this->responseDate = $responseDate;
    }

    public function getSettlementRecords() {
        return $this->settlementRecords;
    }

    public function setSettlementRecords($settlementRecords) {
        $this->settlementRecords = $settlementRecords;
    }
}
