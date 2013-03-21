<?php

class PrintVarService{
    const jQuerySource = 'http://yandex.st/jquery/1.9.1/jquery.min.js';
    const jQueryUISource = 'http://yandex.st/jquery-ui/1.10.1/jquery-ui.min.js';
    const jQueryUIThemeSource = 'http://yandex.st/jquery-ui/1.10.1/themes/smoothness/jquery-ui.min.css';

    private static $enableJS = true;
    private static $closed = true;

    private static function PrintStyle(){
        $style = '
            <style type="text/css">
                /* Style reset */
                #print_var_container a,
                #print_var_container abbr,
                #print_var_container acronym,
                #print_var_container address,
                #print_var_container applet,
                #print_var_container article,
                #print_var_container aside,
                #print_var_container audio,
                #print_var_container b,
                #print_var_container big,
                #print_var_container blockquote,
                #print_var_container button,
                #print_var_container canvas,
                #print_var_container caption,
                #print_var_container center,
                #print_var_container cite,
                #print_var_container code,
                #print_var_container dd,
                #print_var_container del,
                #print_var_container details,
                #print_var_container dfn,
                #print_var_container dialog,
                #print_var_container div,
                #print_var_container dl,
                #print_var_container dt,
                #print_var_container em,
                #print_var_container embed,
                #print_var_container fieldset,
                #print_var_container figcaption,
                #print_var_container figure,
                #print_var_container font,
                #print_var_container footer,
                #print_var_container form,
                #print_var_container h1,
                #print_var_container h2,
                #print_var_container h3,
                #print_var_container h4,
                #print_var_container h5,
                #print_var_container h6,
                #print_var_container header,
                #print_var_container hgroup,
                #print_var_container hr,
                #print_var_container html,
                #print_var_container i,
                #print_var_container iframe,
                #print_var_container img,
                #print_var_container ins,
                #print_var_container kbd,
                #print_var_container label,
                #print_var_container legend,
                #print_var_container li,
                #print_var_container mark,
                #print_var_container menu,
                #print_var_container meter,
                #print_var_container nav,
                #print_var_container object,
                #print_var_container ol,
                #print_var_container output,
                #print_var_container p,
                #print_var_container pre,
                #print_var_container progress,
                #print_var_container q,
                #print_var_container rp,
                #print_var_container rt,
                #print_var_container ruby,
                #print_var_container s,
                #print_var_container samp,
                #print_var_container section,
                #print_var_container small,
                #print_var_container span,
                #print_var_container strike,
                #print_var_container strong,
                #print_var_container sub,
                #print_var_container summary,
                #print_var_container sup,
                #print_var_container table,
                #print_var_container tbody,
                #print_var_container td,
                #print_var_container tfoot,
                #print_var_container th,
                #print_var_container thead,
                #print_var_container time,
                #print_var_container tr,
                #print_var_container tt,
                #print_var_container u,
                #print_var_container ul,
                #print_var_container var,
                #print_var_container video,
                #print_var_container xmp {
                  border: 0;
                  margin: 0;
                  padding: 0;
                  font-size: 100%;
                }

                #print_var_container article,
                #print_var_container aside,
                #print_var_container details,
                #print_var_container figcaption,
                #print_var_container figure,
                #print_var_container footer,
                #print_var_container header,
                #print_var_container hgroup,
                #print_var_container menu,
                #print_var_container nav,
                #print_var_container section {
                  display: block;
                }

                #print_var_container b,
                #print_var_container strong {
                  font-weight: bold;
                }

                #print_var_container img {
                  color: transparent;
                  font-size: 0;
                  vertical-align: middle;
                  -ms-interpolation-mode: bicubic;
                }

                #print_var_container ol,
                #print_var_container ul {
                  list-style: none;
                }

                #print_var_container li {
                  display: list-item;
                }

                #print_var_container#print_var_container table {
                  border-collapse: collapse;
                  border-spacing: 0;
                }

                #print_var_container th,
                #print_var_container td,
                #print_var_container caption {
                  font-weight: normal;
                  vertical-align: top;
                  text-align: left;
                }

                #print_var_container q {
                  quotes: none;
                }

                #print_var_container q:before,
                #print_var_container q:after {
                  content: "";
                  content: none;
                }

                #print_var_container sub,
                #print_var_container sup,
                #print_var_container small {
                  font-size: 75%;
                }

                #print_var_container sub,
                #print_var_container sup {
                  line-height: 0;
                  position: relative;
                  vertical-align: baseline;
                }

                #print_var_container sub {
                  bottom: -0.25em;
                }

                #print_var_container sup {
                  top: -0.5em;
                }

                #print_var_container svg {
                  overflow: hidden;
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
                    top: 0px;
                    left 0px;
                    width: auto;
                    height: auto;
                }

                #print_var_container.no_js .button {
                    display: none;
                }
            </style>
        ';

        print preg_replace('/[\s]{2,}/', ' ', $style);
    }

    private static function PrintScript(){
        $script = '
            <script type="text/javascript">
                (function( $ ){
                    $(function(){
                        var container = $("#print_var_container");

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
            </script>
        ';

        print preg_replace('/[\s]{2,}/', ' ', $script);
    }

    private static function PrintButton(){
        print '<div class="button ' . (self::$closed ? 'open' : 'close') . '">' . (self::$closed ? '+' : '-') . '</div>';
    }

    private static function PrintType($type){
        print '<span class="type ' . $type . '">(';
        print $type;
        print ')</span>';
    }

    private static function PrintName($name){
        if(is_null($name)) return;
        print '<span class="name">';

        if($name === 0) print '0';
        else if($name === false) print 'false';
        else if($name === '') print '""';
        else print $name;

        print '</span>';
    }

    private static function PrintSeparator($separator='='){
        if(empty($separator)) return;

        print '<span class="separator">';
        print $separator;
        print '</span>';
    }

    private static function PrintValue($var, $name=null, $separator='='){
        if(is_null($var)){
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintNull($var);
            return;
        }

        if(is_bool($var)){
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintType('bool');
            self::PrintBool($var);
            return;
        }

        if(is_integer($var)){
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintType('int');
            self::PrintInteger($var);
            return;
        }

        if(is_float($var)){
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintType('float');
            self::PrintFloat($var);
            return;
        }

        if(is_string($var)){
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintType('string');
            self::PrintString($var);
            return;
        }

        if(is_array($var)){
            self::PrintButton();
            self::PrintName($name);
            self::PrintSeparator($separator);
            self::PrintType('array');
            self::PrintArray($var);
            return;
        }

        if(is_object($var)){
            self::PrintButton();
            self::PrintObject($var, $name, $separator);
            return;
        }
    }

    private static function PrintNull($var){

        print '<span class="value null">null</span>';
    }

    private static function PrintBool($var){
        print '<span class="value bool">';
        print $var ? 'true' : 'false';
        print '</span>';
    }

    private static function PrintInteger($var){
        print '<span class="value int">';
        print $var ? $var : 0;
        print '</span>';
    }

    private static function PrintFloat($var){
        print '<span class="value float">';
        print $var ? $var : 0;
        print '</span>';
    }

    private static function PrintString($var){
        print '<span class="value string">"';
        print $var;
        print '"</span>';
    }

    private static function PrintArray($var){
        print '<span class="count array">[' . count($var) . ']</span>';
        print '<span class="value">';
        print '<ul' . (self::$closed ? ' style="display: none;"' : '') . '>';

        foreach($var as $key=>$value){
            print '<li>';
            self::PrintValue($value, $key, '=>');
            print '</li>';
        }

        print '</ul></span>';
    }

    private static function PrintObject($var, $name=null, $separator='='){
        self::PrintName($name);
        self::PrintSeparator($separator);

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
        print '<ul' . (self::$closed ? ' style="display: none;"' : '') . '>';

        foreach($props as $prop){
            if($prop->isStatic()) continue;

            print '<li>';
            self::PrintValue($prop->getValue($var), $prop->getName(), '=');
            print '</li>';
        }

        foreach($methods as $method){
            if($method->isStatic()) continue;

            $name = $method->getName();

            if($name == '__get') continue;
            if($name == '__set') continue;

            print '<li>';
            self::PrintButton();
            //print '<span class="type">method</span>';
            print '<span class="name">' . $name . '</span>';

            $params = $method->getParameters();

            print '<span class="count method">(' . count($params) . ')</span>';
            print '<span class="value">';
            print '<ul' . (self::$closed ? ' style="display: none;"' : '') . '>';

            foreach($params as $param){
                $name = $param->getName();

                print '<li>';
                if($param->isDefaultValueAvailable())
                {
                    $default = $param->getDefaultValue();
                    if(is_null($default)){
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintNull($default);
                    }
                    else if(is_bool($default)){
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintType('bool');
                        self::PrintBool($default);
                    }
                    else if(is_integer($default)){
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintType('int');
                        self::PrintInteger($default);
                    }
                    else if(is_float($default)){
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintType('float');
                        self::PrintFloat($default);
                    }
                    else if(is_string($default)){
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintType('string');
                        self::PrintString($default);
                    }
                    else if(is_array($default)){
                        self::PrintButton();
                        print '<span class="name">$' . $name . '</span>';
                        self::PrintSeparator('=');
                        self::PrintType('array');
                        self::PrintArray($default);
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

    public static function PrintVar($var, $closed=true){
        if(defined('DISABLE_PRINT_VAR')) return;

        self::$closed = $closed;

        print '<link rel="stylesheet" type="text/css" href="' . self::jQueryUIThemeSource . '">';
        self::PrintStyle();

        if(self::$enableJS){
            print '<script type="text/javascript" src="' . self::jQuerySource . '"></script>';
            print '<script type="text/javascript" src="' . self::jQueryUISource . '"></script>';
            self::PrintScript();
        }

        print '<div id="print_var_container" class="no_js" title="Print Var">';
        self::PrintValue($var, null, null);
        print '</div>';
    }
}

/**
 * Print variables
 * @param mixed $var Variable
 * @param bool $closed Minimize array and object values
 */
function print_var($var, $closed=false){
    PrintVarService::PrintVar($var, $closed);
}