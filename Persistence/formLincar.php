<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$arrayUsuario = array();

?>
    
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../functionGeral.js"></script>
        <title>My School</title>
    </head>
    <body>
        
    </body>
</html>
    
<?php
//echo '<pre>';
//print_r($_POST);
//echo '<pre>';kj

$i = 0;
foreach ($_POST as $coll => $valor){
    $collUsuario = substr($coll, 0, 9);
    if($collUsuario == 'idUsuario'){
        $idUsuario = substr($coll, 9, strlen($coll));
        $arrayUsuario[$i] = $idUsuario;
        $i++;
    }
}

//$classGeral->loadPagina('LincarProfessorTurmaView');


if($_POST['idTurma'] > 0){
    if(count($arrayUsuario) > 0){

        $arrayErroProf = array();
        $strS = "";

        $p = 0;
        for ($l = 0;$l < count($arrayUsuario);$l++){

            $sqlConsultaUsuarioTurma = 'Select * From UsuarioTurma where idUsuario = '.$arrayUsuario[$l].' and idTurma = '.$_POST['idTurma'];
            $totalUsuarioTurma = $classGeral->select($sqlConsultaUsuarioTurma);
            $totalUsuarioTurma = count($totalUsuarioTurma);

            if($totalUsuarioTurma == 0){
                $sql = 'INSERT INTO UsuarioTurma (idUsuario, idTurma) VALUES ('.$arrayUsuario[$l].','.$_POST['idTurma'].')';
                $classGeral->insert($sql);
            } 
            else {
                $dat = $classGeral->select('Select * From Usuario where idUsuario = '.$arrayUsuario[$l]);
                $turma = $classGeral->select('Select * From Turma where idTurma = '.$_POST['idTurma']);
                $strS = $strS.'\n- '.$dat[0]['nome'];
            }
        }
        if(strlen($strS) > 0){
            echo '
            <script>
                alert(\' Os Usuários abaixo já estão na turma: '.$turma[0]['codigo'].'/'.$turma[0]['ano'].'\n'.$strS.'\');
            </script>
            ';
        }
        if($_POST['typeLinck'] == 'professorTurma'){
            $classGeral->loadPagina('../View/LincarProfessorTurmaView.php');
        }
        else if($_POST['typeLinck'] == 'alunoTurma'){
            $classGeral->loadPagina('../View/LincarAlunoTurmaView.php');
        }
    }
    else{
        echo '
            <script>
                alert("Nenhum usuário foi selecionado");
            </script>
        '; 
        if($_POST['typeLinck'] == 'professorTurma'){
            $classGeral->loadPagina('../View/LincarProfessorTurmaView.php');
        }
        else if($_POST['typeLinck'] == 'alunoTurma'){
            $classGeral->loadPagina('../View/LincarAlunoTurmaView.php');
        }
    }
}else{
    echo '
        <script>
            alert("Nenhuma turma foi selecionada");
        </script>
    '; 
    if($_POST['typeLinck'] == 'professorTurma'){
        $classGeral->loadPagina('../View/LincarProfessorTurmaView.php');
    }
    else if($_POST['typeLinck'] == 'alunoTurma'){
        $classGeral->loadPagina('../View/LincarAlunoTurmaView.php');
    }
}

//
//
//if($_POST['typeLinck'] == 'professorTurma'){
//    if($_POST['idTurma'] > 0){
//        if(count($arrayUsuario) > 0){
//            
//            $arrayErroProf = array();
//            $strS = "";
//
//            $p = 0;
//            for ($l = 0;$l < count($arrayUsuario);$l++){
//
//                $sqlConsultaUsuarioTurma = 'Select * From UsuarioTurma where idUsuario = '.$arrayUsuario[$l].' and idTurma = '.$_POST['idTurma'];
//                $totalUsuarioTurma = $classGeral->select($sqlConsultaUsuarioTurma);
//                $totalUsuarioTurma = count($totalUsuarioTurma);
//
//                if($totalUsuarioTurma == 0){
//                    $sql = 'INSERT INTO UsuarioTurma (idUsuario, idTurma) VALUES ('.$arrayUsuario[$l].','.$_POST['idTurma'].')';
//                    $classGeral->insert($sql);
//                } 
//                else {
//                    $dat = $classGeral->select('Select * From Usuario where idUsuario = '.$arrayUsuario[$l]);
//                    $turma = $classGeral->select('Select * From Turma where idTurma = '.$_POST['idTurma']);
//                    $strS = $strS.'\n- '.$dat[0]['nome'];
//                }
//            }
//            if(strlen($strS) > 0){
//                echo '
//                <script>
//                    alert(\' Os Usuários abaixo já estão na turma: '.$turma[0]['codigo'].'/'.$turma[0]['ano'].'\n'.$strS.'\');
//                </script>
//                ';
//            }
//            echo '
//            <script>
//                window.location="LincarProfessorTurmaView.php"
//            </script>
//            ';
//        }
//        else{
//            echo '
//            <script>
//            alert("Nenhum usuário foi selecionado");
//                window.location="LincarProfessorTurmaView.php"
//            </script>
//            '; 
//        }
//    }else{
//        echo '
//        <script>
//        alert("Nenhuma turma foi selecionada");
//            window.location="LincarProfessorTurmaView.php"
//        </script>
//        ';
//    }
//}else if($_POST['typeLinck'] == 'alunoTurma'){
//    if($_POST['idTurma'] > 0){
//        if(count($arrayUsuario) > 0){
//            
//        $arrayErroProf = array();
//        
//        $strS = "";
//        
//        $p = 0;
//        for ($l = 0;$l < count($arrayUsuario);$l++){
//            $sqlConsultaUsuarioTurma = 'Select * From UsuarioTurma where idUsuario = '.$arrayUsuario[$l].' and idTurma = '.$_POST['idTurma'];
//            $classGeral->select($sql);
//            
//            if(count($classGeral) > 0){
//                $sql = 'INSERT INTO UsuarioTurma (idUsuario, idTurma) VALUES ('.$arrayUsuario[$l].','.$_POST['idTurma'].')';
//                $classGeral->insert($sql);
//            } 
//            else {
//                
//                $dat = $classGeral->select('Select * From Usuario where idUsuario = '.$arrayUsuario[$l]);
//                $turma = $classGeral->select('Select * From Turma where idTurma = '.$_POST['idTurma']);
//                $strS = $strS.'\n- '.$dat[0]['nome'];
//            }
//        }
//        echo '
//        <script>
//            alert(\' Os Usuários abaixo já estão na turma: '.$turma[0]['codigo'].'/'.$turma[0]['ano'].'\n'.$strS.'\');
//            window.location="LincarAlunoTurmaView.php"
//        </script>
//        ';
//        }
//        else{
//            echo '
//            <script>
//            alert("Nenhum usuário foi selecionado");
//                window.location="LincarAlunoTurmaView.php"
//            </script>
//            '; 
//        }
//    }else{
//        echo '
//        <script>
//        alert("Nenhuma turma foi selecionada");
//            window.location="LincarAlunoTurmaView.php"
//        </script>
//        ';
//    }
//}

?>