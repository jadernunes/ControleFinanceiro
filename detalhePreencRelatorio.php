<?php

include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];
$idGrupo = $_GET['idGrupo'];


?>
<tr>
    <td>
        Observação
    </td>
</tr>
<tr>
    <td>
        <textarea style="width: 500px;height: 100px;resize: none;" ></textarea>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td align='center'><input type="submit" value='Salvar'/></td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>