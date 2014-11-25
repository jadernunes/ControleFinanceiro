<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$onload = '';

if(isset($_GET['idTurma']) && isset($_GET['idGrupo']) && isset($_GET['idRelatorio'])){
    $onload = "onload=loadDiv('descricaoCampoRelGrupo.php?idGrupo=".$_GET['idGrupo']."&idTurma=".$_GET['idTurma']."&idRelatorio=".$_GET['idRelatorio']."','div_dados');";
    $idGrupo = $_GET['idGrupo'];
}else if(isset($_GET['idTurma']) && isset($_GET['idGrupo']) && !isset($_GET['idRelatorio'])){
    $onload = "onload=loadDiv('descricaoCampoRelGrupo.php?idGrupo=".$_GET['idGrupo']."&idTurma=".$_GET['idTurma']."','div_dados');";
    $idGrupo = $_GET['idGrupo'];
}


?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Model/functionGeral.js"></script>
        <script src="../ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body <?php echo $onload;?> style="padding: 0;margin: 0;">
        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
            <tr>
                <td  align="left">
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="left">Preencher Relatório</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('../Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form action="../Persistence/formPreencherRelatorios.php" name="form" method="post" >
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
               <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['user']['idUsuario'];?>"/>
               <tr><td align="center">Selecione uma turma</td></tr>
                <tr>
                    <td align="center">
                        <select id="idTurma" name="idTurma" style="width: 200px;" onchange="loadDiv('descricaoCampoRelGrupo.php?idTurma='+$(this).val(),'div_dados')" >
                            <option value="0" >Select</option>
                            <?php
                            
                            $result = $classGeral->select('Select t.* From Turma t inner join UsuarioTurma ut on t.idTurma = ut.idTurma where ut.idUsuario = '.$_SESSION['user']['idUsuario']);

                            foreach($result as $var => $valor){
                                if(isset($_GET['idTurma'])){
                                    $select = '';
                                    if($_GET['idTurma'] == $valor['idTurma']){ 
                                        $select = 'selected="selected"';
                                    }  
                                    ?>
                                    <option  value="<?php echo $valor['idTurma'];?>" <?php echo $select;?> ><?php echo $valor['codigo'].'/'.$valor['ano'];?></option>   
                                <?php
                                }
                                else{
                                    ?>
                                    <option value="<?php echo $valor['idTurma'];?>" ><?php echo $valor['codigo'].'/'.$valor['ano'];?></option>    
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
                    <td>
                        <div id="div_dados"></div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>