<?php

include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();

if(isset($_GET['action']))
{
    if($_GET['action'] == 'addUsuarioNoGrupo')
    {
        if(isset($_GET['email']) && isset($_GET['idGrupo']) && isset($_GET['idUsuarioEnvia']))
            $myClass->AddUsuarioNoGrupo($_GET['email'], $_GET['idGrupo'],$_GET['idUsuarioEnvia']);
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
}
?>
