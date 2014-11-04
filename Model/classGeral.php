<?php
class classGeral {
    function connection(){
        
        
        $con=mysqli_connect("localhost","myschool","admin","myschool");
        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            return $con;
        }
    }
    
    function select($query){
        $con = $this->connection();
        $result = mysqli_query($con,$query);
        $arrayObjects = array();
        
        $i = 0;
        while($arrayObject = mysqli_fetch_array($result)){
            $objetc = array();
            foreach($arrayObject as $colun => $r){
                if(!is_numeric($colun)){
                    $objetc[$colun] = $r;
                }
            }
            $arrayObjects[$i] = $objetc;
            $i++;
        }
        mysqli_close($con);
        return $arrayObjects;
    }
    
    function insert($query){
        $con = $this->connection();
        mysqli_query($con,$query);
        $id = mysqli_insert_id($con);
        mysqli_close($con);
        return $id;
    }
    
    function loadPagina($pageName = ''){
        
        if($pageName){
            echo '
                <script>
                    window.location="'.$pageName.'"
                </script>
            ';
        }else
        {
            echo '
                <script>
                    window.location="Index.php"
                </script>
            ';
        }
    }
    
    function loadDiv($pageName,$div){
        echo '
            <script>
                $(\'#'.$div.'\').load(\''.$pageName.'\');
            </script>
        ';
    }
            
    function alert($msg = ''){
        echo '
            <script>
                alert("'.$msg.'");
            </script>
        ';
    }
    
    function show($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    function remover_caracter($string) {
        $string = preg_replace("/[áàâãä]/", "a", $string);
        $string = preg_replace("/[ÁÀÂÃÄ]/", "A", $string);
        $string = preg_replace("/[éèê]/", "e", $string);
        $string = preg_replace("/[ÉÈÊ]/", "E", $string);
        $string = preg_replace("/[íì]/", "i", $string);
        $string = preg_replace("/[ÍÌ]/", "I", $string);
        $string = preg_replace("/[óòôõö]/", "o", $string);
        $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
        $string = preg_replace("/[úùü]/", "u", $string);
        $string = preg_replace("/[ÚÙÜ]/", "U", $string);
        $string = preg_replace("/ç/", "c", $string);
        $string = preg_replace("/Ç/", "C", $string);
        $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
        $string = preg_replace("/ /", "_", $string);
        return $string;
    }
}