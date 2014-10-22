<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];

//statusResposta == 0 => nao foi preenchido
//statusResposta == 1 => os Objetivos foram preenchidos parcialmente - salvar
//statusResposta == 2 => foi preenchido completamente mas não foi avaliado - confirmar
//statusResposta == 3 => foi avaliado e retornou para edição - Confirmar
//statusResposta == 4 => foi avaliado e confirmado. Obs.: Com este status o relatório e seus objetivos e seu grupo não podem mais serem editados nem excluidos.
//$query = 'Select * From Usuario u inner join Relatorio r on r.idUsuarioAluno = u.idUsuario where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and statusResposta = 0';
//$resltAl = $classGeral->select($query)

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
                 
                 <select id="idGrupo" name="idGrupo" style="width: 200px;text-align: center;" onchange="loadDiv('detalhePreencRelatorio.php?idTurma=<?php echo $idTurma;?>&idGrupo='+$(this).val(),'detalhePreencRelatorio')" >
                     <option value="0" >Select</option>
                     <?php
                     
                     $result = $classGeral->select($sq);
                     foreach($result as $var => $valor){
                         $select = '';
                         if(isset($_GET['idGrupo'])){
                            if($_GET['idGrupo'] == $valor['identificadorGrupo']){ 
                                $select = 'selected="selected"';
                            }
                         }
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
                        ?>
                        <option <?php echo $select;?> value="<?php echo $valor['identificadorGrupo'];?>" ><?php echo $valor['identificadorGrupo'].$status;?></option>    
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
<div>
    &nbsp;
</div>
<div id='detalhePreencRelatorio'>
</div>