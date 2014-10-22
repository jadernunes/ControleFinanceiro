<?php
include "./config.php";
include "./classGeral.php";

$idTurma = 0;
$idUserProfessor = 0;

if(isset($_SESSION['user'])){
    $idUserProfessor = $_SESSION['user']['idUsuario'];
}





//echo '<pre>';
//print_r($_SESSION['user']);
//echo '</pre>';


echo $idUserProfessor;

//if(isset($_SESSION['user'])){
//    $idUserProfessor = 
//}

if(isset($_GET['idTurma'])){
    $idTurma = $_GET['idTurma'];
}

?>