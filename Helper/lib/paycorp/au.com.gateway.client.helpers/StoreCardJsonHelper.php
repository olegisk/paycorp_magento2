<?php

class StoreCardJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        $storeCardResponse = new StoreCardResponse();
        $storeCardResponse->setToken($responseData["responseData"]["token"]);
        $storeCardResponse->setResponseCode($responseData["responseData"]["responseCode"]);
        $storeCardResponse->setResponseText($responseData["responseData"]["responseText"]);
        $storeCardResponse->setCompleted($responseData["responseData"]["completed"]);
        $storeCardResponse->setAuthResponseCode($responseData["responseData"]["authResponseCode"]);
        $storeCardResponse->setAuthResponseText($responseData["responseData"]["authResponseText"]);
        $storeCardResponse->setAuthTxnRef($responseData["responseData"]["authTxnRef"]);


        return $storeCardResponse;
    }

    public function toJson($paycorpRequest) {
        $version = $paycorpRequest->getVersion();
        $msgId = $paycorpRequest->getMsgId();
        $operation = $paycorpRequest->getOperation();
        $requestDate = $paycorpRequest->getRequestDate();
        $validateOnly = $paycorpRequest->getValidateOnly();
        $requestData = $paycorpRequest->getRequestData();

        $clientId = $requestData->getClientId();
        $clientRef = $requestData->getClientRef();

        $creditCard = $requestData->getCreditCard();
        $type = $creditCard->getType();
        $holderName = $creditCard->getHolderName();
        $number = $creditCard->getNumber();
        $expiry = $creditCard->getExpiry();
        $secureId = $creditCard->getSecureId();
        $secureIdSupplied = $creditCard->getSecureIdSupplied();
        $comment = $requestData->getComment();
        $extraData = $requestData->getExtraData();

        return array(
            "version" => "$version",
            "msgId" => "$msgId",
            "operation" => "$operation",
            "requestDate" => "$requestDate",
            "validateOnly" => $validateOnly,
            "requestData" => array(
                "clientId" => $clientId,
                "clientRef" => "$clientRef",
                "creditCard" => array(
                    "type" => "$type",
                    "holderName" => "$holderName",
                    "number" => "$number",
                    "expiry" => "$expiry",
                    "secureId" => "$secureId",
                    "secureIdSupplied" => $secureIdSupplied
                ),
                "comment" => $comment,
                "extraData" => $extraData
            )
        );
    }

}
