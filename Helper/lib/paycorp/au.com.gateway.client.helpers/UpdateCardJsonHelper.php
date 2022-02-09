<?php

class UpdateCardJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {
        
        $updateCardResponse = new UpdateCardResponse();
        $updateCardResponse->setResponseCode($responseData["responseData"]["responseCode"]);
        $updateCardResponse->setResponseText($responseData["responseData"]["responseText"]);
        $updateCardResponse->setCompleted($responseData["responseData"]["completed"]);
        $updateCardResponse->setAuthResponseCode($responseData["responseData"]["authResponseCode"]);
        $updateCardResponse->setAuthResponseText($responseData["responseData"]["authResponseText"]);
        $updateCardResponse->setAuthTxnRef($responseData["responseData"]["authTxnRef"]);
       
        return $updateCardResponse;
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
        $expiryDate = $requestData->getExpiryDate();
        $clientRef = $requestData->getClientRef();
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
                "token" => "$token",
                "expiryDate" => "$expiryDate",
                "clientRef" => "$clientRef",
                "comment" => "$comment",
                "extraData" => $extraData,
            )
        );
    }

}
