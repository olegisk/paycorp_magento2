<?php

class Operation {

    public static $PAYMENT_INIT = "PAYMENT_INIT";
    public static $PAYMENT_CREATE = "PAYMENT_CREATE";
    public static $PAYMENT_COMPLETE = "PAYMENT_COMPLETE";
    public static $PAYMENT_REAL_TIME = "PAYMENT_REAL_TIME";
    public static $PAYMENT_BATCH = "PAYMENT_BATCH";
    public static $PAYMENT_BBPOS = "PAYMENT_BBPOS";
    
    public static $REPORT_BASIC = "REPORT_BASIC";
    public static $REPORT_SETTLEMENT = "REPORT_SETTLEMENT";
    
    public static $VAULT_STORE_CARD = "VAULT_STORE_CARD";
    public static $VAULT_RETRIEVE_CARD = "VAULT_RETRIEVE_CARD";
    public static $VAULT_UPDATE_CARD = "VAULT_UPDATE_CARD";
    public static $VAULT_VERIFY_TOKEN = "VAULT_VERIFY_TOKEN";
    public static $VAULT_DELETE_TOKEN = "VAULT_DELETE_TOKEN";
    public static $AMEX_WALLET_INIT = "AMEX_WALLET_INIT";
    public static $AMEX_WALLET_COMPLETE = "AMEX_WALLET_COMPLETE";
    public static $DIRECT_ENTRY_REAL_TIME = "DIRECT_ENTRY_REAL_TIME";
    public static $DIRECT_ENTRY_BATCH = "DIRECT_ENTRY_BATCH";

    private function __construct() {
        
    }

}
