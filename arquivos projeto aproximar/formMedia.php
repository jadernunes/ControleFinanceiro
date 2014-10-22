<?php

//echo "<pre>";
//print_r($_POST);
//echo "<pre>";
include "./config.php";
include "./classFunction.php";
include "./classMedia.php";


$classMedia = new classMedia();

//foreach($_FILES as $nome => $valor){
//    echo '<br/>'.$nome.'=>> <br/><br/>';
//    foreach($valor as $n => $t){
//        echo '['.$n.'] = '.$t.'<br/>';
//    }
//}
$data = $_FILES['htmlUpload'];

foreach($_POST as $nome => $valor){
    $coluna = substr($nome, 0,6);
    if($coluna == 'idUser'){
        $classMedia->addMedia($valor,$data);
    }
}




//
//echo "<pre>";
//print_r($_FILES);
//echo "<pre>";

//
//
//echo '
//    <script>
//        window.location="Inicial.php"
//    </script>
//    ';
?>
