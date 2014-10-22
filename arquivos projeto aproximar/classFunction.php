<?php

class classFunction {
       
    function POST($url,$arrayData) {
//        $server = "http://aproximar.greenb.com.br"; // Amazon
//        $portServer = "8080";
        $server = "http://localhost"; // local
        $portServer = "8080";

        $url = $server.':'.$portServer.'/api/'.$url.'?';

        $options = array(
                'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($arrayData)
            )
        );
        
        $dataJson = null;
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url,true, $context);
        $dataJson = (array) json_decode($result);
        return $dataJson;
    }
    
    function login($username,$password){
        $data = array ('login' => $username,'password' => $password);
        $encrypt = $this->generateEncrypt($data);
        $data = array('encrypt' => $encrypt);
        $result = $this->POST('login', $data);
        return $result;
    }
    
    function generateEncrypt($data){
        $data = sha1($data['login'].'blabla'.$data['password']);
        return $data;
    }
    
    function getObjects($subUrl,$arrayData){
        $arrayData = http_build_query($arrayData);
//        $server = "http://aproximar.greenb.com.br"; // Amazon
//        $portServer = "8080";
        $server = "http://localhost";
        $portServer = "8080";
        $json = file_get_contents($server.':'.$portServer.'/api/'.$subUrl.'?'.$arrayData); // this WILL do an http request for you
        $result = json_decode($json);
        return $result;
    }
    
    function AddMidiaInUser($idUser,$dataFile = null){
//
//        echo 'idUser: '.$idUser;
//        echo "<pre>";
//        print_r($dataFile);
//        echo "<pre>";    
//        
//        
//        $server = "http://localhost";
//        $portServer = "8080";
////        
////        if(!is_dir($server.':'.$portServer.'/var/greenb/Media/')){
//////            mkdir('/var/greenb/Media/',0777);
//////            echo 'local não encontrado';
//////            mkdir($server.':'.$portServer.'/var/greenb/Media/',0777);
////        }
////        move_uploaded_file($dataFile['tmp_name'],$server.':'.$portServer.'/var/greenb/Media/'.$dataFile['name']);
//        
//        $url = $server.':'.$portServer.'/api/media?';
////        
//        $ch = curl_init();
//
////        http_build_query($arrayData)
////        
////        $result = http_build_query($dataFile);
////        $dataJson = json_decode($result);
////        
//        $data = array('id' => $idUser);
//
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataFile);
//        curl_exec($ch);
//        
        
        
        
        
        
        
        
//        
//        
////        
//        $server = "http://localhost"; // local
//        $portServer = "8080";
////
//        $url = $server.':'.$portServer.'/api/media';
//////
////        $options = array(
//                'http' => array(
//                'header'  => "Content-type: application/x-www-form-data\r\n",
//                'method'  => 'POST',
//                'content' => http_build_query($dataFile)
//            )
//        );
////        
////        $dataJson = null;
////        
////        $context  = stream_context_create($options);
////        $result = file_get_contents($url,true, $context);
//        
////        $postData = array( 
////            'file' => $dataFile['tmp_name'].';type=application/jpg', 
////          ); 
//        
//        $ch = curl_init(); 
//        curl_setopt($ch, CURLOPT_URL, $url); 
//        curl_setopt($ch, CURLOPT_POST, true); 
//        curl_setopt($ch, CURLOPT_HEADER, $options);
//        curl_setopt($ch, CURLOPT_POST, $options);
////        curl_setopt($ch, CURLOPT_FILE, $dataFile); 
//        
//        $result = curl_exec($ch);
//        curl_close($ch);
//        
//        
//        is_uploaded_file($url)
        
        return true;
        
    }
}
