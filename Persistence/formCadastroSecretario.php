<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$idUser = 0;

foreach ($_POST as $dat => $r){
    $col = substr($dat, 0, 11);
    if($col == 'radioIdUser'){
        $idUser = substr($dat, 11, strlen($dat));
    }
}

if($idUser > 0){
    $query = "UPDATE Usuario set ativo = 0  where idUsuario = ".$idUser;
    $classGeral->insert($query);
    echo '
        <script>
            window.location="../View/CadastroSecretarioView.php"
        </script>
    ';
}else{
    if($_POST['password'] == $_POST['repPassword']){

        $classGeral->insert('INSERT INTO Usuario (nome, login, password, idTipoUsuario) VALUES (\''.$_POST['nome'].'\',\''.$_POST['login'].'\',\''.$_POST['password'].'\','.$_POST['idTipoUsuario'].')');

        echo '
        <script>
            window.location="../View/CadastroSecretarioView.php"
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("As senhas não coinciden");
            window.location="../View/CadastroSecretarioView.php"
        </script>
        ';
    }
}


?>