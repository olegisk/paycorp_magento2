<?php

class SettlementReportRequest {
    private $fromDate;
    private $toDate;
    private $customerId;
    private $clientIds;
    private $groupBy = "CUSTOMER";
    
    public function getFromDate() {
        return $this->fromDate;
    }

    public function  setFromDate($fromDate) {
        $this->fromDate = $fromDate;
    }

    public function getToDate() {
        return $this->toDate;
    }

    public function  setToDate($toDate) {
        $this->toDate = $toDate;
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

    public function  setClientIds($clientIds) {
        $this->clientIds = $clientIds;
    }

    public function getGroupBy() {
        return $this->groupBy;
    }

    public function  setGroupBy($groupBy) {
        $this->groupBy = $groupBy;
    }
}
