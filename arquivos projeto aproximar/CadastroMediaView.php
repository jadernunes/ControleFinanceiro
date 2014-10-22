
<?php
include "./config.php";
include "./classFunction.php";
include "./classMedia.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <table align="center" style="border-style: solid;">
        <tr ><td align="center" style="border-style: initial;"><label>Cadastro de Aluno</label></td></tr>
        <tr>
            <td>
                <form action="http://localhost:8080/api/media" enctype= "multipart/form-data" method="POST">
                    <table>
<!--                        <tr>
                            <td><label>Descrição</label></td>
                        </tr>-->
                        <tr>
                            <td>
                                <?php
                                foreach($_POST as $nome => $valor){
                                    $coluna = substr($nome, 0,6);
                                    if($coluna == 'idUser'){
                                        echo '<input id="idUser" type="hidden" name='.$coluna.' value="'.$valor.'"/>';
                                    }
                                }
                                ?>
                                <!--<textarea id="idDescricaoMedia" name="descricaoMedia" style="width: 500px;height: 100px"></textarea>-->
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><input type="file" name="htmlUpload" size="40"></td>
                            <td><input type="submit" value="Send" /></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</html>