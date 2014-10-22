<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_SESSION['user']);
//echo '<br/>';
//$classGeral->show($_POST);
//echo '<br/>';
$idTurma = 0;
$idUserProfessor = 0;

if(isset($_SESSION['user']) && isset($_POST['idTurma'])){
    $idUserProfessor = $_SESSION['user']['idUsuario'];
    $idTurma = $_POST['idTurma'];
}
else if(!isset($_SESSION['user']) && isset($_POST['idTurma'])){
    $classGeral->alert("Usuáro não logado");
}
else if(isset($_SESSION['user']) && !isset($_POST['idTurma'])){
    $classGeral->alert("Nenhuma turma foi selecionada");
}
else if(!isset($_SESSION['user']) && !isset($_POST['idTurma'])){
    $classGeral->alert("Usuário não logado e turma não selecionada");
}

//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idUser: '.$idUserProfessor;
//break;
$query = 'Select * from Usuario u inner join UsuarioTurma ut on u.idUsuario = ut.idUsuario where u.idTipoUsuario = 2 and ut.idTurma = '.$idTurma;
$r1 = $classGeral->select($query);

$jatem = false;

foreach ($r1 as $col => $valor){
    $idAluno = $valor['idUsuario'];
    $data = date('d/m/Y');
    $nomeAluno = $valor['nome'];
    $nomeAluno = $classGeral->remover_caracter($nomeAluno);
    $codigo = $nomeAluno.'-T'.$idTurma.'-P'.$idUserProfessor.'-'.$data.'';
    
    $querySel = 'Select * From Relatorio where idUsuarioProfessor = '.$idUserProfessor.' and idUsuarioAluno = '.$idAluno.' and idTurma = '.$idTurma.' and  statusResposta = 0';
    
    $resAux = $classGeral->select($querySel);
    
    if(count($resAux) > 0){
        $jatem = true;
    }
}

if($jatem){
    $classGeral->alert('Existe relaórios a serem preenchidos para os alunos desta turma!');
}
 else {
    foreach ($r1 as $col => $valor){
        
        $idAluno = $valor['idUsuario'];
        $data = date('d/m/Y');
        $nomeAluno = $valor['nome'];
        $nomeAluno = $classGeral->remover_caracter($nomeAluno);
        $codigo = $nomeAluno.'-T'.$idTurma.'-P'.$idUserProfessor.'-'.$data.'';

        $queryRelatorio = 'INSERT INTO Relatorio (idUsuarioProfessor, idUsuarioAluno, idTurma, observacao, statusResposta, codigo) VALUES ('.$idUserProfessor.','.$idAluno.', '.$idTurma.',"",0, \''.$codigo.'\');';
        $idRelatorio = $classGeral->insert($queryRelatorio);
        
        $queryConsObjetivoProfTurma = 'Select * From Objetivo where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and editavel = 1';
        $resltObj = $classGeral->select($queryConsObjetivoProfTurma);
        
        foreach ($resltObj as $colObj => $valorObj){
            $idObjetivo = $valorObj['idObjetivo'];
            $queryRelatorioObjetivo = 'INSERT INTO RelatorioObjetivo (idRelatorio,idObjetivo,status) VALUES ('.$idRelatorio.','.$idObjetivo.',0)';
            $classGeral->insert($queryRelatorioObjetivo);
        }
    }
}

$classGeral->loadPagina('CadastroRelatoriosView.php?idTurma='.$_POST['idTurma']);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
</html>