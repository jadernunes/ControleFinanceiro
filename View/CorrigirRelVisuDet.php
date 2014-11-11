<?php

include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

//$classGeral->show($_GET);
$idUserProfessor = $_SESSION['user']['idUsuario'];
$idTurma = $_GET['idTurma'];
$idGrupo = $_GET['idGrupo'];
$idRelatorio = $_GET['idRelatorio'];

//echo '=> detalhePreencRelatorio';
//
//echo '<br/>';
//echo 'idUserProfessor: '.$idUserProfessor;
//echo '<br/>';
//echo 'idTurma: '.$idTurma;
//echo '<br/>';
//echo 'idGrupo: '.$idGrupo;
//echo '<br/>';
//echo 'idRelatorio: '.$idRelatorio;
//echo '<br/>';
//echo '<br/>';

?>
<div id='detalheObjetivosDoRelatorio'>
    <input type="hidden" name="idRelatorio" id="idRelatorio" value='<?php echo $idRelatorio;?>'/>
    <?php
    
    $query = 'Select o.idObjetivo,o.descricao,r.status From Objetivo o inner join RelatorioObjetivo r on o.idObjetivo = r.idObjetivo where o.idTurma = '.$idTurma.' and o.identificadorGrupo = '.$idGrupo.' and r.idRelatorio = '.$idRelatorio.' group by o.idObjetivo';
//    echo $query;
    ?>
    <table cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%">
        <tr >
            <td align='center' style="border-style: groove;">
                <table >
                    <tr>
                        <td align='center'>Descrição</td>
                    </tr>
                </table>
            </td>
            <td style="border-style: groove;width: 280px">
                <table style="width: 280px;">
                    <tr>
                        <td align='center' style="width: 50px;">Atingiu</td>
                        <td align='center' style="width: 80px;">Não Atingiu</td>
                        <td align='center' style="width: 100px;">Em Construção</td>
                    </tr>
                </table>
            </td>
        </tr>
        <input type="hidden" id='alterado' name='alterado' value='0' />
        <?php
        
        $result = $classGeral->select($query);
        
        foreach($result as $var => $valor){
        ?>
        <tr>
            <td style="border-style: groove;">
                <table >
                    <tr>
                        <td style="width: 100%;"><label ><?php echo $valor['descricao']?></label></td>
                    </tr>
                </table>
            </td>
            <td  style="border-style: groove;">
                <table   style="width: 280px;">
                    <tr>
                        <td align='center' style="width: 50px;"><input <?php if($valor['status'] == 1){ echo 'checked="checked"';} ?>  type="radio" id='atingiu'  name='objetivo<?php echo $valor['idObjetivo']?>' value='1' /></td>
                        <td align='center' style="width: 80px;"><input <?php if($valor['status'] == 2){ echo 'checked="checked"';} ?>  type="radio" id='naoAtingiu' name='objetivo<?php echo $valor['idObjetivo']?>' value='2'/></td>
                        <td align='center' style="width: 100px;"><input <?php if($valor['status'] == 3){ echo 'checked="checked"';} ?>  type="radio" id='emConstrucao' name='objetivo<?php echo $valor['idObjetivo']?>' value='3'/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php
        }
        ?>
        
    </table>
    
</div>
<table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>
        Observação
    </td>
</tr>
<tr>
    <td>
        <?php 
        $query = ' Select * From Relatorio where idRelatorio = '.$idRelatorio;
        
        $result = $classGeral->select($query);
        
        foreach($result as $var => $valor){
        ?>
            <textarea name='observacao' id='observacao' style="width: 500px;height: 100px;" ><?php echo $valor['observacao']?></textarea>
        <?php
        }
        ?>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>Correção</td>
</tr>
<?php
$query = ' Select * From Correcao where idRelatorio = '.$idRelatorio;
        
$result = $classGeral->select($query);
if(count($result) > 0)
{
    foreach($result as $var => $valor){
    ?>
    <tr>
        <td><textarea readonly="readonly" id='correcao' style="width: 500px;height: 100px;" ><?php echo $valor['descricao']?></textarea></td>
    </tr>
    <?php
    }
}
?>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td align='center'>
        <table   style="width: 280px;">
            <tr>
                <td align='center'><input id='btSalvarConcluir'  name="btSalvarConcluir" type='submit' value='Concluir Relatório'/></td>
            </tr>
        </table>
    </td>
</tr>
</table>


    