<?php
    include "./Model/config.php";
    include "./Model/MySql_Class.php";

    $myClass = new MySql_Class();
    
    $page = split('-', $_POST['page'])[0];
    $div = split('-', $_POST['page'])[1];
    
    $page = $page.'.php';
    if(isset($_SESSION['user']))
    {
        $_SESSION['user']['loadPage']['page'] = $page;
        $_SESSION['user']['loadPage']['div'] = $div;
    }
    
    $myClass->loadPagina('./Index.php');
?>