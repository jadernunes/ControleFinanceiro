<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$classGeral->show($_POST);

$idRelatorio = $_POST['idRelatorio'];

$classGeral->insert('UPDATE Relatorio set statusResposta = 3 where idRelatorio = '.$idRelatorio);
?>