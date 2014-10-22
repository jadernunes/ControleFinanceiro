<?php

include_once './classFunction.php';

class classStudent {
    function addStudentInInstitution($data){
        $classFunction = new classFunction();
        $classFunction->POST('student',$data);
    }
    
    function getStudentInInstitution($idInstitution){
        $classFunction = new classFunction();
        $arrayData = array ('institution' => $idInstitution);
        $result = $classFunction->getObjects('student',$arrayData);
        return $result;
    }
    
    function getStudent($idStudent){
        $classFunction = new classFunction();
        $arrayData = array ('id' => $idStudent);
        $result = $classFunction->getObjects('student',$arrayData);
        return $result;
    }
}
