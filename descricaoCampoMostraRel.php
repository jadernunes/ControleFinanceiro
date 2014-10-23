<?php

include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];
$idGrupo = $_GET['idGrupo'];

//echo '=> descricaoCampoMostraRel';
////
//echo '<br/>';
//echo 'idUserProfessor: '.$idUserProfessor;
//echo '<br/>';
//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idGrupo: '.$idGrupo;
//echo '<br/>';

if(isset($_GET['idRelatorio'])){
    $classGeral->loadDiv('detalhePreencRelatorio.php?idGrupo='.$_GET['idGrupo'].'&idTurma='.$_GET['idTurma'].'&idRelatorio='.$_GET['idRelatorio'], 'detalheMostraRelatorio');
    $idGrupo = $_GET['idGrupo'];
}

?>
<div id='campoSelect'  >
    <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
        <tr><td align="center">Selecione um Relatório</td></tr>
         <tr>
             <td align="center">
                 <?php
                 $sq = 'Select * From Relatorio r where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and (statusResposta = 0 or statusResposta = 1)';
//                     echo $sq.'<br/>';
                 ?>
                 
                 <select id="idRelatorio" name="idRelatorio" style="width: 200px;text-align: center;" onchange="loadDiv('detalhePreencRelatorio.php?idGrupo=<?php echo $idGrupo;?>&idTurma=<?php echo $idTurma;?>&idRelatorio='+$(this).val(),'detalheMostraRelatorio');//this.disabled = true;" >
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
<div id='detalheMostraRelatorio'>
</div>