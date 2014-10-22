<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

$idTurma = 0;
$idUserProfessor = 0;
$idGrupo = 0;

if(isset($_SESSION['user']) && isset($_GET['idTurma'])){
    $idUserProfessor = $_SESSION['user']['idUsuario'];
    $idTurma = $_GET['idTurma'];
}
else if(!isset($_SESSION['user']) && isset($_GET['idTurma'])){
    $classGeral->alert("Usuáro não logado");
}
else if(isset($_SESSION['user']) && !isset($_GET['idTurma'])){
    $classGeral->alert("Nenhuma turma foi selecionada");
}
else if(!isset($_SESSION['user']) && !isset($_GET['idTurma'])){
    $classGeral->alert("Usuário não logado e turma não selecionada");
}

if(isset($_GET['idGrupo'])){
    $idGrupo = $_GET['idGrupo'];
}

//echo 'idProfessor: '.$idUserProfessor;
//echo '<br/>';
//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idGrupo: '.$idGrupo;
//echo '<br/>';

//1º - Selecionar todos os Objetivos de uma determinada Turma e um Grupo e um Professor
//Select * From Objetivos where idUsusarioProfessor = $idUserProfessor and idTurma = $idTurma and idIdentificadorGrupo = $idGrupo and editavel = 1
$queryObj = 'Select * From Objetivo where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and editavel = 1';
$resultObj = $classGeral->select($queryObj);

//2º - Selecionar todos alunos da Turma
$queryAlunos = 'Select * From Usuario u inner join UsuarioTurma ut on u.idUsuario = ut.idUsuario where u.idTipoUsuario = 2 and ut.idTurma = '.$idTurma;
$resultAlunos = $classGeral->select($queryAlunos);
$arrayA = "";
$i = 0;
foreach ($resultAlunos as $colA => $valA){
    if($i == 0)
        $arrayA = $arrayA.$valA['idUsuario'];
    else{
        $arrayA = $arrayA.'&'.$valA['idUsuario'];
    }
    $i++;
}
?>
<table align="center" style="width: 100%;">
    <tr>
        <td >
            <b>Objetivos</b>
        </td>
    </tr>
    <tr>
        <td >
            <table align="left" style="width: 100%;">
                <input type="hidden" name="arrayAlunos" value="<?php echo $arrayA;?>"/>
                <tr><td align='left'>Descrição</td></tr>
                <?php 
                
                foreach ($resultObj as $coll => $valor){
                
                ?>
                <tr>
                    <td>
                        <input type="checkbox" id="idObjetivo" name="idObjetivo<?php echo $valor['idObjetivo'];?>" value="<?php echo $valor['idObjetivo'];?>"/>
                        <input type="text" readonly="readonly" id="descricao" value='<?php echo $valor['descricao'];?>'/>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </td>
    </tr>
</table>