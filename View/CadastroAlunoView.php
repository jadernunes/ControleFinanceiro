<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();
$result = $classGeral->select('Select * from usuario u where u.idTipoUsuario = 2 and ativo = 1');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Model/functionGeral.js"></script>
        <script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body>
        <table cellpadding=0 cellspacing=0  align="center" style=" background-color: darkgray;width: 100%;border-bottom: none;border-left: none;border-right: none;">
            <tr>
                <td  align="left">
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="left">Cadastro de Aluno</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('../Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form action="../Persistence/formCadastroAluno.php" method="post">
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <input type="hidden" id="idTipoUsuario" name="idTipoUsuario" value="2"/>
                <tr><td ><label>&nbsp;</label></td></tr>
                <tr><td>Nome&nbsp;</td><td><input type="text" id="idNome" name="nome" /></td></tr>
                <tr><td>login&nbsp;</td><td><input type="email" id="idLogin" name="login" /></td></tr>
                <tr><td>password&nbsp;</td><td><input type="password" id="idPassword" name="password" /></td></tr>
                <tr><td>rep password&nbsp;</td><td><input type="password" id="idRepPassword" name="repPassword" /></td></tr>
                <tr><td ><label>&nbsp;</label></td></tr>
                <tr><td></td><td align="center"><input type="submit" value="ADD"/></td></tr>
                <tr><td ><label>&nbsp;</label></td></tr>
            </table>
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <tr><td align="center">Alunos</td></tr>
                <tr>
                    <td align="center">
                        <table  cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%;">
                            <tr>
                                <td align="center" ></td>
                                <td align="center" ></td>
                                <td align="center" >Nome</td>
                                <td align="center" >email</td>
                            </tr>
                            <?php
                            foreach($result as $var => $valor){
                            ?>
                                <tr>
                                    <td ><input type="submit" id="radioIdUser" name="radioIdUser<?php echo $valor['idUsuario'];?>" value="Excluir"/></td>
                                    <td ><input type="submit" id="radioEditIdUser" name="radioEditIdUser<?php echo $valor['idUsuario'];?>" value="Editar"/></td>
                                    <td align="center" style="width: 100px;border-style: ridge;border-bottom: none;border-left: none;border-right: none;"><label><?php echo $valor['nome'];?></label></td>
                                    <td align="center" style="width: 200px;border-style: ridge;border-bottom: none;border-right: none;"><label><?php echo $valor['login'];?></label></td>
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