<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();
$classGeral->show($_POST);

$idTurma = $_POST['idTurma'];
$idGrupo = $_POST['idGrupo'];
$idRelatorio = $_POST['idRelatorio'];
$observacao = $_POST['observacao'];

//Todos os Objetivos
$arrayObjetivos = array();

$i = 0;
foreach ($_POST as $t => $v){
    $coluna = substr($t, 0, 8);
    if(isset($coluna)){
        if($coluna == 'objetivo'){
            $idObjetivo = substr($t, 8, count($t));
            $objet = array();
            $objet[0] = $idObjetivo;
            $objet[1] = $v;
            
            $arrayObjetivos[$i] = $objet;
            $classGeral->show($arrayObjetivos[$i]);
            $i++;
        }
    }
}

foreach ($arrayObjetivos as $obj => $status){
    $query = 'UPDATE RelatorioObjetivo SET status = '.$status[1].' WHERE idObjetivo = '.$status[0].' AND idRelatorio = '.$idRelatorio;
    $classGeral->show($query);
    $classGeral->insert($query);
}

$query = 'UPDATE Relatorio SET observacao = \''.$observacao.'\'';
$classGeral->show($query);
$classGeral->insert($query);

$query = 'UPDATE Relatorio SET statusResposta = 3 WHERE idRelatorio = '.$idRelatorio;
$classGeral->show($query);
$classGeral->insert($query);

$classGeral->loadPagina('../View/RelCorrigirView.php');


?>