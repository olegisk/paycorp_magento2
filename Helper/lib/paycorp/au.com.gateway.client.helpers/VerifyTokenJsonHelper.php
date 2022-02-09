<?php

class VerifyTokenJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        $verifyTokenResponse = new VerifyTokenResponse();
        $verifyTokenResponse->setToken($responseData["responseData"]["token"]);
        $verifyTokenResponse->setClientRef($responseData["responseData"]["clientRef"]);
        $verifyTokenResponse->setResponseCode($responseData["responseData"]["responseCode"]);
        $verifyTokenResponse->setResponseText($responseData["responseData"]["responseText"]);
        $verifyTokenResponse->setCompleted($responseData["responseData"]["completed"]);
        $verifyTokenResponse->setAuthResponseCode($responseData["responseData"]["authResponseCode"]);
        $verifyTokenResponse->setAuthResponseText($responseData["responseData"]["authResponseText"]);
        $verifyTokenResponse->setAuthTxnRef($responseData["responseData"]["authTxnRef"]);

        return $verifyTokenResponse;
    }

    public function toJson($paycorpRequest) {
        $version = $paycorpRequest->getVersion();
        $msgId = $paycorpRequest->getMsgId();
        $operation = $paycorpRequest->getOperation();
        $requestDate = $paycorpRequest->getRequestDate();
        $validateOnly = $paycorpRequest->getValidateOnly();
        $requestData = $paycorpRequest->getRequestData();

        $clientId = $requestData->getClientId();
        $token = $requestData->getToken();

        return array(
            "version" => "$version",
            "msgId" => "$msgId",
            "operation" => "$operation",
            "requestDate" => "$requestDate",
            "validateOnly" => $validateOnly,
            "requestData" => array(
                "clientId" => $clientId,
                "token" => "$token"
            )
        );
    }

}
