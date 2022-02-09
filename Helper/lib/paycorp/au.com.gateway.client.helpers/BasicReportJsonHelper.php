<?php

class BasicReportJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        
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
        $dateType = $requestData->getDateType();
        $customerId = $requestData->getCustomerId();
        $clientIds = $requestData->getClientIds();
        $batchReference = $requestData->getBatchReference();
        $creditCardNumber = $requestData->getCreditCardNumber();
        $creditCardExpiry = $requestData->getCreditCardExpiry();
        $creditCardTypes = $requestData->getCreditCardTypes();
        $txnReference = $requestData->getTxnReference();
        $transactionTypes = $requestData->getTransactionTypes();
        $responseCodes = $requestData->getResponseCodes();
        $clientRef = $requestData->getClientRef();
        $minAmount = $requestData->getMinAmount();
        $maxAmount = $requestData->getMaxAmount();
        $resultsetSize = $requestData->getResultsetSize();

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
                "creditCardNumber" => "$creditCardNumber",
                "creditCardExpiry" => "$creditCardExpiry",
                "creditCardTypes" => $creditCardTypes,
                "transactionTypes" => $transactionTypes,
                "responseCodes" => $responseCodes,
                "batchReference" => "$batchReference",
                "txnReference" => "$txnReference",
                "clientRef" => "$clientRef",
                "minAmount" => $minAmount,
                "maxAmount" => $maxAmount,
                "resultsetSize" => $resultsetSize
            )
        );
    }

}
