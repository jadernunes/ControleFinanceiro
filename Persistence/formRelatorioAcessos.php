<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['btAcessosDia'])){
    
    $classGeral->show(getMacAddress());
    
}else if(isset($_POST['btAcessosMes'])){
    
}else if(isset($_POST['btAcessosAno'])){
    $classGeral->loadPagina('../Index.php');
}


?>