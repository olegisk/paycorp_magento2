<?php

class SettlementReportJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        $settlementReportResponse = new SettlementReportResponse();
        $settlementReportResponse->setSettlementRecords($responseData["settlementRecords"]["customerId"]);
       
       
    }

    public function toJson($paycorpRequest) {
        $version = $paycorpRequest->getVersion();
        $msgId = $paycorpRequest->getMsgId();
        $operation = $paycorpRequest->getOperation();
        $requestDate = $paycorpRequest->getRequestDate();
        $validateOnly = $paycorpRequest->getValidateOnly();
        $requestData = $paycorpRequest->getRequestData();
        $fromDate = $requestData->getFromDate();
        $toDate = $requestData->getToDate();
        $customerId = $requestData->getCustomerId();
        $clientIds = $requestData->getClientIds();
        $groupBy = $requestData->getGroupBy();

        return array(
            "version" => "$version",
            "msgId" => "$msgId",
            "operation" => "$operation",
            "requestDate" => "$requestDate",
            "validateOnly" => $validateOnly,
            "requestData" => array(
                "fromDate" => $fromDate,
                "toDate" => $toDate,
                "customerId" => $customerId,
                "clientIds" => $clientIds,
                "groupBy" => "$groupBy"
            )
        );

    }

}
