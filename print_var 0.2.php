<?php

/**
 * Print variables
 * @param mixed $var Variable
 * @param bool $closed Minimize array and object values
 */
function print_var($var, $closed=false){
    PrintVarService::Init()->PrintVar($var, $closed);
}

class PrintVarService{

    private static $service = null;

    public static function Init(){
        if(!self::$service) $service = new PrintVarService();
        return $service;
    }

    private function __construct(){

    }

    public function PrintVar($var, $closed){

    }
}