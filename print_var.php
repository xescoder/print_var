<?php

class PrintVarService{
    private static function PrintButton(){
        print '<div class="button"><i class="close"></i></div>';
    }

    private static function PrintType($type){
        print '<span class="type">';
        print $type;
        print '</span>';
    }

    private static function PrintName($name){
        if(!$name) return;
        print '<span class="name">';
        print $name;
        print '</span>';
    }

    private static function PrintValue($var, $name=false){
        if(is_null($var)){
            self::PrintType('null');
            self::PrintName($name);
            self::PrintNull($var);
            return;
        }

        if(is_bool($var)){
            self::PrintType('bool');
            self::PrintName($name);
            self::PrintBool($var);
            return;
        }

        if(is_integer($var)){
            self::PrintType('integer');
            self::PrintName($name);
            self::PrintInteger($var);
            return;
        }

        if(is_float($var)){
            self::PrintType('float');
            self::PrintName($name);
            self::PrintFloat($var);
            return;
        }

        if(is_string($var)){
            self::PrintType('string');
            self::PrintName($name);
            self::PrintString($var);
            return;
        }

        if(is_array($var)){
            self::PrintButton();
            self::PrintType('array');
            self::PrintName($name);
            self::PrintArray($var);
            return;
        }

        if(is_object($var)){
            self::PrintButton();
            self::PrintObject($var, $name);
            return;
        }
    }

    private static function PrintNull($var){
        print '<span class="separator">:</span>';
        print '<span class="value null">null</span>';
    }

    private static function PrintBool($var){
        print '<span class="separator">:</span>';
        print '<span class="value bool">';
        print $var;
        print '</span>';
    }

    private static function PrintInteger($var){
        print '<span class="separator">:</span>';
        print '<span class="value integer">';
        print $var;
        print '</span>';
    }

    private static function PrintFloat($var){
        print '<span class="separator">:</span>';
        print '<span class="value float">';
        print $var;
        print '</span>';
    }

    private static function PrintString($var){
        print '<span class="separator">:</span>';
        print '<span class="value string">';
        print $var;
        print '</span>';
    }

    private static function PrintArray($var){
        print '<span class="count">[' . count($var) . ']</span>';
        print '<span class="value array">';
        print '<ul style="display: none;">';

        foreach($var as $key=>$value){
            print '<li>';
            self::PrintValue($value, $key);
            print '</li>';
        }

        print '</ul></span>';
    }

    private static function PrintObject($var, $name=false){
        $className = get_class($var);

        $reflect = new ReflectionClass($var);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        $methods = $reflect->getMethods(ReflectionMethod::IS_PUBLIC);

        print '<span class="type">' . $className . '</span>';
        self::PrintName($name);

        $countProps = 0;
        foreach($props as $prop){
            if($prop->isStatic()) continue;
            $countProps++;
        }

        print '<span class="count">{' . $countProps . '}</span>';
        print '<span class="value object">';
        print '<ul style="display: none;">';

        foreach($props as $prop){
            if($prop->isStatic()) continue;

            print '<li>';
            self::PrintValue($prop->getValue($var), $prop->getName());
            print '</li>';
        }

        foreach($methods as $method){
            if($method->isStatic()) continue;

            $name = $method->getName();

            if($name == '__get') continue;
            if($name == '__set') continue;

            print '<li>';
            self::PrintButton();
            print '<span class="type">method</span>';
            print '<span class="name">' . $name . '</span>';

            $params = $method->getParameters();

            print '<span class="count">(' . count($params) . ')</span>';
            print '<span class="value function">';
            print '<ul style="display: none;">';

            foreach($params as $param){
                $name = $param->getName();
                $default = $param->getDefaultValue();

                print '<li>';
                if($default){
                    if(is_null($var)){
                        self::PrintType('null');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintNull($var);
                    }
                    else if(is_bool($var)){
                        self::PrintType('bool');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintBool($var);
                    }
                    else if(is_integer($var)){
                        self::PrintType('integer');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintInteger($var);
                        return;
                    }
                    else if(is_float($var)){
                        self::PrintType('float');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintFloat($var);
                        return;
                    }
                    else if(is_string($var)){
                        self::PrintType('string');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintString($var);
                        return;
                    }
                    else if(is_array($var)){
                        self::PrintButton();
                        self::PrintType('array');
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintArray($var);
                        return;
                    }
                } else {
                    print '<span class="name">$' . $name . '</span>';
                }
                print '</li>';
            }

            print '</ul></span>';
        }

        print '</ul></span>';
    }

    public static function PrintVar($var){
        print '
            <link rel="stylesheet" type="text/css" href="http://yandex.st/jquery-ui/1.10.1/themes/smoothness/jquery-ui.min.css">
            <style type="text/css">
                #print_var_container{
                    background-color: #f4f4f4;
                    padding-left: 25px;
                    width: 200px;
                    height: 50px;
                }

                #print_var_container ul{
                    list-style-type: none;
                    display: block;
                    overflow: hidden;
                    margin: 0;
                    padding: 0;
                    padding-left: 30px;
                }

                #print_var_container .button {
                    width: 15px;
                    height: 15px;
                    float: left;
                    margin: 0;
                    margin-top: 6px;
                    margin-left: -15px;
                }

                #print_var_container i{
                    display: block;
                    margin: 4px;
                    width: 0px;
                    height: 0px;
                    border-style: solid;
                }

                #print_var_container .open{
                    border-width: 7px 4px 0 4px;
                    border-color: #000 transparent transparent transparent;
                }

                #print_var_container .close{
                    border-width: 4px 0 4px 7px;
                    border-color: transparent transparent transparent #000;
                }
            </style>

            <script type="text/javascript" src="http://yandex.st/jquery/1.9.1/jquery.min.js"></script>
            <script type="text/javascript" src="http://yandex.st/jquery-ui/1.10.1/jquery-ui.min.js"></script>
            <script type="text/javascript">
                jQuery(function(){
                    jQuery("#print_var_container").dialog({
                        autoOpen: true,
                        draggable: true,
                        resizable: true,
                        minHeight: "50px",
                        minWidth: "200px"
                    });

                    jQuery("#print_var_container .button").click(function(){
                        var _this = jQuery(this).find("i");
                        if(_this.hasClass("open")){
                            _this.parent()
                                 .parent()
                                 .find("ul")
                                 .slideUp("fast")
                                 .parent()
                                 .parent()
                                 .find("i")
                                 .removeClass("open")
                                 .addClass("close");
                        } else {
                            _this.removeClass("close")
                                 .addClass("open");

                            _this.parent()
                                 .parent()
                                 .find("> span > ul")
                                 .slideDown("fast");
                        }
                        return false;
                    });
                });
            </script>
            <div id="print_var_container" title="Print Var 0.1">
        ';

        self::PrintValue($var);

        print '
            </div>
        ';
    }
}

function print_var($var){
    PrintVarService::PrintVar($var);
}