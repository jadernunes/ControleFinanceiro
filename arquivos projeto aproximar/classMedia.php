<?php

include_once './classFunction.php';

class classMedia {
    
    function addMedia($idUser,$data = null){
        $classFunction = new classFunction();
        $result = $classFunction->AddMidiaInUser($idUser, $data);
        return $result;
    }
}
