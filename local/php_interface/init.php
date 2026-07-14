<?php
// константы
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/constants.php')) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/constants.php';
}

// функции
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/functions.php')) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/functions.php';
}

// классы
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/autoload.php')) {
  include_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/autoload.php';
}