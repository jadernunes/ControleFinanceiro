<?php
include '../pdf/mpdf.php';
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$dat = "";
$tipoRelatorio = "";
$mpdf = new mPDF();

//if(isset($_POST['btAcessosDia'])){
//    
//    $dat = $classGeral->getAcessosDia();
//    $tipoRelatorio = "RelatorioAcessoDia";
//    
//    $classGeral->alert("Total de Acessos no dia: ".count($dat));
//    
//}else if(isset($_POST['btAcessosMes'])){
//    
//    $dat = $classGeral->getAcessosMes();
//    $classGeral->alert("Total de Acessos no Mês: ".count($dat));
//    $tipoRelatorio = "RelatorioAcessoMes";
//    
//}else if(isset($_POST['btAcessosAno'])){
//    
//    $dat = $classGeral->getAcessosAno();
//    $classGeral->alert("Total de Acessos no Ano: ".count($dat));
//    $tipoRelatorio = "RelatorioAcessoAno";
//}

//$classGeral->show($_POST);
if(isset($_POST['btAcessos'])){
    
    $datDia = $classGeral->getAcessosDia();
    $datMes = $classGeral->getAcessosMes();
    $datAno = $classGeral->getAcessosAno();
    
    $totDia = count($datDia);
    $totMes = count($datMes);
    $totAno = count($datAno);
    
    
    $msg = 'Total de Acessos no Dia: '.$totDia
            . '\nTotal de Acessos no Mês: '.$totMes
            . '\nTotal de Acessos no Ano: '.$totAno;
    $classGeral->alert($msg);
    
    $_SESSION['reopen'] = 1;
    
    $classGeral->loadPagina('../Index.php');
//    $classGeral->loadPagina('../Index.php');
}
?>

<?php 
//$headerAux = '
//    <tr>
//        <td align="center">Acesso</td>
//        <td>&nbsp;</td>
//        <td align="center">Data</td>
//        <td>&nbsp;</td>
//        <td align="center">Hora</td>
//        <td>&nbsp;</td>
//        <td align="center">MacAddress</td>
//    </tr>  
//';
//
//    $linhas = "";
//    $i = 1;
//    $count = 1;
//    foreach($dat as $r => $val){
//        
//        $linhas = $linhas.'
//        <tr>
//            <td style="border-style:inset;border-bottom: none;" align="center">'.$i.'</td>
//            <td>&nbsp;</td>
//            <td style="border-style:inset;border-bottom: none;" align="center">'.$val['data'].'</td>
//            <td>&nbsp;</td>
//            <td style="border-style:inset;border-bottom: none;" align="center">'.$val['hora'].'</td>
//            <td>&nbsp;</td>
//            <td style="border-style:inset;border-bottom: none;" align="center">'.$val['macAddress'].'</td>
//        </tr>
//        ';
//        if($count == 36){
//            $header = '<table align="center">'.$headerAux.$linhas.'</table>';
//            $count = -1;
//            $linhas = "";
//            $mpdf->WriteHTML($header);
//            $mpdf->AddPage();
//        }
//        if($i == count($dat)){
//            $header = '<table align="center">'.$headerAux.$linhas.'</table>';
//            $count = -1;
//            $linhas = "";
//            $mpdf->WriteHTML($header);
//            $mpdf->AddPage();
//        }
//    $i++;
//    $count++;
//    }
//
//date_default_timezone_set('America/Sao_Paulo');
//$data = date('d-m-Y');
//$hora = date('H:i:s');
//$mpdf->DeletePages(count($mpdf->pages));
//$mpdf->Output('../RelatoriosGrupo/'.$tipoRelatorio.'_'.$data.'_'.$hora.'.pdf', 'D');
//unlink('../RelatoriosGrupo/'.$tipoRelatorio.'_'.$data.'_'.$hora.'.pdf');

?>