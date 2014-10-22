<?php
include "./config.php";
include "./classFunction.php";
include "./classAdministrator.php";


$idUser = $_SESSION['idUser'];

$email = $_POST['login'];
$senha = $_POST['senha'];

if($idUser != "" && $idUser != null){
    if($_POST['nome'] && $email && $senha){
        $data = array ('login' => $email,'password' => $senha);
        $classFunction = new classFunction();
        $encryptStudent = $classFunction->generateEncrypt($data);
        $data = array('name' => $_POST['nome'],'login' => $email,'encrypt' => $encryptStudent,'institution' => $idUser,'email' => $email);
        
        $classAdministrator = new classAdministrator();
        $result = null;
        $result = $classAdministrator->addAdministratorInInstitution($data);
    }
    
}

echo '
        <script>
            window.location="Inicial.php"
        </script>
    ';

?>