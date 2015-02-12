<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();

if(isset($_SESSION['user']))
{
    if($myClass->ValidaSession($_SESSION['user']['identificador']))
    {
        if($_SESSION['user']['loadPage']['page'] == 'Inicial.php')
        {
            ?>
            <script>
                if(!isVisible('menu'))
                {
                    loadDiv('Inicial.php','div_Inicial');
                }
            </script>
            <?php
        }
        else
            $myClass->loadDiv($_SESSION['user']['loadPage']['page'],$_SESSION['user']['loadPage']['div']);
    }
    else
    {
        $myClass->loadPagina('./Index.php');
    }
}
?>