<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();
$gupos = $myClass->getGrupos();
?>
<html >
    <head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <link href="defaultCSS.css" rel="stylesheet">
        <script src="./Model/functionGeral.js" ></script>
        <title>Controle Financeiro</title>
    </head>
    <body style="padding: 0;margin: 0; padding: 10px;" >
        <div align="center">
            <div>
                <h1 class="titutlo">Cadastro</h1>
            </div>
            <div id="conteudo_opc" >
                <div style="width: 100%;height: 100%; border-style: groove;border-bottom: none;border-left: none;border-right: none;overflow-y: scroll;">
                    <table style="width: 30%;">
                        <tr>
                            <td>
                                <form action="./Persistence/formPrinc.php" method="post" >
                                    <table style="width: 100%;">
                                        <tr>
                                            <td align="center" style="width: 70%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Nome</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input id="nome" name="nome"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Email</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input id="email" name="email"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Senha</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input id="password" name="password"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Confirme sua senha</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input id="confPassword" name="confPassword"/>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='center' style="width: 70%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td align='center'><button type="reset" id="btCancel" name="cancel" style="background-color: red;" onclick="loadPagina('Index.php')">Cancelar</button>&nbsp;<button style="background-color: green;" id="btCadastro" name="cadastro">Salvar</button></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                            
                            <?php
                            /*
                            if($gupos)
                            {
                            ?>
                            <td>
                                <table style="width: 200%;">
                                    
                                    <tr>
                                        <td >
                                            
                                            
                                            <div>
                                                <table >
                                                    <tr>
                                                        <td>
                                                            <label>Grupos</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div style="overflow-y: scroll;height: 100%;border-style: groove;">
                                                <table valign="top" >
                                                    <?php
                                                    foreach ($gupos as $coll => $dado)
                                                    {
                                                        ?>
                                                    <tr><td ><input type="checkbox" name="<?php echo 'name_IdGrupo_'.$dado['idGrupo']?>" /><?php echo $dado['titulo']?></td></tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <?php
                            }
                             
                             */
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>