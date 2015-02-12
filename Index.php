<?php

include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();
$onLoad = "";

if(isset($_SESSION['user']))
{
    if($myClass->ValidaSession($_SESSION['user']['identificador']))
        $onLoad = 'onload="loadDiv(\'Inicial.php\',\'div_Inicial\');"';
    else
        $onLoad = 'onload="loadDiv(\'Login.php\',\'div_Inicial\');loadDiv(\'pageVerify.php\',\'div_vefiry\');"';
}
else 
{
    $onLoad = 'onload="loadDiv(\'Login.php\',\'div_Inicial\');"';
}

?>

<html >
    <head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <link href="defaultCSS.css" rel="stylesheet">
        <script src="./Model/functionGeral.js" ></script>
        <title>Controle Financeiro</title>
    </head>
    <body style="padding: 0;margin: 0;" <?php echo $onLoad;?>>
        <div id="div_Inicial" >
        </div>
    </body>
</html>