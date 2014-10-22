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

//echo 'idProfessor: '.$idUserProfessor;
//echo '<br/>';
//echo 'idTurma: '.$idTurma;

//$classGeral->show($_GET);

$queryO = 'Select * From Objetivo where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.'';

$resultObjetivos = $classGeral->select($queryO);

?>
<div id="descricao">
    <table  align="center" style="width: 100%;border: none;" >
        <tr>
            <td><label>Descrição</label></td>
        </tr>
        <tr>
            <td>
                <input autofocus id="idDescricaoObj" name="nameDescricaoObj" type="text" style="width: 300px;"/>
                <button type="submit">ADD</button>
            </td>
        </tr>
    </table>
    <table  align="center" style="width: 100%;border: none;">
        <tr>
            <td >&nbsp;</td>
        </tr>
        <tr>
            <td>Objetivos</td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%;border-style: groove;">
                    <tr>
                        <td>Descrição</td>
                    </tr>
                    <?php
                    foreach($resultObjetivos as $coll => $val){
                    ?>
                    <tr>
                        <td>
                            <input id="descricaoObjetivo" name="descricaoObjetivo" style="width: 100%;" value="<?php echo $val['descricao']?>"/>
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
