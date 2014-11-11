<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$idRelatorio = $_POST['idRelatorio'];

if(isset($_POST['btConfRelat']))
{
    $classGeral->insert('UPDATE Relatorio set statusResposta = 4 where idRelatorio = '.$idRelatorio);
}
else if(isset($_POST['btCorrigirRelat']))
{
    $r = $classGeral->select('Select * from Correcao where idRelatorio = '.$idRelatorio);
    
    if(count($r) > 0)
    {
        $classGeral->insert('UPDATE Correcao SET descricao = \''.$_POST['correcao'].'\' where idRelatorio ='.$idRelatorio);
    }
    else
    {
        $classGeral->insert('INSERT INTO Correcao ( descricao, idRelatorio) VALUES (\''.$_POST['correcao'].'\','.$idRelatorio.')');
    }
    $classGeral->insert('UPDATE Relatorio set statusResposta = 5 where idRelatorio = '.$idRelatorio);
}
$classGeral->loadPagina('../View/AvaliarRelatorioView.php');
?>