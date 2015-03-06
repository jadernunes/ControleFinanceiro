<?php

include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();

if(isset($_GET['action']))
{
    if($_GET['action'] == 'addUsuarioNoGrupo')
    {
        if(isset($_GET['email']) && isset($_GET['idGrupo']) && isset($_GET['idUsuarioEnvia']))
        {
            if($myClass->verifyPostGetSession($_GET['email']) && $myClass->verifyPostGetSession($_GET['idGrupo']) && $myClass->verifyPostGetSession($_GET['idUsuarioEnvia']))
                $myClass->AddUsuarioNoGrupo($_GET['email'], $_GET['idGrupo'],$_GET['idUsuarioEnvia']);
        }
        $myClass->loadPagina('Index.php');
    }
    else if($_GET['action'] == 'ConfirmaVinculo')
    {
        if(isset($_GET['idSolicitacao']))
        {
            $myClass->ConfirmaVinculo($_GET['idSolicitacao']);
            $myClass->loadPagina('Index.php');
        }
    }
    else if($_GET['action'] == 'CancelaSolicitacaoVinculo')
    {
        if(isset($_GET['idSolicitacao']))
        {
            $myClass->CancelaSolicitacaoVinculo($_GET['idSolicitacao']);
            $myClass->loadPagina('Index.php');
        }
    }
    else if($_GET['action'] == 'CancelaSolicitacaoVinculoRealizadas')
    {
        if(isset($_GET['idSolicitacao']))
        {
            $myClass->CancelaSolicitacaoVinculoRealizadas($_GET['idSolicitacao']);
            $myClass->loadPagina('Index.php');
        }
    }
    else if($_GET['action'] == 'pagarTicket')
    {
//        $myClass->show($_GET);
        if(isset($_GET['idTicket']) && isset($_GET['valorPago']) && isset($_GET['idUsuario']))
        {
            $idUsuario = $_GET['idUsuario'];
            $idTicket = $_GET['idTicket'];
            $valor = $_GET['valorPago'];
            
            if($myClass->PagarTicket($idUsuario, $idTicket, $valor))
            {
                $myClass->alert('Valor registrado com sucesso!');
            }
            else
            {
                $myClass->alert('Você não pode fazer um pagamento maior o devido.');
            }
        }
        
        if(isset($_SESSION['user']))
        {
            $_SESSION['user']['loadPage']['page'] = 'APagarView.php';
            $_SESSION['user']['loadPage']['div'] = 'dados';
        }

    $myClass->loadPagina('../Index.php');
    }
}
?>