<?php
include_once './classFunction.php';

class classAdministrator {
    function getAdministrator($idUser){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('id' => $idUser);
        $result = $classFunction->getObjects('administrator',$arrayData);
        return $result;
    }
    
    function addAdministratorInInstitution($data){
        $classFunction = new classFunction();
        $classFunction->POST('administrator',$data);
    }
}
