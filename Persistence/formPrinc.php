<?php
include "../Model/config.php";
include "../Model/MySql_Class.php";

$myClass = new MySql_Class();
$identificar = "";

if(isset($_POST['logout']))
{
    $_SESSION['user'] = null;
    $_SESSION['user']['identificador'] = 0;
    $myClass->loadPagina('../Index.php');
}
else if(isset($_POST['cadastro']))
{
    if(isset($_POST['nome']))//nome
    {
        if($myClass->verifyPostGetSession($_POST['nome']))//nome
        {
            if(isset($_POST['email']))//email
            {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))//email
                {
                    if(isset($_POST['password']))//password
                    {
                        if($myClass->verifyPostGetSession($_POST['password']))//password
                        {
                            if(isset($_POST['confPassword']))//confPassword
                            {
                                if($myClass->verifyPostGetSession($_POST['confPassword']))//confPassword
                                {
                                    if($_POST['password'] == $_POST['confPassword'])
                                    {
                                        $nome = $_POST['nome'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];

                                        $identificador = sha1($email.'asdf'.$password);
                                        
                                        $user = $myClass->CadastroNovoUsuario($nome,$email,$identificador);
                                        
                                        if($user)
                                        {
                                            $_SESSION['user'] = array();
                                            $_SESSION['user']['idUser'] = $user[0]['idUsuario'];
                                            $_SESSION['user']['nome'] = $user[0]['name'];
                                            $_SESSION['user']['identificador'] = $user[0]['identificador'];
                                            $_SESSION['user']['ativo'] = $user[0]['ativo'];
                                            $_SESSION['user']['email'] = $user[0]['email'];
                                            $_SESSION['user']['loadPage']['page'] = 'Inicial.php';
                                            $_SESSION['user']['loadPage']['div'] = 'div_Inicial';

                                            $_SESSION['\''.$identificador.'\''] = time();
                                        }
                                        
                                        $myClass->loadPagina('../Index.php');
                                    }
                                    else {$myClass->alert('Passwords different!');}
                                }
                                else {$myClass->alert('Confirm Password inválido 1!');}
                            }
                            else {$myClass->alert('Confirm Password inválido 2!');}
                        }
                        else {$myClass->alert('Password inválido 1!');}
                    }
                    else {$myClass->alert('Password inválido 2!');}
                }
                else {$myClass->alert('Email inválido 1!');}
            }
            else {$myClass->alert('Email inválido 2!');}
        }
        else {$myClass->alert('Nome inválido 1!');}
    }
    else {$myClass->alert('Nome inválido 2!');}
    $myClass->loadPagina('../CadastroView.php');
}
else if(isset($_POST['savarPerfil']))
{
    if(isset($_POST['nome']))//nome
    {
        if($myClass->verifyPostGetSession($_POST['nome']))//nome
        {
            if(isset($_POST['email']))//email
            {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))//email
                {
                    if(isset($_POST['password']))//password
                    {
                        if($myClass->verifyPostGetSession($_POST['password']))//password
                        {
                            if(isset($_POST['confPassword']))//confPassword
                            {
                                if($myClass->verifyPostGetSession($_POST['confPassword']))//confPassword
                                {
                                    if($_POST['password'] == $_POST['confPassword'])
                                    {
                                        $nome = $_POST['nome'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $identificador = sha1($email.'asdf'.$password);
                                        $user = $myClass->AlteraDadosUsuario($nome,$email,$identificador,$_SESSION['user']['idUser']);
                                        
                                        if($user)
                                        {
                                            $_SESSION['user'] = array();
                                            $_SESSION['user']['idUser'] = $user[0]['idUsuario'];
                                            $_SESSION['user']['nome'] = $user[0]['name'];
                                            $_SESSION['user']['identificador'] = $user[0]['identificador'];
                                            $_SESSION['user']['ativo'] = $user[0]['ativo'];
                                            $_SESSION['user']['email'] = $user[0]['email'];
                                            $_SESSION['user']['loadPage']['page'] = 'Inicial.php';
                                            $_SESSION['user']['loadPage']['div'] = 'div_Inicial';

                                            $_SESSION['\''.$identificador.'\''] = time();
                                        }
                                        $myClass->alert('Perfil Atualizado com Sucesso!');
                                    }
                                    else 
                                    {
                                        $myClass->alert('Passwords diferentes!');
                                    }
                                }
                                else 
                                {
                                    $myClass->alert('Confirmação do Password inválida');
                                }
                            }
                            else 
                            {
                                $myClass->alert('Você deve informar a confirmação do password!');
                            }
                        }
                        else 
                        {
                            //$myClass->alert('Password inválido');
                        }
                    }
                    else 
                    {
                        //$myClass->alert('Você deve informar o Password!');
                    
                    }
                }
                else 
                {
                    $myClass->alert('Email inválido');
                }   
            }
            else 
            {
                $myClass->alert('Você deve informar o Email!');
            }
        }
        else 
        {
            $myClass->alert('Nome inválido');
        }
    }
    else 
    {$myClass->alert('Você deve informar o nome!');}
    
    if(isset($_SESSION['user']))
    {
         $_SESSION['user']['loadPage']['page'] = 'PerfilView.php';
         $_SESSION['user']['loadPage']['div'] = 'dados';
    }

    $myClass->loadPagina('../Index.php');
}
else if(isset($_POST['page']))
{
    $page = split('-', $_POST['page']);
    $div = split('-', $_POST['page']);

    $page = $page[0].'.php';
    if(isset($_SESSION['user']))
    {
         $_SESSION['user']['loadPage']['page'] = $page;
         $_SESSION['user']['loadPage']['div'] = $div[1];
    }

    $myClass->loadPagina('../Index.php');
}
else
{
    if($myClass->verifyPostGetSession($_POST['email']) && $myClass->verifyPostGetSession($_POST['password']))
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $identificador = sha1($_POST['email'].'asdf'.$_POST['password']);
            $user = $myClass->getUsuarioPorIdentificador($identificador);

            if($user)
            {
                $_SESSION['user'] = array();
                $_SESSION['user']['idUser'] = $user[0]['idUsuario'];
                $_SESSION['user']['nome'] = $user[0]['name'];
                $_SESSION['user']['identificador'] = $user[0]['identificador'];
                $_SESSION['user']['ativo'] = $user[0]['ativo'];
                $_SESSION['user']['email'] = $user[0]['email'];
                $_SESSION['user']['loadPage']['page'] = 'Inicial.php';
                $_SESSION['user']['loadPage']['div'] = 'div_Inicial';

                $_SESSION['\''.$identificador.'\''] = time();
            }
        }
        else {
            $myClass->alert('Email inválido');
        }
        

        $myClass->loadPagina('../Index.php');
    }
    else if(!$myClass->verifyPostGetSession($_POST['email']) && $myClass->verifyPostGetSession($_POST['password']))
    {
        //Username inválido
        $myClass->alert('Email inválido!');
        $myClass->loadPagina('../Index.php');
    }
    else if($myClass->verifyPostGetSession($_POST['email']) && !$myClass->verifyPostGetSession($_POST['password']))
    {
        //Password inválido
        $myClass->alert('Password inválido!');
        $myClass->loadPagina('../Index.php');
    }
    else if(!$myClass->verifyPostGetSession($_POST['email']) && !$myClass->verifyPostGetSession($_POST['password']))
    {
        //Password e username são inválidos
        $myClass->alert('Email e Password inválidos!');
        $myClass->loadPagina('../Index.php');
    }
}

?>
