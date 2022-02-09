<?php

class AmexWalletInitJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        $paymentInitResponse = new AmexWalletInitResponse();
        $paymentInitResponse->setButtonUrl($responseData["responseData"]["buttonUrl"]);
        $paymentInitResponse->setReqid($responseData["responseData"]["reqid"]);
        $paymentInitResponse->setExpireAt($responseData["responseData"]["expireAt"]);

        return $paymentInitResponse;
    }

    public function toJson($paycorpRequest) {
        $version = $paycorpRequest->getVersion();
        $msgId = $paycorpRequest->getMsgId();
        $operation = $paycorpRequest->getOperation();
        $requestDate = $paycorpRequest->getRequestDate();
        $validateOnly = $paycorpRequest->getValidateOnly();
        $requestData = $paycorpRequest->getRequestData();

        $clientId = $requestData->getClientId();
        $transactionType = $requestData->getTransactionType();
        $clientRef = $requestData->getClientRef();
        $tokenize = $requestData->getTokenize();

        $transactionAmount = $requestData->getTransactionAmount();
        $totalAmount = $transactionAmount->getTotalAmount();
        $paymentAmount = $transactionAmount->getPaymentAmount();
        $serviceFeeAmount = $transactionAmount->getServiceFeeAmount();
        $withholdingAmount = $transactionAmount->getWithHoldingAmount();
        $currency = $transactionAmount->getCurrency();

        $redirect = $requestData->getRedirect();
        $returnUrl = $redirect->getReturnUrl();
        $returnMethod = $redirect->getReturnMethod();

        return array(
            "version" => "$version",
            "msgId" => "$msgId",
            "operation" => "$operation",
            "requestDate" => "$requestDate",
            "validateOnly" => $validateOnly,
            "requestData" => array(
                "clientId" => $clientId,
                "transactionType" => "$transactionType",
                "transactionAmount" => array(
                    "totalAmount" => $totalAmount,
                    "paymentAmount" => $paymentAmount,
                    "serviceFeeAmount" => $serviceFeeAmount,
                    "withholdingAmount"=>$withholdingAmount,
                    "currency" => "$currency"
                ),
                "redirect" => array(
                    "returnUrl" => "$returnUrl",                 
                    "returnMethod" => "$returnMethod"
                ),
                "clientRef" => "$clientRef",             
                "tokenize" => $tokenize,               
            )
        );
    }

}
