<?php

final class Report extends BaseFacade {
    
    public function __construct($config) {
        parent::__construct($config);
    }
    
    public function basic($request){
        $basicReportJsonHelper = new BasicReportJsonHelper();
        return parent::process($request, Operation::$REPORT_BASIC, $basicReportJsonHelper);
        
    }
    
    public function settlement($request){
        $settlementReportJsonHelper = new SettlementReportJsonHelper();
        return parent::process($request, Operation::$REPORT_SETTLEMENT, $settlementReportJsonHelper);
        
    }
    
}
