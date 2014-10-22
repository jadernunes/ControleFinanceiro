<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_POST);

//$query = 'INSERT INTO `myschool`.`Objetivo` (`descricao`, `idUsuarioProfessor`, `idTurma`, `editavel`) VALUES (\''.$_POST['nameDescricaoObj'].'\','.$_POST['idUsuario'].','.$_POST['idTurma'].',1);';
//$idObjetivo = $classGeral->insert($query);

$classGeral->loadPagina('CadastroObjetivosView.php?idTurma='.$_POST['idTurma'].'&idGrupo='.$_POST['idGrupo']);
?>
