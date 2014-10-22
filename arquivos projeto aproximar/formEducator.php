<?php
include "./config.php";
include "./classFunction.php";
include "./classStudent.php";
include "./classEducator.php";


$idUser = $_SESSION['idUser'];
//$idUser = "";
//date_default_timezone_set('America/Sao_Paulo');
//$email = "".date('dmYHis').'@gmail.com';
//$senha = "".date('dmYHis');

$email = $_POST['login'];
$senha = $_POST['senha'];

if($idUser != "" && $idUser != null){
    if($_POST['nome'] && $email && $senha){
        $data = array ('login' => $email,'password' => $senha);
        $classFunction = new classFunction();
        $encryptStudent = $classFunction->generateEncrypt($data);
        $data = array('name' => $_POST['nome'],'login' => $email,'encrypt' => $encryptStudent,'institution' => $idUser,'email' => $email);
        
        $classEducator = new classEducator();
        $result = null;
        $result = $classEducator->addEducatorInInstitution($data);
    }
    
}

echo '
        <script>
            window.location="Inicial.php"
        </script>
    ';

?>