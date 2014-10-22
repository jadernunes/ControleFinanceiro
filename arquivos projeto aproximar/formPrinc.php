<?php
include "./config.php";
include "./classFunction.php";

$classFunction = new classFunction();

$type = $_POST['type'];
$result = $classFunction->login($_POST['login'],$_POST['password']);

$_SESSION['idUser'] = $result['id'];
$_SESSION['typeUser'] = $type;

if($result['id']){
    echo '
        <script>
            window.location="Inicial.php"
        </script>
    ';
}

?>

