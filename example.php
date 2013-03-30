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
include 'print_var 0.2.php';

/*  disable all print_var  */
// define('DISABLE_PRINT_VAR', true);

/*  print with maximized array and object values  */
print_var($arr);

/*  print with minimized array and object values  */
// print_var($arr, true);