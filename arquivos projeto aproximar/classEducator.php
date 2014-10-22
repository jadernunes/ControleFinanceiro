<?php
include_once './classFunction.php';

class classEducator {
    function getEducator($idUser){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('id' => $idUser);
        $result = $classFunction->getObjects('educator',$arrayData);
        return $result;
    }
    
    function addEducatorInInstitution($data){
        $classFunction = new classFunction();
        $classFunction->POST('educator',$data);
    }
}
