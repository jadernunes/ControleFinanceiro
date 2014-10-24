<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

$idTurma = $_POST['idTurma'];
$idGrupo = $_POST['idGrupo'];
$idRelatorio = $_POST['idRelatorio'];
$observacao = $_POST['observacao'];

$classGeral->show($_POST);
//echo $observacao;
//break;

echo '<br/>';
//trocar statusResposta do relatorio para 1, se não:
//
// 
if(isset($_POST['btCancelar'])){
    echo '<br/>btCancelar';
    echo '<br/>aqui 1';
    $classGeral->loadPagina('PreencherRelatorioView.php?idTurma='.$idTurma.'&idGrupo='.$idGrupo.'&idRelatorio='.$idRelatorio);
}else{
    echo '<br/>btSalvar';
    $arrayObjetivos = array();
    //somar a quantidade de objetivos do relatorio
    $sql = 'Select count(idObjetivo) From RelatorioObjetivo where idRelatorio = '.$idRelatorio;
    $totalObjetivosBanco = $classGeral->select($sql)[0]['count(idObjetivo)'];
    
    $totalObjetivosRecebidos = 0;
    foreach ($_POST as $coll => $valor){
        $c = substr($coll, 0, 8);
        if($c == 'objetivo'){
            $arrayObjetivos[$totalObjetivosRecebidos][0] = substr($coll, 8, strlen($coll));
            $arrayObjetivos[$totalObjetivosRecebidos][1] = $valor;
            $totalObjetivosRecebidos++;
        }
    }
    
    //se a quantidade de objetivos do relatorio for a mesma que está sendo recebida
    if($totalObjetivosBanco == $totalObjetivosRecebidos){
        echo '<br/>Total de Objetivo igual ao recebido';
        
        //então:
        //- trocar statusResposta do relatorio para 2;
        $query = 'update Relatorio set statusResposta = 2 where idRelatorio = '.$idRelatorio;
        $classGeral->insert($query);
        
        $query = 'update Relatorio set observacao = \''.$observacao.'\' where idRelatorio = '.$idRelatorio;
        $classGeral->insert($query);
        
        //- preenche os objetivos relatórios recebidos
        for($i = 0;$i < $totalObjetivosRecebidos;$i++){
            $query = 'update RelatorioObjetivo set status = '.$arrayObjetivos[$i][1].' where idObjetivo = '.$arrayObjetivos[$i][0].' and idRelatorio = '.$idRelatorio;
            $classGeral->insert($query);
            
            $query = 'update Objetivo set editavel = 0 where idObjetivo = '.$arrayObjetivos[$i][0];
            $classGeral->insert($query);
        }
        echo '<br/>aqui 2';
        $classGeral->loadPagina('PreencherRelatorioView.php?idTurma='.$idTurma.'&idGrupo='.$idGrupo);
    }else{
        echo '<br/>não preencheu todos os objetivos';
        $query = 'update Relatorio set statusResposta = 1 where idRelatorio = '.$idRelatorio;
        $classGeral->insert($query);
        
        $query = 'update Relatorio set observacao = \''.$observacao.'\' where idRelatorio = '.$idRelatorio;
        $classGeral->insert($query);
        
        //- preenche os objetivos relatórios recebidos
        for($i = 0;$i < $totalObjetivosRecebidos;$i++){
            $query = 'update RelatorioObjetivo set status = '.$arrayObjetivos[$i][1].' where idObjetivo = '.$arrayObjetivos[$i][0].' and idRelatorio = '.$idRelatorio;
            $classGeral->insert($query);
            
            $query = 'update Objetivo set editavel = 0 where idObjetivo = '.$arrayObjetivos[$i][0];
            $classGeral->insert($query);
        }
        echo '<br/>aqui 3';
        $classGeral->loadPagina('PreencherRelatorioView.php?idTurma='.$idTurma.'&idGrupo='.$idGrupo.'&idRelatorio='.$idRelatorio);
    }
    
    
}

?>

