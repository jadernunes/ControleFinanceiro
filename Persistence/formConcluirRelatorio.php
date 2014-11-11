<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$idUserProfessor = $_POST['idUsuario'];
$idTurma = $_POST['idTurma'];
$idGrupo = $_POST['idGrupo'];

// pega os relatorios
$query = 'Select * From Relatorio r where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and statusResposta = 2';

$result = $classGeral->select($query);

$i = 0;
foreach ($result as $col => $val){
    $sql = 'UPDATE Relatorio set statusResposta = 3 where idRelatorio = '.$val['idRelatorio'];
    $classGeral->insert($sql);
}

$classGeral->loadPagina('../View/RelPreView.php');

?>