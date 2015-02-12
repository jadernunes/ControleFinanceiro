<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();

?>
<div align="center">
    <div>
        <h1 class="titutlo">Cadastro Grupo</h1>
    </div>
    <div id="conteudo_opc">
        <div style="width: 100%;border-style: groove;border-bottom: none;" >
            <form action="./Persistence/formAdm.php" method="post">
                <table style="width: 70%;" >
                    <input name="idUsuarioCriador" type="hidden" value="<?php echo $_SESSION['user']['idUser'];?>"/>
                    <tr>
                        <td align="center">Título</td>
                    </tr>
                    <tr>
                        <td align="center"><input name="titulo" type="text" name="titulo"/></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table>
                                <tr>
                                    <td align="center"><input type="button" onclick="loadDiv('AdministracaoView.php','dados')" value="Cancelar"/></td>&nbsp;
                                    <td align="center"><button >Salvar</button></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>