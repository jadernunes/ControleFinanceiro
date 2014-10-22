<?php

include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

$onload = "";

if(isset($_GET['idTurma'])){
    $onload = "onload=loadDiv('detalheRelatorios.php?idTurma=".$_GET['idTurma']."','div_relatorios');";
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="functionGeral.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body <?php echo $onload;?>>
        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
            <tr>
                <td  align="left">
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="left">Criar Relatórios</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form action="formCadastroRelatorios.php" name="form" method="post" >
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
               <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['user']['idUsuario'];?>"/>
               <tr><td align="center">Selecione uma turma</td></tr>
                <tr>
                    <td align="center">
                        <select id="idTurma" name="idTurma" style="width: 200px;" onchange="loadDiv('detalheRelatorios.php?idTurma='+$(this).val(),'div_relatorios')" >
                            <option value="0" >Select</option>
                            <?php

                            echo $_SESSION['user']['idUsuario'];
                            
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
                    <td align='center'><input type="submit" value="Criar novo relatório"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <div id="div_relatorios"></div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>