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

$onload = "";

if(isset($_GET['idGrupo'])){
    $onload = "loadDiv('detalheObjetivos.php?idGrupo=".$_GET['idGrupo']."&idTurma=".$_GET['idTurma']."','div_dados');";
}



?>
<script>
    if(isVisible('campoSelect')){
        loadDiv('detalheObjetivos.php?idGrupo='+<?php echo $_GET['idGrupo']?>+'&idTurma='+<?php echo $_GET['idTurma'];?>'\',\'div_dados\'');
    }
</script>
    
    
<div id='campoSelect'  >
    <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
        <tr><td align="center">Selecione um Grupo</td></tr>
         <tr>
             <td align="center">
                 <select id="idGrupo" name="idGrupo" style="width: 200px;" onchange="loadDiv('detalheObjetivos.php?idTurma=<?php echo $idTurma;?>','detalheObjetivo')" >
                     <option value="0" >Select</option>
                     <?php
                     $result = $classGeral->select('Select * From Grupo');
                     foreach($result as $var => $valor){
                         $select = '';
                         if(isset($_GET['idGrupo'])){
                            if($_GET['idGrupo'] == $valor['identificadorGrupo']){ 
                                $select = 'selected="selected"';
                            }
                         }
                        ?>
                        <option <?php echo $select;?> value="<?php echo $valor['identificadorGrupo'];?>" ><?php echo $valor['identificadorGrupo'];?></option>    
                        <?php
                     }
                     ?>
                 </select>
             </td>
         </tr>
    </table>
</div>
<div id='detalheObjetivo'>
</div>