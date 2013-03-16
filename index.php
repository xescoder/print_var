<?php

require 'print_var.php';

class Test{
    const const1 = 1;
    const const2 = 2;

    public $field1 = 3;
    public $field2 = 4;

    protected $field3 = 5;
    protected $field4 = 6;

    private $field5 = 7;
    private $filed6 = 8;

    public static $field7 = 9;
    public static $field8 = 10;

    private static $field9 = 11;
    private static $field10 = 12;

    private function Method1($param1=1, $param2=false){

    }

    protected function Method2($param1=1, $param2=false){

    }

    public function Method3($param1=1, $param2){

    }

    private static function Method4($param1=1, $param2=false){

    }

    public static function Method5($param1=1, $param2=false){

    }

    public function __get($name){
        switch($name){
            case 'Field': return 123;
        }
    }

    public function __set($name, $value){
        switch($name){
            case 'Prop': break;
        }
    }
}

$obj = new Test;
$arr = array(
    'string',
    true,
    array(
        'obj' => $obj,
        null,
        34.56,
        5675
    )
);

print_var($arr, false);
//print_var(123);
//print_var('str');
//print_var(true);