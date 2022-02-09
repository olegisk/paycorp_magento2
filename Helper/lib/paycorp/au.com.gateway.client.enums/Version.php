<?php

class Version {
    
    public static $VERSION_1_4 = "1.4";
    public static $VERSION_1_5 = "1.5";
    public static $VERSION_LATEST = "1.5.6";
    
    private $version;

    private function __construct($version) {
        $this->version = $version;
    }
    
    public function getVersion(){
        return $this->version;
    }

}
