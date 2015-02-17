<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();
?>
<div align="center">
    <div>
        <h1 class="titutlo">Perfil</h1>
    </div>
    <div id="conteudo_opc">
        <div style="width: 100%;border-style: groove;border-bottom: none;" >
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
                                                            <input id="nome" name="nome" value="<?php echo $_SESSION['user']['nome']?>"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Email</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input id="email" name="email" value="<?php echo $_SESSION['user']['email']?>"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Senha</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input type="password" id="password" name="password"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <label>Confirme sua senha</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style="width: 70%;">
                                                            <input type="password" id="confPassword" name="confPassword"/>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='center' style="width: 70%;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td align='center'><button name="page" value="Inicial-dados" style="background-color: red;">Cancelar</button>&nbsp;<button style="background-color: green;" name="savarPerfil" >Salvar</button></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</div>