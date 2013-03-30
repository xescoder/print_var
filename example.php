<?php

/*  variable  */
$arr = array(
    'null' => null,
    'bool' => true,
    'int' => 1234,
    'float' => 56.1111,
    'string' => 'string string string',
    'array' => array(
        'ints' => array(1, 2, 3, 4, 5, 6),
        'strings' => array('one', 'two', 'three', 'four'),
    )
);

/*  include print_var tool  */
include 'print_var.php';

/*  disable all print_var  */
// define('DISABLE_PRINT_VAR', true);

/* customize print_var settings */
$printVarSettings = new PrintVarSettings();
$printVarSettings->useJS = false;
// print_var_settings($printVarSettings);

/*  print variable  */
print_var($arr);