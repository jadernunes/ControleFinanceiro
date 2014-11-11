<?php

include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];
$idGrupo = $_GET['idGrupo'];

?>
<div id='campoSelect'  >
    <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
        <tr><td align="center">Selecione um Relatório Confirmado</td></tr>
         <tr>
             <td align="center">
                 <?php
                 $sq = 'Select * From Relatorio r where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and statusResposta = 4';
//                     echo $sq.'<br/>';
                 ?>
                 
                 <select id="idRelatorio" name="idRelatorio" style="width: 200px;text-align: center;" onchange="loadDiv('RelConfVisuDetPreench.php?idGrupo=<?php echo $idGrupo;?>&idTurma=<?php echo $idTurma;?>&idRelatorio='+$(this).val(),'detalheMostraRelatorioConf');//this.disabled = true;" >
                     <option value="0" >Select</option>
                     <?php
                     
                     $result = $classGeral->select($sq);
                     foreach($result as $var => $valor){
                        $select = '';
                        if(isset($_GET['idRelatorio'])){
                           if($_GET['idRelatorio'] == $valor['idRelatorio']){ 
                               $select = 'selected="selected"';
                           }
                        }
                        ?>
                        <option <?php echo $select;?> value="<?php echo $valor['idRelatorio'];?>" ><?php echo $valor['codigo'];?></option>    
                        <?php
                     }
                     ?>
                 </select>
             </td>
         </tr>
         <tr>
             <td>&nbsp;</td>
         </tr>
    </table>
</div>
<div id='detalheMostraRelatorioConf'>
</div>