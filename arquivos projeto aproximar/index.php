<html>
    <head>
    </head>
    <body>
        <form action="formPrinc.php" method="post">
            <table align='center' style="height: 100%;">
                <tr>
                    <td valign='middle'>
                        <table>
                            <tr><td>Type:</td></tr>
                                        <tr>
                                            <td>
                                                <select id="idType" name="type">
                                                    <option value="0">Select</option>
                                                    <option value="1">Student</option>
                                                    <option value="2">Responsable</option>
                                                    <option value="3">Interested</option>
                                                    <option value="4">Educator</option>
                                                    <option value="5">Administrator</option>
                                                    <option value="6">Institution</option>
                                                </select>
                                            </td>
                                        </tr>
                            <tr><td>Login:</td></tr>
                            <tr><td><input id="idLogin" name="login" type="email" style="width: 200px"/></td></tr>
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