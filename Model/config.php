<?php
session_start();
date_default_timezone_set("Brazil/East");
$tempolimite = 5;
 
//session_destroy();


//// Turn off all error reporting
//error_reporting(0);

//// Report simple running errors
//error_reporting(E_ERROR);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//// Report all errors except E_NOTICE
//// This is the default value set in php.ini
//error_reporting(E_ALL ^ E_NOTICE);
//
//// Report all PHP errors
//error_reporting(E_ALL);
//
//// Same as error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);


//session_destroy();
//header( 'Content-Type: text/html; charset=utf-8', false,http_response_code(404));
?>
