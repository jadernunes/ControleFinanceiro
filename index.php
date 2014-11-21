<?php
include "./Model/config.php";
include "./Model/classGeral.php";
$classGeral = new classGeral();
$result = $classGeral->select('Select * From TipoUsuario');



//foreach($result as $var => $valor){
//    echo '<br/>';
//    echo $valor['idTipoUsuario'];
//}

//$classGeral->show($_SESSION);

$onload = "";
if(isset($_SESSION['user']))
{
    if(isset($_SESSION['user']['idTipoUsuario']) && isset($_SESSION['user']['login']) && isset($_SESSION['user']['password'])){
//        if($_SESSION['user']['idTipoUsuario'] > 0 && strlen($_SESSION['user']['login']) > 0 && strlen($_SESSION['user']['password']) > 0){
            $onload = "onload=loadPagina('Persistence/formPrinc.php?type=".$_SESSION['user']['idTipoUsuario']."&username=".$_SESSION['user']['login']."&password=".$_SESSION['user']['password']."');";
//        }
    }
}
else
{
    if(isset($_SESSION['reopen'])){
        if($_SESSION['reopen'] != 1){
            $classGeral->registrarAcesso();
        }
        else{
            $_SESSION['reopen'] = 0;
        }
    }
    else
    {
        $classGeral->registrarAcesso();
    }
}
?>
<html >
    <head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf8_general_ci" />-->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="Model/functionGeral.js"></script>
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body <?php echo $onload;?> >
        <?php
        if(!isset($_SESSION['user'])){
            ?>
            <table align='center' style="height: 100%;">
                <tr>
                    <td valign='left'>
                        <form action="./Persistence/formPrinc.php" method="post">
                            <table>
                                <tr><td><b>Type:</b></td></tr>
                                            <tr>
                                                <td>
                                                    <select id="idType" name="type" style="width: 100%;" >
                                                        <option value="0">Select</option>
                                                        <?php
                                                        foreach($result as $var => $valor){
                                                            ?>
                                                        <option value="<?php echo $valor['idTipoUsuario'];?>"><?php echo $valor['descricao'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                <tr><td><b>Login:</b></td></tr>
                                <tr><td><input id="idUsername" name="username" type="email" style="width: 200px"/></td></tr>
                                <tr><td><b>Password:</b></td></tr>
                                <tr><td><input id="idPassword" name="password" type="password" style="width: 100px"/></td></tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button id="btEntrar" name="btEntrar" type="submit" style="width: 100%;font: bold 14px Arial;color: green;">Entrar</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td style="width: 100px;">&nbsp;</td>
                    <td valign='left'>
                        <form action="./Persistence/formRelatorioAcessos.php" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <button id="btAcessos" name="btAcessos" type="submit" style="width: 150px;font: bold 14px Arial;">Acessos no Sistema</button>
                                    </td>
                                </tr>
                            </table>
<!--                            <table>
                                <tr>
                                    <td>
                                        <button id="btAcessosMes" name="btAcessosMes" type="submit" style="width: 150px;font: bold 14px Arial;">Acessos no Mês</button>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        <button id="btAcessosAno" name="btAcessosAno" type="submit" style="width: 150px;font: bold 14px Arial;">Acessos no Ano</button>
                                    </td>
                                </tr>
                            </table>-->
                        </form>
                    </td>
                </tr>
            </table>
        <?php  }?>
    </body>
</html>