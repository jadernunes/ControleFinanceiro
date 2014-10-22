<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

if($_POST['password'] == $_POST['repPassword']){

    $classGeral->insert('INSERT INTO Usuario (nome, login, password, idTipoUsuario) VALUES (\''.$_POST['nome'].'\',\''.$_POST['login'].'\',\''.$_POST['password'].'\','.$_POST['idTipoUsuario'].')');

    echo '
    <script>
        window.location="CadastroSecretarioView.php"
    </script>
    ';
}
else{
    echo '
    <script>
        alert("As senhas não coinciden");
        window.location="CadastroSecretarioView.php"
    </script>
    ';
}


?>