<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

if(isset($_GET['type']) && isset($_GET['username']) && isset($_GET['password']))
{
    $_POST['type'] = $_GET['type'];
    $_POST['username'] = $_GET['username'];
    $_POST['password'] = $_GET['password'];
}

$result = $classGeral->select('Select * From Usuario where login like \''.$_POST['username'].'\' and password like \''.$_POST['password'].'\' and ativo = 1');



$type = "";
$username = "";
$passaword = "";


if($_POST['type'])
{
    $type = $_POST['type'];
}

if($_POST['username'])
{
    $username = $_POST['username'];
}
if($_POST['password'])
{
    $passaword = $_POST['password'];
}


if($result)
{
    $i = 0;
    foreach($result as $var => $valor)
    {
        if($valor['idTipoUsuario'] == $type && $valor['login'] == $username && $valor['password'] == $passaword)
        {
            $_SESSION['user'] = $valor;
            
            
            
            echo '
                <script>
                    window.location="../Inicial.php"
                </script>
            ';
        }
    }
}
else
{
    echo '
        <script>
            alert(\'Os campos devem ser preenchidos corretamente\n ou \n você deve realizar sue cadastros\');
            window.location="../Index.php"
        </script>
    ';
}
?>
