<?php
?>

<table align="center" style="border-style: solid;">
    <tr ><td align="center" style="border-style: initial;"><label>Cadastro de Educador</label></td></tr>
    <tr>
        <td>
            <form action="formEducator.php" method="post">
                <table>
                    <tr>
                        <td><label>Nome</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="idNome" name="nome" type="text" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Login</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="idLogin" name="login" type="text" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Senha</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="idSenha" name="senha" type="text" style="width: 200px"/>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><input type="submit" value="Send"/></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
