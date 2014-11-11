<?php
//REFERENCIAR O ARQUIVO COM A CLASSE DE GERAÇÃO DE PDF
include '../pdf/mpdf.php';
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

if(isset($_POST['btImprimeGrupo'])){
    
    $mpdf = new mPDF();
    
    $idUserProfessor = $_POST['idUsuario'];
    $idTurma = $_POST['idTurma'];
    $idGrupo = $_POST['idGrupo'];
    
    // pega os relatorios
    $query = 'Select * From Relatorio r where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and (statusResposta = 0 or statusResposta = 1)';
    
    $result = $classGeral->select($query);
    
    $i = 0;
    
    $arrayDados = array();
    
    //todos os relatórios
    $i = 0;
    foreach ($result as $col => $val){
            
        $queryO = 'Select o.idObjetivo,o.descricao,r.status From Objetivo o inner join RelatorioObjetivo r on o.idObjetivo = r.idObjetivo where o.idUsuarioProfessor = '.$idUserProfessor.' and o.idTurma = '.$idTurma.' and o.identificadorGrupo = '.$idGrupo.' and r.idRelatorio = '.$val['idRelatorio'].' group by o.idObjetivo';
        $resultO = $classGeral->select($queryO);
        
        $queryO1 = 'Select nome From Usuario where idUsuario = '.$val['idUsuarioProfessor'];
        $resultO1 = $classGeral->select($queryO1);
        
        $queryO2 = 'Select nome From Usuario where idUsuario = '.$val['idUsuarioAluno'];
        $resultO2 = $classGeral->select($queryO2);
        
        $queryO3 = 'Select codigo,ano,serie From Turma where idTurma = '.$val['idTurma'];
        $resultO3 = $classGeral->select($queryO3);
        
        $arrayDados[$i][0] = $val['codigo'];
        $arrayDados[$i][1] = $resultO1[0]['nome'];//Professor
        $arrayDados[$i][2] = $resultO2[0]['nome'];//Aluno
        $arrayDados[$i][3] = $resultO3[0]['codigo'].'/'.$resultO3[0]['ano'];
        $arrayDados[$i][4] = $val['observacao'];
        
        
        $arrayObj = array();
        
        //todos os objetivos de cada relatório
        $j = 0;
        foreach ($resultO as $colO => $valO){
//            $classGeral->show($valO);
            $arrayObj[$j][0] = $valO['descricao'];
            $arrayObj[$j][1] = $valO['status'];
            $j++;
        }
        
        $arrayDados[$i][5] = $arrayObj;
        $arrayDados[$i][6] = $resultO3[0]['serie'];
        
        $i++;
    }
    
    if(count($arrayDados) > 0){
    
        for($i = 0;$i < count($arrayDados);$i++){

            $body1 = 
                '<table cellpadding=0 cellspacing=0 align="center" style="border-style: groove;">
                <tr><td style="border-style: groove;"><img src="../cabecalho.png" alt="" width="1024" height="204"></td></tr>
                <tr><td style="border-style: groove;"><b>Educando(a):</b>&nbsp;'.$arrayDados[$i][2].'</td></tr>
                <tr><td style="border-style: groove;"><b>Serie:</b>&nbsp;'.$arrayDados[$i][6].'</td></tr>
                <tr><td style="border-style: groove;"><b>Turma:</b>&nbsp;'.$arrayDados[$i][3].'</td></tr>
                <tr><td style="border-style: groove;"><b>Professora Regente:</b>&nbsp;'.$arrayDados[$i][1].'</td></tr>
                <tr><td style="border-style: groove;"><b>Objetivo geral da serie:</b>&nbsp;</td></tr>
                <tr><td align="center" style="border-style: groove;"><b>HABILIDADES DESENVOLVIDAS NO TRIMESTRE:</b></td></tr>
                <tr>
                    <td cellpadding=0 cellspacing=0 align="center" style="border-style: groove;">
                        <table cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%">
                            <tr >
                                <td align="center" style="border-style: groove;">
                                    <table cellpadding=0 cellspacing=0 align="center" >
                                        <tr>
                                            <td align="center"><b>Descricao</b></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border-style: groove;width: 280px">
                                    <table cellpadding=0 cellspacing=0 align="center" style="width: 280px;">
                                        <tr>
                                            <td align="center" style="width: 50px;"><b>Atingiu</b></td>
                                            <td align="center" style="width: 80px;"><b>Nao Atingiu</b></td>
                                            <td align="center" style="width: 100px;"><b>Em Construcao</b></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>';

                            $linhas = '';
                            for($j = 0;$j < count($arrayDados[$i][5]);$j++){
                                $marcado1 = '';
                                $marcado2 = '';
                                $marcado3 = '';
                                if($arrayDados[$i][5][$j][1] == 1){ 
                                    $marcado1 = 'checked="checked"';
                                }
                                if($arrayDados[$i][5][$j][1] == 2){ 
                                    $marcado2 = 'checked="checked"';
                                }
                                if($arrayDados[$i][5][$j][1] == 3){ 
                                    $marcado3 = 'checked="checked"';
                                }

                                $linhasMark1 = '<input disabled="disabled" type="radio" id="atingiu" '.$marcado1.'  name="objetivo'.$i.$j.'" value="1" /></td>';
                                $linhasMark2 = '<input disabled="disabled" type="radio" id="naoAtingiu" '.$marcado2.'  name="objetivo'.$i.$j.'" value="2" /></td>';
                                $linhasMark3 = '<input disabled="disabled" type="radio" id="emConstrucao" '.$marcado3.'  name="objetivo'.$i.$j.'" value="3" /></td>';

                                $linhas = $linhas.'
                                <tr>
                                    <td style="border-style: groove;">
                                        <table >
                                            <tr>
                                                <td style="width: 100%;"><label >'.$arrayDados[$i][5][$j][0].'</label></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td  style="border-style: groove;">
                                        <table   style="width: 280px;">
                                            <tr>
                                                <td align="center" style="width: 50px;">'.$linhasMark1.'</td>
                                                <td align="center" style="width: 80px;">'.$linhasMark2.'</td>
                                                <td align="center" style="width: 100px;">'.$linhasMark3.'</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                ';
                            }
                          $finais = '
                        </table>
                    </td>
                    <tr>
                        <td style="border-style: groove;">
                            <b>Observacao:</b>
                            '.$arrayDados[$i][4].'
                        </td>
                    </tr>
                </tr>
            </table>';

            $html = $body1.$linhas.$finais;
            /*
             * F - salva o arquivo NO SERVIDOR
             * I - abre no navegador E NÃO SALVA
             * D - chama o prompt E SALVA NO CLIENTE
             */
//            $arquivo = $i.'.pdf';
            $mpdf->WriteHTML($html);
            $mpdf->AddPage();

        }
        date_default_timezone_set('America/Sao_Paulo');
        $idTurma = $_POST['idTurma'];
        $idGrupo = $_POST['idGrupo'];
        $data = date('d-m-Y');
        $hora = date('H:i:s');
        
        $mpdf->DeletePages(count($mpdf->pages));
        $mpdf->Output('../RelatoriosGrupo/'.'T'.$idTurma.'_G'.$idGrupo.'_'.$data.'_'.$hora.'.pdf', 'D');
        
        unlink('../RelatoriosGrupo/'.'T'.$idTurma.'_G'.$idGrupo.'_'.$data.'_'.$hora.'.pdf');
      
    }
    $classGeral->loadPagina('../View/VisualizarRelatorioView.php');
    
}else if(isset($_POST['btImprimeAluno'])){
    $idUserProfessor = $_POST['idUsuario'];
    $idTurma = $_POST['idTurma'];
    $idGrupo = $_POST['idGrupo'];
    $idRelatorio = $_POST['idRelatorio'];
    
    
    
//    // pega os relatorios
//    $query = 'Select * From Relatorio r where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo.' and (statusResposta = 2 or statusResposta = 1)';
//    
//    $result = $classGeral->select($query);
//    $i = 0;
//    
//    $arrayDados = array();
//    
//    //todos os relatórios
//    $i = 0;
//    foreach ($result as $col => $val){
//        
//    }
//    
    
    
    
    
}








?>
