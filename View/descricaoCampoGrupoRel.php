<?php

include "../Model/config.php";
include "../Model/classGeral.php";

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

$onload = "";

if(isset($_GET['idGrupo'])){
    $classGeral->loadDiv('detalheRelatorio.php?idGrupo='.$_GET['idGrupo'].'&idTurma='.$_GET['idTurma'], 'detalheRelatorio');
    $idGrupo = $_GET['idGrupo'];
}

//echo 'idProfessor: '.$idUserProfessor;
//echo '<br/>';
//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idGrupo: '.$idGrupo;
//echo '<br/>';
//echo $onload;

?>    
<div id='campoSelect'  >
    <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
        <tr><td align="center">Selecione um Grupo</td></tr>
         <tr>
             <td align="center">
                 <?php
                 $sq = 'Select g.* From Grupo g inner join Objetivo o on g.identificadorGrupo = o.identificadorGrupo  where status = 1 and o.idTurma = '.$idTurma.' and idUsuarioProfessor = '.$idUserProfessor.' group by g.identificadorGrupo';
//                     echo $sq;
                 ?>
                 
                 <select id="idGrupo" name="idGrupo" style="width: 200px;text-align: center;" onchange="loadDiv('detalheRelatorio.php?idTurma=<?php echo $idTurma;?>&idGrupo='+$(this).val(),'detalheRelatorio')" >
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
                            $status = "Liberado";
                        }
                        else if($status == 1){
                            $status = "Usado";
                        }
                        ?>
                        <option <?php echo $select;?> value="<?php echo $valor['identificadorGrupo'];?>" ><?php echo $valor['identificadorGrupo'].' - '.$status;?></option>    
                        <?php
                     }
                     ?>
                 </select>
             </td>
         </tr>
         <tr>
             <td>&nbsp;</td>
         </tr>
         <tr>
             <td>
                 <textarea style="width: 400px;height: 30px;border: none;border-style: none;resize: none;" readonly="readonly">Obs.:É gerado um relatório para cada aluno da turma selecionada com todos os objetivos selecionados abaixo</textarea>
             </td>
         </tr>
         <tr>
             <td>&nbsp;</td>
         </tr>
         <tr>
             <td align='center'><input type="submit" value="Gerar Relatório"/></td>
         </tr>
    </table>
</div>
<div>
    &nbsp;
</div>
<div id='detalheRelatorio'>
</div>