<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();
?>
<div style="width: 100%;" >
    <div style="width: 100%" >
        <form action="./Persistence/formPrinc.php" method="post" >
            <table valign="middle"  style="width: 100%;height: 100%;" >
                <tr>
                    <td align="center">
                        <table style="border-style: groove;" >
                            <tr>
                                <td><label>Email</label></td>
                            </tr>
                            <tr>
                                <td><input id="email" name="email" type="email" width="10%"/></td>
                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                            </tr>
                            <tr>
                                <td><input id="password" name="password" type="password" width="10%"/></td>
                            </tr>
                            <tr>
                                <td>
                                    <table align="center">
                                        <td align="center"><button id="btLogin" name="login" style="background-color: dodgerblue;" >Entrar</button></td>
                                        <td></td>
                                        <td align="center"><a href="./CadastroView.php" >Cadastro</a></td>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
