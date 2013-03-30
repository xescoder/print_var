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

    public $arMethodsExcept = array(
        __construct,
        __get,
        __set,
    );

    public function GetStyle(){
        return '
            /* Style reset */
            #print_var_container div,
            #print_var_container li,
            #print_var_container span,
            #print_var_container ul{
              border: 0;
              margin: 0;
              padding: 0;
              font-size: 100%;
            }

            #print_var_container ul {
              list-style: none;
            }

            #print_var_container li {
              display: list-item;
            }

            /* With JS */
            #print_var_container {
                font-family: Courier;
                overflow: auto;
                background-color: white;
                padding-left: 25px;
                width: 200px;
                height: 50px;
            }

            #print_var_container ul {
                overflow: visible;
                list-style-type: none;
                display: block;
                margin: 0;
                padding: 0;
                padding-left: 30px;
                border-left: #c5c5c5 1px solid;
            }

            #print_var_container .button {
                background-color: #e6e6e6;
                color: #000000;
                width: 15px;
                height: 15px;
                float: left;
                margin: 0;
                margin-left: -20px;
                border-radius: 4px;
                cursor: hand;
            }

            #print_var_container .button:hover {
                background-color: #bebebe;
            }

            #print_var_container .close {
                padding-left: 3px;
                padding-bottom: 2px;
                padding-right: 0px;
                padding-top: 0px;
            }

            #print_var_container .open {
                padding-left: 3px;
                padding-bottom: 3px;
                padding-right: 0px;
                padding-top: 0px;
            }

            #print_var_container i {
                display: block;
                margin: 4px;
                width: 0px;
                height: 0px;
                border-style: solid;
            }

            #print_var_container .name {
                color: #66170D;
                padding-right: 5px;
            }

            #print_var_container .separator {
                color: #000000;
                padding-right: 5px;
            }

            #print_var_container .count {
                color: #000000;
            }

            #print_var_container .null {
                color: #0A1F80;
            }

            #print_var_container .bool {
                color: #0A1F80;
            }

            #print_var_container .int {
                color: #1F45F7;
            }

            #print_var_container .float {
                color: #1F45F7;
            }

            #print_var_container .string {
                color: #3C811B;
            }

            #print_var_container .array {
                color: #0A1F80;
            }

            #print_var_container .object {
                color: #000000;
            }

            #print_var_container .method {
                color: #000000;
            }

            /* No JS */
            #print_var_container.no_js {
                position: absolute;
                z-index: 10000000000000;
                padding: 20px;
                padding-left: 25px;
                background-color: white;
                border: 2px solid black;
                top: 40%;
                left: 40%;
                width: auto;
                height: auto;
            }

            #print_var_container.no_js .button {
                display: none;
            }
        ';
    }

    public function GetScript(){
        return '
            (function( $ ){
                $(function(){
                    var container = $(".print_var_container");

                    container.removeClass("no_js");

                    container.dialog({
                        autoOpen: true,
                        draggable: true,
                        resizable: true,
                        minHeight: 50,
                        minWidth: 300,
                        width: "auto"
                    });

                    container.closest(".ui-dialog").css({zIndex: 1000000000});

                    container.find(".button").click(function(){
                        var _this = $(this);
                        if(_this.hasClass("close")){
                            _this.text("+")
                                 .removeClass("close")
                                 .addClass("open")
                                 .parent()
                                 .find("ul")
                                 .slideUp(200)
                                 .find(".button")
                                 .text("+")
                                 .removeClass("close")
                                 .addClass("open");
                        } else {
                            _this.text("-")
                                 .removeClass("open")
                                 .addClass("close")
                                 .parent()
                                 .find("> span > ul")
                                 .slideDown(200);
                        }
                        return false;
                    });
                });
            })(jQuery);
        ';
    }
}

/**
 * Service print_var
 * Class PrintVarService
 */
class PrintVarService{
    private static $service = null;

    public static function Init(PrintVarSettings $settings=null){
        if(!self::$service || isset($settings))
            self::$service = new PrintVarService($settings);

        return self::$service;
    }

    /**
     * @var PrintVarSettings
     */
    private $settings;

    private function __construct($settings){

        $this->SetSettings($settings);
        $this->PrintHead();
    }

    private function SetSettings($settings){
        if(isset($settings)){
            $this->settings = $settings;
        } else {
            $this->settings = new PrintVarSettings();
        }
    }

    private function PrintHead(){
        print '<link rel="stylesheet" type="text/css" href="' . $this->settings->jQueryUIThemeSource . '">';
        $this->PrintStyle();

        if(!$this->settings->useJS) return;

        print '<script type="text/javascript" src="' . $this->settings->jQuerySource . '"></script>';
        print '<script type="text/javascript" src="' . $this->settings->jQueryUISource . '"></script>';
        $this->PrintScript();
    }

    private function PrintStyle(){
        $style = $this->settings->GetStyle();
        $style = preg_replace('/[\s]{2,}/', ' ', $style);
        $style = preg_replace('/\/\*[^\*\/]*\*\//', '', $style);
        $style = trim($style);
        print '<style type="text/css">' . $style . '</style>';
    }

    private function PrintScript(){
        $script = $this->settings->GetScript();
        $script = preg_replace('/[\s]{2,}/', ' ', $script);
        $script = preg_replace('/\/\*[^\*\/]*\*\//', '', $script);
        $script = trim($script);
        print '<script type="text/javascript">' . $script . '</script>';
    }

    private function PrintButton(){
        print '<div class="button ' . ($this->settings->minimize ? 'open' : 'close') . '">' . ($this->settings->minimize ? '+' : '-') . '</div>';
    }

    private function PrintType($type){
        print '<span class="type ' . $type . '">(';
        print $type;
        print ')</span>';
    }

    private function PrintName($name, $prefix=null){
        if(is_null($name)) return;
        print '<span class="name">';

        if($prefix) print $prefix;

        if($name === 0) print '0';
        else if($name === false) print 'false';
        else if($name === '') print '""';
        else print $name;

        print '</span>';
    }

    private function PrintSeparator($separator='='){
        if(empty($separator)) return;

        print '<span class="separator">';
        print $separator;
        print '</span>';
    }

    private function PrintValue($var, $name=null, $separator='=', $namePrefix=null){
        if(is_null($var)){
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintNull($var);
            return;
        }

        if(is_bool($var)){
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintType('bool');
            $this->PrintBool($var);
            return;
        }

        if(is_integer($var)){
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintType('int');
            $this->PrintInteger($var);
            return;
        }

        if(is_float($var)){
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintType('float');
            $this->PrintFloat($var);
            return;
        }

        if(is_string($var)){
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintType('string');
            $this->PrintString($var);
            return;
        }

        if(is_array($var)){
            $this->PrintButton();
            $this->PrintName($name, $namePrefix);
            $this->PrintSeparator($separator);
            $this->PrintType('array');
            $this->PrintArray($var);
            return;
        }

        if(is_object($var)){
            $this->PrintButton();
            $this->PrintObject($var, $name, $separator, $namePrefix);
            return;
        }
    }

    private function PrintNull($var){

        print '<span class="value null">null</span>';
    }

    private function PrintBool($var){
        print '<span class="value bool">';
        print $var ? 'true' : 'false';
        print '</span>';
    }

    private function PrintInteger($var){
        print '<span class="value int">';
        print $var ? $var : 0;
        print '</span>';
    }

    private function PrintFloat($var){
        print '<span class="value float">';
        print $var ? $var : 0;
        print '</span>';
    }

    private function PrintString($var){
        print '<span class="value string">"';
        print $var ? $var : '';
        print '"</span>';
    }

    private function PrintArray($var){
        print '<span class="count array">[' . count($var) . ']</span>';
        print '<span class="value">';
        print '<ul' . ($this->settings->minimize ? ' style="display: none;"' : '') . '>';

        foreach($var as $key=>$value){
            print '<li>';
            $this->PrintValue($value, $key, '=>');
            print '</li>';
        }

        print '</ul></span>';
    }

    private function PrintObject($var, $name=null, $separator='=', $namePrefix=null){
        $this->PrintName($name, $namePrefix);
        $this->PrintSeparator($separator);

        $className = get_class($var);

        $reflect = new ReflectionClass($var);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        $methods = $reflect->getMethods(ReflectionMethod::IS_PUBLIC);

        print '<span class="type object">' . $className . '</span>';

        $countProps = 0;
        foreach($props as $prop){
            if($prop->isStatic()) continue;
            $countProps++;
        }

        print '<span class="count object">{' . $countProps . '}</span>';
        print '<span class="value">';
        print '<ul' . ($this->settings->minimize ? ' style="display: none;"' : '') . '>';

        foreach($props as $prop){
            if($prop->isStatic()) continue;

            print '<li>';
            $this->PrintValue($prop->getValue($var), $prop->getName(), '=');
            print '</li>';
        }

        foreach($methods as $method){
            if($method->isStatic()) continue;

            $name = $method->getName();

            if(in_array($name, $this->settings->arMethodsExcept)) continue;

            print '<li>';
            $this->PrintButton();
            print '<span class="name">' . $name . '</span>';

            $params = $method->getParameters();

            print '<span class="count method">(' . count($params) . ')</span>';
            print '<span class="value">';
            print '<ul' . ($this->settings->minimize ? ' style="display: none;"' : '') . '>';

            foreach($params as $param){
                $name = $param->getName();

                print '<li>';
                if($param->isDefaultValueAvailable())
                {
                    $default = $param->getDefaultValue();
                    $this->PrintValue($default, $name, '=', '$');
                } else {
                    $this->PrintName($name, '$');
                }
                print '</li>';
            }

            print '</ul></span>';
        }

        print '</ul></span>';
    }

    public function PrintVar($var){
        if(defined('DISABLE_PRINT_VAR')) return;

        print '<div id="print_var_container" class="print_var_container no_js" title="Print Var">';
        self::PrintValue($var, null, null, null);
        print '</div>';
    }
}