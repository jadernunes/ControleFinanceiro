<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_SESSION['user']);
//echo '<br/>';
//$classGeral->show($_POST);


//1º - Gerar relatório com todos objetivos da turma e do professor específico para todos os alunos desta mesma turma
//1.1 - inserir em relatorio
//1.2 - inserir em relatorioObjetivo

//2º - Alterar objetivos para editavel = 0;

//3º - Alterar Grupo para status = 2;







//Todos os Objetivos
$arrayObjetivos = array();

$i = 0;
foreach ($_POST as $t => $v){
    $coluna = substr($t, 0, 10);
    if(isset($coluna)){
        if($coluna == 'idObjetivo'){
            $arrayObjetivos[$i] = $v;
            $i++;
        }
    }
}

//$classGeral->show($arrayObjetivos);

//Todos os aluno
$alunos = split('&',$_POST['arrayAlunos']);
$idUsuarioProfessor = $_POST['idUsuario'];
$idTurma = $_POST['idTurma'];
$idGrupo = $_POST['idGrupo'];

for($xA = 0;$xA < count($alunos);$xA++){
    
    $idAluno = $alunos[$xA];
    $data = date('d/m/Y');
    $codigo = 'A'.$idAluno.'-T'.$idTurma.'-P'.$idUsuarioProfessor.'-'.$data.'';
    
    $sqlInsRel = 'INSERT INTO myschool.Relatorio (idUsuarioProfessor, idUsuarioAluno,idTurma, observacao, statusResposta, codigo, identificadorGrupo) VALUES ('.$idUsuarioProfessor.','.$alunos[$xA].','.$idTurma.',"",0,\''.$codigo.'\','.$idGrupo.');';
//    echo '<br/>';
//    echo $sqlInsRel;
    $idRelatorio = $classGeral->insert($sqlInsRel);
    
    for($yO = 0;$yO < count($arrayObjetivos);$yO++){
        
        $sqlInsRelObj = 'INSERT INTO myschool.RelatorioObjetivo (idRelatorio, idObjetivo, status) VALUES ('.$idRelatorio.','.$arrayObjetivos[$yO].',0);';
        $idRelatorioObjetivo = $classGeral->insert($sqlInsRelObj);
        
        $sqlAlterObj = 'UPDATE Objetivo set editavel = 0 where editavel = 1 and idObjetivo = '.$arrayObjetivos[$yO];
        $classGeral->insert($sqlAlterObj);
        
        $sqlAlterGrupo = 'UPDATE Grupo set status = 2 where status = 1 and identificadorGrupo = '.$idGrupo;
        $classGeral->insert($sqlAlterGrupo);
    }
}

$classGeral->loadPagina('CadastroRelatoriosView.php');

//echo count($arrayObjetivos);















//echo '<br/>';
//$idTurma = 0;
//$idUserProfessor = 0;
//
//if(isset($_SESSION['user']) && isset($_POST['idTurma'])){
//    $idUserProfessor = $_SESSION['user']['idUsuario'];
//    $idTurma = $_POST['idTurma'];
//}
//else if(!isset($_SESSION['user']) && isset($_POST['idTurma'])){
//    $classGeral->alert("Usuáro não logado");
//}
//else if(isset($_SESSION['user']) && !isset($_POST['idTurma'])){
//    $classGeral->alert("Nenhuma turma foi selecionada");
//}
//else if(!isset($_SESSION['user']) && !isset($_POST['idTurma'])){
//    $classGeral->alert("Usuário não logado e turma não selecionada");
//}

//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idUser: '.$idUserProfessor;
//break;
//$query = 'Select * from Usuario u inner join UsuarioTurma ut on u.idUsuario = ut.idUsuario where u.idTipoUsuario = 2 and ut.idTurma = '.$idTurma;
//$r1 = $classGeral->select($query);

//$jatem = false;
//
//foreach ($r1 as $col => $valor){
//    $idAluno = $valor['idUsuario'];
//    $data = date('d/m/Y');
//    $nomeAluno = $valor['nome'];
//    $nomeAluno = $classGeral->remover_caracter($nomeAluno);
//    $codigo = $nomeAluno.'-T'.$idTurma.'-P'.$idUserProfessor.'-'.$data.'';
//    
//    $querySel = 'Select * From Relatorio where idUsuarioProfessor = '.$idUserProfessor.' and idUsuarioAluno = '.$idAluno.' and idTurma = '.$idTurma.' and  statusResposta = 0';
//    
//    $resAux = $classGeral->select($querySel);
//    
//    if(count($resAux) > 0){
//        $jatem = true;
//    }
//}
//
//if($jatem){
//    $classGeral->alert('Existe relaórios a serem preenchidos para os alunos desta turma!');
//}
// else {
//    foreach ($r1 as $col => $valor){
//        
//        $idAluno = $valor['idUsuario'];
//        $data = date('d/m/Y');
//        $nomeAluno = $valor['nome'];
//        $nomeAluno = $classGeral->remover_caracter($nomeAluno);
//        $codigo = $nomeAluno.'-T'.$idTurma.'-P'.$idUserProfessor.'-'.$data.'';
//
//        $queryRelatorio = 'INSERT INTO Relatorio (idUsuarioProfessor, idUsuarioAluno, idTurma, observacao, statusResposta, codigo) VALUES ('.$idUserProfessor.','.$idAluno.', '.$idTurma.',"",0, \''.$codigo.'\');';
//        $idRelatorio = $classGeral->insert($queryRelatorio);
//        
//        $queryConsObjetivoProfTurma = 'Select * From Objetivo where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and editavel = 1';
//        $resltObj = $classGeral->select($queryConsObjetivoProfTurma);
//        
//        foreach ($resltObj as $colObj => $valorObj){
//            $idObjetivo = $valorObj['idObjetivo'];
//            $queryRelatorioObjetivo = 'INSERT INTO RelatorioObjetivo (idRelatorio,idObjetivo,status) VALUES ('.$idRelatorio.','.$idObjetivo.',0)';
//            $classGeral->insert($queryRelatorioObjetivo);
//        }
//    }
//}
//
//$classGeral->loadPagina('CadastroRelatoriosView.php?idTurma='.$_POST['idTurma']);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
</html>