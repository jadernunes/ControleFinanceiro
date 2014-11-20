<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$password = "";
$repPassword = "";
$idUsuario = 0;
$idTipoUsuario = 0;

if(isset($_POST['idUsuario']))
{
    $idUsuario = $_POST['idUsuario'];
}

if(isset($_POST['idTipoUsuario']))
{
    $idTipoUsuario = $_POST['idTipoUsuario'];
}
if($_POST['password'] != "")
{
    $password = $_POST['password'];
}
if($_POST['repPassword'] != "")
{
    $repPassword = $_POST['repPassword'];
}

if($password == $repPassword)
{
    
        $nome = "";
        $login = "";

        if(isset($_POST['nome']))
        {
            if($_POST['nome'] != "")
            {
                $nome = $_POST['nome'];
            }
        }

        if(isset($_POST['login']))
        {
            if($_POST['login'] != "")
            {
                $login = $_POST['login'];
            }
        }
        
        $query = "";
        
        if($password != "")
        {
            $query = "UPDATE Usuario set nome = '".$nome."',login = '".$login."',password='".$password."' where idUsuario = ".$idUsuario;
        }
        else
        {
            $query = "UPDATE Usuario set nome = '".$nome."',login = '".$login."' where idUsuario = ".$idUsuario;
        }
        $classGeral->insert($query);
        $classGeral->alert('Usuário alterado com sucesso!');

        if($idTipoUsuario == 1)
        {
            $classGeral->loadPagina('../View/CadastroProfessorView.php');
        }
        else if($idTipoUsuario == 2)
        {
            $classGeral->loadPagina('../View/CadastroAlunoView.php');
        }
        else if($idTipoUsuario == 3)
        {
            $classGeral->loadPagina('../View/CadastroSecretarioView.php');
        }
        else if($idTipoUsuario == 4)
        {
            $classGeral->loadPagina('../View/CadastroDiretorView.php');
        }
        else if($idTipoUsuario == 5)
        {
            $classGeral->loadPagina('../View/CadastroSupervisorView.php');
        }
}
else
{
    $classGeral->alert('As senhas não coinciden');
    $classGeral->loadPagina('../View/EditUserView.php?idUsuario='.$idUsuario.'&idTipoUsuario='.$idTipoUsuario);
}

?>