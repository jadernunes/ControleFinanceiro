<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();
$_SESSION['user'] = "";
session_destroy();
$classGeral->loadPagina('../Index.php');
?>