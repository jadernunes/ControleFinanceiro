<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral(); 
$idUsuario = 0;
$idTipoUsuario = 0;

if(isset($_GET['idUsuario']) && isset($_GET['idTipoUsuario'])){
    $idUsuario = $_GET['idUsuario'];
    $idTipoUsuario = $_GET['idTipoUsuario'];
}
    
    
$result = $classGeral->select('Select * from usuario where idUsuario = '.$idUsuario.' and ativo = 1');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Model/functionGeral.js"></script>
        <script src="../ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body style="padding: 0;margin: 0;">
        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
            <tr>
                <td  align="left">
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="left">Editar Usuario</td>
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
        <form action="../Persistence/formEditUser.php" method="post">
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <input type="hidden" id="idTipoUsuario" name="idTipoUsuario" value="<?php echo $idTipoUsuario;?>"/>
                <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario;?>"/>
                <?php
                foreach($result as $var => $valor){
                    ?>
                    <tr><td ><label>&nbsp;</label></td></tr>
                    <tr><td>Nome&nbsp;</td><td><input type="text" id="idNome" name="nome" value="<?php echo $valor['nome']?>"/></td></tr>
                    <tr><td>login&nbsp;</td><td><input type="email" id="idLogin" name="login" value="<?php echo $valor['login'];?>"/></td></tr>
                    
                    <tr><td>password&nbsp;</td><td><input type="password" id="idPassword" name="password" /></td></tr>
                    
                    <tr><td>rep password&nbsp;</td><td><input type="password" id="idRepPassword" name="repPassword" /></td></tr>
                    <tr><td ><label>&nbsp;</label></td></tr>
                    <tr><td></td><td align="center"><input type="submit" value="Salvar"/></td></tr>
                    <tr><td ><label>&nbsp;</label></td></tr>
                    <?php
                }
                ?>
            </table>
        </form>
    </body>
</html>