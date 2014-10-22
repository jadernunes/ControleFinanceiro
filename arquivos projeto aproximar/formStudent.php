<?php
include "./config.php";
include "./classFunction.php";
include "./classStudent.php";


//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$idUser = $_SESSION['idUser'];
$nome = $_POST['nome'];
date_default_timezone_set('America/Sao_Paulo');
$email = "".date('dmYHis').'@gmail.com';
$senha = "".date('dmYHis');

if($idUser != "" && $idUser != null){
    if($_POST['nome'] && $email && $senha){
        $data = array ('login' => $email,'password' => $senha);
        $classFunction = new classFunction();
        $encryptStudent = $classFunction->generateEncrypt($data);
        $data = array('name' => $nome,'login' => $email,'encrypt' => $encryptStudent,'institution' => $idUser,'email' => $email);
        
        $classStudent = new classStudent();
        $result = null;
//        
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        
        $result = $classStudent->addStudentInInstitution($data);
    }
    
}

echo '
        <script>
            window.location="Inicial.php"
        </script>
    ';

?>