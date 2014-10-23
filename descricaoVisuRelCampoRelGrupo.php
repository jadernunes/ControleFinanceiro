<?php
include "./config.php";
include "./classGeral.php";

//claravel = framework para mvc em php
//sequel


$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];


if(isset($_GET['idGrupo']) && isset($_GET['idTurma']) && isset($_GET['idRelatorio'])){
    $classGeral->loadDiv('descricaoCampoMostraRel.php?idGrupo='.$_GET['idGrupo'].'&idTurma='.$_GET['idTurma'].'&idRelatorio='.$_GET['idRelatorio'], 'detalhePreencRelatorio');
    $idGrupo = $_GET['idGrupo'];
}else if(isset($_GET['idGrupo']) && isset($_GET['idTurma']) && !isset($_GET['idRelatorio'])){
    $classGeral->loadDiv('descricaoCampoMostraRel.php?idGrupo='.$_GET['idGrupo'].'&idTurma='.$_GET['idTurma'], 'detalhePreencRelatorio');
    $idGrupo = $_GET['idGrupo'];
}

?>
<div id='campoSelect'  >
    <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
        <tr><td align="center">Selecione um Grupo</td></tr>
         <tr>
             <td align="center">
                 <?php
                 $sq = 'Select g.* From Grupo g inner join Relatorio r on g.identificadorGrupo = r.identificadorGrupo where r.idTurma = '.$idTurma.' and r.idUsuarioProfessor = '.$idUserProfessor.' group by g.identificadorGrupo';
//                     echo $sq;
                 ?>
                 
                 <select id="idGrupo" name="idGrupo" style="width: 200px;text-align: center;" onchange="loadDiv('descricaoVisuRelCampoMostraRel.php?idTurma=<?php echo $idTurma;?>&idGrupo='+$(this).val(),'detalhePreencRelatorio'); if($(this).val() > 0){setVisible('btImprimeGrupo',true);}else{setVisible('btImprimeGrupo',false);}" >
                     <option value="0" >Select</option>
                     <?php
                     $result = $classGeral->select($sq);
                     foreach($result as $var => $valor){
                        $select = '';
                        
                        $status = $valor['status'];
                        if($status == 0){
                            $status = " - Liberado";
                        }
                        else if($status == 1){
                            $status = " - Usado";
                        }
                        else{
                            $status = "";
                        }
                        if(isset($_GET['idGrupo'])){
                           if($_GET['idGrupo'] == $valor['identificadorGrupo']){ 
                               $select = 'selected="selected"';
                           }
                        ?>
                        <option <?php echo $select;?> value="<?php echo $valor['identificadorGrupo'];?>" ><?php echo $valor['identificadorGrupo'].$status;?></option>    
                        <?php
                        }
                        else{
                            ?>
                            <option value="<?php echo $valor['identificadorGrupo'];?>" ><?php echo $valor['identificadorGrupo'].$status;?></option>    
                            <?php
                        }
                     }
                     ?>
                 </select>
             </td>
         </tr>
         <tr>
             <td>&nbsp;</td>
         </tr>
         <tr>
             <td align='center'><input disabled="disabled" style="display: none;" id='btImprimeGrupo'  name="btImprimeGrupo" type='button' value='Imprimir Relatório do Grupo'/></td>
        </tr>
        <tr>
             <td>&nbsp;</td>
         </tr>
    </table>
</div>
<div id='detalhePreencRelatorio'>
</div>