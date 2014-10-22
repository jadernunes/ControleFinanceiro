<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_POST);

$decricao = "";
$idUsuarioProfessor = "";
$idTurma = "";
$editavel = 1;
$identificadorGrupo = "";

if(isset($_POST['nameDescricaoObj']) && isset($_POST['idUsuario']) && isset($_POST['idTurma']) && isset($_POST['idGrupo']) && 
        $_POST['nameDescricaoObj'] != "" &&
        $_POST['nameDescricaoObj'] != null &&
        $_POST['idUsuario'] != "" &&
        $_POST['idUsuario'] != null &&
        $_POST['idTurma'] != "" &&
        $_POST['idTurma'] != null &&
        $_POST['idGrupo'] != "" &&
        $_POST['idGrupo'] != null
        ){
    $decricao = $_POST['nameDescricaoObj'];
    $idUsuarioProfessor = $_POST['idUsuario'];
    $idTurma = $_POST['idTurma'];
    $identificadorGrupo = $_POST['idGrupo'];
    
//1º - Inserir objetivo
//2º - Bloquear Grupo - status = 1;
    $queryObj = 'INSERT INTO myschool.Objetivo (descricao,idUsuarioProfessor, idTurma, editavel, identificadorGrupo) VALUES (\''.$decricao.'\','.$idUsuarioProfessor.','.$idTurma.','.$editavel.','.$identificadorGrupo.');';
    $idObjetivo = $classGeral->insert($queryObj);
    
    $queryBloq = 'UPDATE Grupo SET status = 1 where identificadorGrupo = '.$identificadorGrupo;
    $classGeral->insert($queryBloq);
    $classGeral->loadPagina('CadastroObjetivosView.php?idTurma='.$idTurma.'&idGrupo='.$identificadorGrupo);
}
else if(isset($_POST['nameDescricaoObj']) && isset($_POST['idUsuario']) && isset($_POST['idTurma']) && isset($_POST['idGrupo']) && 
        $_POST['nameDescricaoObj'] == "" ||
        $_POST['nameDescricaoObj'] == null && 
        $_POST['idUsuario'] != "" &&
        $_POST['idUsuario'] != null &&
        $_POST['idTurma'] != "" &&
        $_POST['idTurma'] != null &&
        $_POST['idGrupo'] != "" &&
        $_POST['idGrupo'] != null
        ){
    $idUsuarioProfessor = $_POST['idUsuario'];
    $idTurma = $_POST['idTurma'];
    $identificadorGrupo = $_POST['idGrupo'];
    
    $classGeral->alert('Você deve preencher a descrição');
    $classGeral->loadPagina('CadastroObjetivosView.php?idTurma='.$idTurma.'&idGrupo='.$identificadorGrupo);
}
else{
    $classGeral->alert('Ocorreu um erro no envio de dados.\n Preencha novamento os campos solicitados!');
    $classGeral->loadPagina('CadastroObjetivosView.php?idTurma='.$idTurma.'&idGrupo='.$identificadorGrupo);
}
?>
