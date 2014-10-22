<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();
$result = $classGeral->select('Select * from Turma');



?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="functionGeral.js"></script>
    </head>
    <body>
        <table cellpadding=0 cellspacing=0  align="center" style=" background-color: darkgray;width: 100%;border-bottom: none;border-left: none;border-right: none;">
            <tr>
                <td  align="left">
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="left">Cadastro de Turmas</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form action="formCadastroTurma.php" method="post">
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <tr><td ><label>&nbsp;</label></td></tr>
                <?php
                if(isset($_GET['idTurma'])){
                    $turma = $classGeral->select('Select * from Turma where idTurma = '.$_GET['idTurma']);
                    foreach($turma as $vart => $valort){
                ?>
                <tr><td>Código&nbsp;</td><td><input type="text" id="idCodigo" name="codigo" value="<?php echo $valort['codigo']?>"/></td></tr>
                <tr><td>Ano&nbsp;</td><td><input type="text" id="idAno" name="ano" value="<?php echo $valort['ano']?>"/></td></tr>
                    <?php
                    }
                    ?>
                <tr><td ><label>&nbsp;</label></td></tr>
                <input type="hidden" value="1" name="edit"/>
                <input type="hidden" value="<?php echo $_GET['idTurma'];?>" name="editIdTurma"/>
                <tr><td></td><td align="center"><input type="submit" value="Save"/></td></tr>
                <?php
                }
                else{
                ?>
                <tr><td>Código&nbsp;</td><td><input type="text" id="idCodigo" name="codigo"/></td></tr>
                <tr><td>Ano&nbsp;</td><td><input type="text" id="idAno" name="ano"/></td></tr>
                <input type="hidden" value="0" name="edit"/>
                <tr><td ><label>&nbsp;</label></td></tr>
                <tr><td></td><td align="center"><input type="submit" value="ADD"/></td></tr>
                <?php
                }
                ?>
                <tr><td ><label>&nbsp;</label></td></tr>
            </table>
        </form>
        <form action="formCadastroTurma.php" method="post">
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <tr><td align="center">Turmas</td></tr>
                <tr>
                    <td align="center">

                        <table  cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%;">
                            <tr>
                                <td align="center" >Código</td>
                                <td align="center" >Ano</td>
                                <input type="hidden" value="1" name="edit"/>
                                <td align="center"><input type="submit" value="Edit"/></td>
                            </tr>
                            <?php
                            foreach($result as $var => $valor){
                            ?>
                                <tr>
                                    <td align="center" style="width: 100px;border-style: ridge;border-bottom: none;border-left: none;border-right: none;"><label><?php echo $valor['codigo'];?></label></td>
                                    <td align="center" style="width: 200px;border-style: ridge;border-bottom: none;border-right: none;"><label><?php echo $valor['ano'];?></label></td>
                                    <td align="center" style="width: 200px;border-style: ridge;border-bottom: none;border-right: none;"><input type="radio" id="idTurma" name="idTurma" value="<?php echo $valor['idTurma'];?>"/></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
