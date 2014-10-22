<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['deleteIdTurma'])){
    $classGeral->insert('Delete From Turma where idTurma = '.$_POST['deleteIdTurma']);
    $classGeral->loadPagina('CadastroTurmaView.php');
}else if($_POST['edit'] == 1 && isset($_POST['editIdTurma'])){
    //Update
    $classGeral->insert('Update Turma set codigo = \''.$_POST['codigo'].'\', ano = \''.$_POST['ano'].'\' where idTurma = '.$_POST['editIdTurma']);
    $classGeral->loadPagina('CadastroTurmaView.php');
}
else if($_POST['edit'] == 0 && !isset($_POST['idTurma'])){
    //Insert
    $classGeral->insert('INSERT INTO Turma (codigo, ano) VALUES (\''.$_POST['codigo'].'\',\''.$_POST['ano'].'\')');
    $classGeral->loadPagina('CadastroTurmaView.php');
}
else if($_POST['edit'] == 1 && isset($_POST['idTurma'])){
    //envia idTurma para pagina
    $classGeral->loadPagina('CadastroTurmaView.php?idTurma='.$_POST['idTurma']);
}

?>