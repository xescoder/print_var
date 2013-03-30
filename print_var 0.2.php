<?php

/**
 * Print variable function
 * @param mixed $var
 */
function print_var($var){
    PrintVarService::Init()->PrintVar($var);
}

/**
 * Set settings print_var
 * @param PrintVarSettings $settings
 */
function print_var_settings(PrintVarSettings $settings){
    PrintVarService::Init($settings);
}

/**
 * Settings print_var
 * Class PrintVarSettings
 */
class PrintVarSettings{
    public $jQuerySource = 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js';
    public $jQueryUISource = 'http://code.jquery.com/ui/1.10.2/jquery-ui.js';
    public $jQueryUIThemeSource = 'http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css';

    public $useJS = true;
    public $minimize = false;

    public function GetStyle(){
        return '';
    }

    public function GetScript(){
        return '';
    }
}

/**
 * Service print_var
 * Class PrintVarService
 */
class PrintVarService{
    private static $service = null;

    public static function Init($settings=null){
        if(!self::$service || $settings) $service = new PrintVarService($settings);
        return $service;
    }


    private $settings;

    private function __construct($settings){
        $this->SetSettings($settings);
    }

    private function SetSettings($settings){
        if($settings){
            $this->settings = $settings;
        } else {
            $this->settings = new PrintVarSettings();
        }
    }

    public function PrintVar($var, $closed){

    }
}