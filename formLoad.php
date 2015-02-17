<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();
$page = split('-', $_POST['page']);
$div = split('-', $_POST['page']);

$page = $page[0].'.php';
if(isset($_SESSION['user']))
{
     $_SESSION['user']['loadPage']['page'] = $page;
     $_SESSION['user']['loadPage']['div'] = $div[1];
}

$myClass->loadPagina('Index.php');
?>