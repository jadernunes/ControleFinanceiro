<?php
include "../Model/config.php";
include "../Model/classGeral.php";

//claravel = framework para mvc em php
//sequel


$classGeral = new classGeral();

$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];

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
                 
                 <select id="idGrupo" name="idGrupo" style="width: 200px;text-align: center;" onchange="loadDiv('RelConcVisu.php?idTurma=<?php echo $idTurma;?>&idGrupo='+$(this).val(),'detalhePreencRelatorioConc');loadDiv('RelConfVisu.php?idTurma=<?php echo $idTurma;?>&idGrupo='+$(this).val(),'detalhePreencRelatorioConf'); if($(this).val() > 0){setVisible('btImprimirGrupoConc',true);setVisible('btImprimirGrupoConf',true);}else{setVisible('btImprimirGrupoConc',false);setVisible('btImprimirGrupoConf',false);}" >
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
             <td align='center'><input style="display: none;" id='btImprimirGrupoConc'  name="btImprimirGrupoConc" type='submit' value='Imprimir Relatórios do Grupo - Concluídos'/></td>
        </tr>
        <tr>
            <td align='center'><input style="display: none;" id='btImprimirGrupoConf'  name="btImprimirGrupoConf" type='submit' value='Imprimir Relatórios do Grupo - Confirmádos'/></td>
        </tr>
        <tr>
             <td>&nbsp;</td>
         </tr>
    </table>
</div>
<div id='detalhePreencRelatorioConc'>
</div>
<div id='detalhePreencRelatorioConf'>
</div>