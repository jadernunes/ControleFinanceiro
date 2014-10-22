<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

$idTurma = 0;
$idUserProfessor = 0;

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

$queryO = 'Select * From Relatorio where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and statusResposta = 0';

//echo $queryO;

$resultRelatorios = $classGeral->select($queryO);
?>

<div id="descricao">
    <table  align="center" style="width: 100%;border: none;">
        <tr>
            <td >&nbsp;</td>
        </tr>
        <tr>
            <td>Relatórios não preenchidos</td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%;border-style: groove;">
                    <tr>
                        <td>Código</td>
                    </tr>
                    <?php
                    foreach($resultRelatorios as $coll => $val){
                    ?>
                    <tr>
                        <td>
                            <input readonly="readonly" id="codigoRelatorio" name="codigoRelatorio" style="width: 100%;" value="<?php echo $val['codigo']?>"/>
                        </td>
                        <td>
                            <input type="checkbox" />
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</div>