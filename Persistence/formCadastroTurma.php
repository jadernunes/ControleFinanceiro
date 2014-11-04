<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['deleteIdTurma'])){
    $classGeral->insert('Delete From Turma where idTurma = '.$_POST['deleteIdTurma']);
    $classGeral->loadPagina('../View/CadastroTurmaView.php');
}else if($_POST['edit'] == 1 && isset($_POST['editIdTurma'])){
    //Update
    $classGeral->insert('Update Turma set codigo = \''.$_POST['codigo'].'\', ano = \''.$_POST['ano'].'\' where idTurma = '.$_POST['editIdTurma']);
    $classGeral->loadPagina('../View/CadastroTurmaView.php');
}
else if($_POST['edit'] == 0 && !isset($_POST['idTurma'])){
    //Insert
    $classGeral->insert('INSERT INTO Turma (codigo, ano,serie) VALUES (\''.$_POST['codigo'].'\',\''.$_POST['ano'].'\',\''.$_POST['serie'].'\')');
    $classGeral->loadPagina('../View/CadastroTurmaView.php');
}
else if($_POST['edit'] == 1 && isset($_POST['idTurma'])){
    //envia idTurma para pagina
    $classGeral->loadPagina('../View/CadastroTurmaView.php?idTurma='.$_POST['idTurma']);
}

?>