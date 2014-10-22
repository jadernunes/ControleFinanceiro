<?php
include_once './classFunction.php';

class classInstitution {
    
    function getInstitution($idInstitution){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('id' => $idInstitution);
        $result = $classFunction->getObjects('institution',$arrayData);
        return $result;
    }
    
    function getStudentInInstitution($idInstitution){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('institution' => $idInstitution);
        $result = $classFunction->getObjects('student',$arrayData);
        return $result;
    }
    
    function getEducatorInInstitution($idInstitution){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('institution' => $idInstitution);
        $result = $classFunction->getObjects('educator',$arrayData);
        return $result;
    }
    
    function getAdministratorInInstitution($idInstitution){
        $result = null;
        $classFunction = new classFunction();
        $arrayData = array ('institution' => $idInstitution);
        $result = $classFunction->getObjects('administrator',$arrayData);
        return $result;
    }
}
