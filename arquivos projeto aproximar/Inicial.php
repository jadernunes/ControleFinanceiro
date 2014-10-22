<?php
include "./config.php";
include_once "./classInstitution.php";
include_once "./classStudent.php";
include_once "./classEducator.php";
//
$classInstitution = new classInstitution();
$classStudent = new classStudent();
$classEducator = new classEducator();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<?php
$type = $_SESSION['typeUser'];

if($type == 6){
    $resultInstitutions = $classInstitution->getInstitution($_SESSION['idUser']);
    $resultStudent = $classStudent->getStudentInInstitution($_SESSION['idUser']);
    ?>
    <form action="CadastroMediaView.php" method="post">
        <table align="center"  >
            <tr>
                <td valign="top">
                    <table  >
                        <tr ><td align="center" style="border-style: initial;"><label>Institution</label></td></tr>
                        <tr >
                            <td >
                                <table align="center" style="border-style: solid;">
                                    <tr>
                                        <td style="border-style: initial;"><label>Nome</label></td>
                                        <td style="border-style: initial;"><label>&nbsp;</label></td>
                                        <td style="border-style: initial;"><label>Login</label></td>
                                    </tr>
                                    <?php 
                                     foreach($resultInstitutions as $e){
                                    ?>
                                    <tr>
                                        <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                                        <td style="border-style: initial;"><label>&nbsp;</label></td>
                                        <td style="border-style: solid;"><input type="text" value='<?php echo $e->login;?>'/></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="border-style: initial;"><input type="button" value="Cadastror Student" onclick="loadCadastroStudent();"/></td>
                        </tr>
                        <tr>
                            <td align="center" style="border-style: initial;"><input type="button" value="Cadastror Educator" onclick="loadCadastroEducator();"/></td>
                        </tr>
                        <tr>
                            <td align="center" style="border-style: initial;"><input type="button" value="Cadastror Administrator" onclick="loadCadastroAdministrator();"/></td>
                        </tr>
                    </table>
                </td>
                <?php
                if($resultStudent){
                ?>
                <td valign="top">
                    <table align="center"  >
                        <tr align="center">
                            <td align="center" style="border-style: initial;"><label align="center">Student</label></td>
                        </tr>
                        <tr>
                            <td align="center" style="border-style: initial;"><input type="submit" value="Cadastror Media" onclick="loadCadastroMedia();"/></td>
                        </tr>
                        <input id="cadastroImagem" type="hidden" name="cadastroImagem" value="1"/>
                        <tr>
                            <td>
                                <table style="border-style: solid;">
                                    <tr>
                                        <td style="border-style: initial;"><label>Nome</label></td>
                                    </tr>
                                    <?php
                                     foreach($resultStudent as $e){
                                    ?>
                                    <tr>
                                        <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                                        <td ><label>&nbsp;</label></td>
                                        <td ><input id="idStudent" type="checkbox" name="<?php echo 'idUser'.$e->idUser;?>" value="<?php echo $e->idUser;?>"/></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
                }
                $resultEducator = $classInstitution->getEducatorInInstitution($_SESSION['idUser']);
                if($resultEducator){
                ?>
                <td valign="top">
                    <table align="center" >
                        <tr >
                            <td >
                                <table align="center" >
                                    <tr><td align="center" style="border-style: initial;"><label>Educator</label></td></tr>
                                    <tr>
                                        <td>
                                            <table style="border-style: solid;">
                                                <tr>
                                                    <td style="border-style: initial;"><label>Nome</label></td>
                                                    <td style="border-style: initial;"><label>&nbsp;</label></td>
                                                    <td style="border-style: initial;"><label>Login</label></td>
                                                </tr>
                                                <?php 
                                                 foreach($resultEducator as $e){
                                                ?>
                                                <tr>
                                                    <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                                                    <td style="border-style: initial;"><label>&nbsp;</label></td>
                                                    <td style="border-style: solid;"><input type="text" value='<?php echo $e->login;?>'/></td>
                                                </tr>
                                                <?php }?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
                }
                $resultAdministrator = $classInstitution->getAdministratorInInstitution($_SESSION['idUser']);
                if($resultAdministrator){
                ?>
                <td valign="top">
                    <table align="center" >
                        <tr >
                            <td >
                                <table align="center" >
                                    <tr><td align="center" style="border-style: initial;"><label>Administrator</label></td></tr>
                                    <tr>
                                        <td>
                                            <table style="border-style: solid;">
                                                <tr>
                                                    <td style="border-style: initial;"><label>Nome</label></td>
                                                    <td style="border-style: initial;"><label>&nbsp;</label></td>
                                                    <td style="border-style: initial;"><label>Login</label></td>
                                                </tr>
                                                <?php 
                                                 foreach($resultAdministrator as $e){
                                                ?>
                                                <tr>
                                                    <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                                                    <td style="border-style: initial;"><label>&nbsp;</label></td>
                                                    <td style="border-style: solid;"><input type="text" value='<?php echo $e->login;?>'/></td>
                                                </tr>
                                                <?php }?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
                }
                ?>
            </tr>
        </table>
    </form>
<?php
}
else if($type == 1){
$resultStudent = $classStudent->getStudent($_SESSION['idUser']);
    if($resultStudent){
    ?>
        <table align="center" style="border-style: solid;">
            <tr><td align="center" style="border-style: initial;"><label>Student</label></td></tr>
            <tr>
                <td>
                    <table style="border-style: solid;">
                        <tr>
                            <td style="border-style: initial;"><label>Nome</label></td>
                            <td style="border-style: initial;"><label>&nbsp;</label></td>
                            <td style="border-style: initial;"><label>Login</label></td>
                        </tr>
                        <?php 
                         foreach($resultStudent as $e){
                        ?>
                        <tr>
                            <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                            <td style="border-style: initial;"><label>&nbsp;</label></td>
                            <td style="border-style: solid;"><input type="text" value='<?php echo $e->login;?>'/></td>
                        </tr>
                        <?php }?>
                    </table>
                </td>
            </tr>
        </table>
    <?php
    }
} else if($type == 4){
    $resultEducator = $classEducator->getEducator($_SESSION['idUser']);
    if($resultEducator){
    ?>
        <table align="center" style="border-style: solid;">
            <tr><td align="center" style="border-style: initial;"><label>Educator</label></td></tr>
            <tr>
                <td>
                    <table style="border-style: solid;">
                        <tr>
                            <td style="border-style: initial;"><label>Nome</label></td>
                            <td style="border-style: initial;"><label>&nbsp;</label></td>
                            <td style="border-style: initial;"><label>Login</label></td>
                        </tr>
                        <?php 
                         foreach($resultEducator as $e){
                        ?>
                        <tr>
                            <td style="border-style: solid;"><input type="text" value='<?php echo $e->name;?>'/></td>
                            <td style="border-style: initial;"><label>&nbsp;</label></td>
                            <td style="border-style: solid;"><input type="text" value='<?php echo $e->login;?>'/></td>
                        </tr>
                        <?php }?>
                    </table>
                </td>
            </tr>
        </table>
    <?php
    }
}
?>
    </body>
</html>

<script>
    function loadCadastroStudent(){
        window.location="CadastroStudentView.php"
    }
    function loadCadastroMedia(){
        window.location="CadastroMediaView.php"
    }
    
    function loadCadastroEducator(){
        window.location="CadastroEducatorView.php"
    }
    
    function loadCadastroAdministrator(){
        window.location="CadastroAdministratorView.php"
    }
    
</script>
