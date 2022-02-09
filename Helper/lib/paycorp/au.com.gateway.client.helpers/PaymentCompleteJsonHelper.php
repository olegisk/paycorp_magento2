<?php

class PaymentCompleteJsonHelper implements IJsonHelper {

    public function __construct() {
        
    }

    public function fromJson($responseData) {

        $paymentCompleteResponse = new PaymentCompleteResponse();
        $paymentCompleteResponse->setClientId(@$responseData["responseData"]["clientId"]);
        $paymentCompleteResponse->setClientIdHash(@$responseData["responseData"]["clientIdHash"]);
        $paymentCompleteResponse->setTransactionType(@$responseData["responseData"]["transactionType"]);

        $creditCard = new CreditCard();
        $creditCard->setType(@$responseData["responseData"]["creditCard"]["type"]);
        $creditCard->setHolderName(@$responseData["responseData"]["creditCard"]["holderName"]);
        $creditCard->setNumber(@$responseData["responseData"]["creditCard"]["number"]);
        $creditCard->setExpiry(@$responseData["responseData"]["creditCard"]["expiry"]);
        $paymentCompleteResponse->setCreditCard($creditCard);

        $transactionAmount = new TransactionAmount();
        $transactionAmount->setTotalAmount(@$responseData["responseData"]["transactionAmount"]["totalAmount"]);
        $transactionAmount->setPaymentAmount(@$responseData["responseData"]["transactionAmount"]["paymentAmount"]);
        $transactionAmount->setServiceFeeAmount(@$responseData["responseData"]["transactionAmount"]["serviceFeeAmount"]);
        $transactionAmount->setWithholdingAmount(@$responseData["responseData"]["transactionAmount"]["withholdingAmount"]);
        $transactionAmount->setCurrency(@$responseData["responseData"]["transactionAmount"]["currency"]);
        $paymentCompleteResponse->setTransactionAmount($transactionAmount);

        $paymentCompleteResponse->setClientRef(@$responseData["responseData"]["clientRef"]);
        $paymentCompleteResponse->setComment(@$responseData["responseData"]["comment"]);
        $paymentCompleteResponse->setTxnReference(@$responseData["responseData"]["txnReference"]);
        $paymentCompleteResponse->setFeeReference(@$responseData["responseData"]["feeReference"]);
        $paymentCompleteResponse->setResponseCode(@$responseData["responseData"]["responseCode"]);
        $paymentCompleteResponse->setResponseText(@$responseData["responseData"]["responseText"]);
        $paymentCompleteResponse->setSettlementDate(@$responseData["responseData"]["settlementDate"]);
        $paymentCompleteResponse->setToken(@$responseData["responseData"]["token"]);
        $paymentCompleteResponse->setTokenized(@$responseData["responseData"]["tokenized"]);
        $paymentCompleteResponse->setTokenResponseText(@$responseData["responseData"]["tokenResponseText"]);
        $paymentCompleteResponse->setAuthCode(@$responseData["responseData"]["authCode"]);
        $paymentCompleteResponse->setCvcResponse(@$responseData["responseData"]["cvcResponse"]);
        $paymentCompleteResponse->setExtraData(array(@$responseData["responseData"]["extraData"]));

        return $paymentCompleteResponse;
    }

    public function toJson($paycorpRequest) {
        $version = $paycorpRequest->getVersion();
        $msgId = $paycorpRequest->getMsgId();
        $operation = $paycorpRequest->getOperation();
        $requestDate = $paycorpRequest->getRequestDate();
        $validateOnly = $paycorpRequest->getValidateOnly();
        $requestData = $paycorpRequest->getRequestData();

        $clientId = $requestData->getClientId();
        $reqid = $requestData->getReqid();

        return array(
            "version" => "$version",
            "msgId" => "$msgId",
            "operation" => "$operation",
            "requestDate" => "$requestDate",
            "validateOnly" => $validateOnly,
            "requestData" => array(
                "clientId" => $clientId,
                "reqid" => $reqid
            )
        );
    }

}
