<?php
include "../Model/config.php";
include "../Model/MySql_Class.php";

$myClass = new MySql_Class();

if(isset($_POST['titulo']))
{
    if(strlen($_POST['titulo']) > 0)
    {
        $myClass->CriarGrupo($_POST['titulo'],$_SESSION['user']['idUser']);
    }
}

$_SESSION['user']['loadPage']['page'] = 'AdministracaoView.php';
$_SESSION['user']['loadPage']['div'] = 'dados';
$myClass->loadPagina('../Index.php');
?>