<?php

class RetrieveCardJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        
        $retrieveCardResponse = new RetrieveCardResponse();

        $creditCard = new CreditCard();
        $creditCard->setNumber($responseData["responseData"]["creditCard"]["number"]);
        $creditCard->setExpiry($responseData["responseData"]["creditCard"]["expiry"]);
        $retrieveCardResponse->setCreditCard($creditCard);

        $retrieveCardResponse->setClientRef($responseData["responseData"]["clientRef"]);
        $retrieveCardResponse->setResponseCode($responseData["responseData"]["responseCode"]);
        $retrieveCardResponse->setResponseText($responseData["responseData"]["responseText"]);
        $retrieveCardResponse->setCompleted($responseData["responseData"]["completed"]);
        
        return $retrieveCardResponse;
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
