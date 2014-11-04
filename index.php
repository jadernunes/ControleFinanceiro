<?php
include "Model/config.php";
include "Model/classGeral.php";

$classGeral = new classGeral();
$result = $classGeral->select('Select * From TipoUsuario');

//echo '<br/>';
//echo '<pre>';
//print_r($result);
//echo '</pre>';

//foreach($result as $var => $valor){
//    echo '<br/>';
//    echo $valor['idTipoUsuario'];
//}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="Model/functionGeral.js"></script>
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body>
        <form action="./Persistence/formPrinc.php" method="post">
            <table align='center' style="height: 100%;">
                <tr>
                    <td valign='left'>
                        <table>
                            <tr><td>Type:</td></tr>
                                        <tr>
                                            <td>
                                                <select id="idType" name="type" style="width: 100px;">
                                                    <option value="0">Select</option>
                                                    <?php
//                                                    foreach($result as $var => $valor){
//                                                        echo $valor['idTipoUsuario'];
//                                                    }
                                                    
                                                    foreach($result as $var => $valor){
                                                        ?>
                                                    <option value="<?php echo $valor['idTipoUsuario'];?>"><?php echo $valor['descricao'];?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                            <tr><td>Login:</td></tr>
                            <tr><td><input id="idUsername" name="username" type="email" style="width: 200px"/></td></tr>
                            <tr><td>Password:</td></tr>
                            <tr><td><input id="idPassword" name="password" type="password" style="width: 100px"/></td></tr>
                            <tr><td><input type="submit" value="Entrar" style="width: 50px"></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>