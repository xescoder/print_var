Print Var
=========

Функция для удобочитаемого вывода значений переменных на экран в php, аналог print_r и var_dump.

Значение переменной выводится в диалоговом окне, которое можно перемещать.
Значение массивов и объектов можно сворачивать.

<p align="center">
  <img src="https://github.com/xescoder/print_var/blob/master/example.jpg?raw=true">
</p>

Использование
-------------

Для использования функции достаточно:

1.  Подключить print_var.php где-нибудь в начале страницы,
2.  Вызвать print_var($var).

`````php
// Подключить print_var
include 'print_var.php';

// Вызвать функцию
$str = 'variable';
print_var($str);
`````

Деактивация
-----------

В случае если вы забыли удалить вызов print_var его можно быстро деактивировать, определив константу DISABLE_PRINT_VAR

`````php
// Деактивация print_var
define('DISABLE_PRINT_VAR', true);
`````