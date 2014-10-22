<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['idMax'])){
    $idMax = $_POST['idMax'];
    $idMax++;
    $classGeral->insert('INSERT INTO Grupo (identificadorGrupo, status) VALUES (\''.$idMax.'\',0)');
}
$classGeral->loadPagina('GerarCodigoObjetivosView.php');
?>