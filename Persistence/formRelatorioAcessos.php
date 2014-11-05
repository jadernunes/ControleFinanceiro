<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['btAcessosDia'])){
    $classGeral->show($classGeral->getMacAddress());
}else if(isset($_POST['btAcessosMes'])){
    $classGeral->loadPagina('../Index.php');
}else if(isset($_POST['btAcessosAno'])){
    $classGeral->loadPagina('../Index.php');
}


?>