<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();
$result = $classGeral->select('Select * From Usuario where login like \''.$_POST['username'].'\' and password like \''.$_POST['password'].'\'');

$type = "";
$username = "";
$passaword = "";


//echo '<br/>';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';


if($_POST['type']){
    $type = $_POST['type'];
}

if($_POST['username']){
    $username = $_POST['username'];
}
if($_POST['password']){
    $passaword = $_POST['password'];
}


if($result){
    foreach($result as $var => $valor){
        if($valor['idTipoUsuario'] == $type && $valor['login'] == $username && $valor['password'] == $passaword){
            $_SESSION['user'] = $valor;
            echo '
                <script>
                    window.location="Inicial.php"
                </script>
            ';
        }
    }
}
else{
    echo '
        <script>
            alert(\'Os campos devem ser preenchidos corretamente\n ou \n você deve realizar sue cadastros\');
            window.location="Index.php"
        </script>
    ';
}
?>
