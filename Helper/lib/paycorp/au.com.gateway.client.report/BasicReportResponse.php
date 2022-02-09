<?php

class BasicReportResponse {
    private $responseDate;
    private $creditDetailRecords;

    public function getResponseDate() {
        return $this->responseDate;
    }

    public function setResponseDate($responseDate) {
        $this->responseDate = $responseDate;
    }

    public function getCreditDetailRecords() {
        return $this->creditDetailRecords;
    }

    public function setCreditDetailRecords($creditDetailRecords) {
        $this->creditDetailRecords = $creditDetailRecords;
    }
}
