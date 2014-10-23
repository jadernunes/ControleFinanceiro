<?php

include "./config.php";
include "./classGeral.php";

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
    
    $query = 'Select * From Objetivo where idUsuarioProfessor = '.$idUserProfessor.' and idTurma = '.$idTurma.' and identificadorGrupo = '.$idGrupo;
    
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
                            <td align='center' style="width: 50px;"><input onclick="setValor('alterado','1');setVisible('btCancelar',true);" type="radio" id='atingiu' name='objetivo<?php echo $valor['idObjetivo']?>' value='1' /></td>
                        <td align='center' style="width: 80px;"><input onclick="setValor('alterado','1');setVisible('btCancelar',true);" type="radio" id='naoAtingiu' name='objetivo<?php echo $valor['idObjetivo']?>' value='2'/></td>
                        <td align='center' style="width: 100px;"><input onclick="setValor('alterado','1');setVisible('btCancelar',true);" type="radio" id='emConstrucao' name='objetivo<?php echo $valor['idObjetivo']?>' value='3'/></td>
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
        <textarea style="width: 500px;height: 100px;resize: none;" onkeypress="setValor('alterado','1');setVisible('btCancelar',true);"></textarea>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td align='center'>
        <table>
            <tr>
                <td align='center'><input type="submit" value='Salvar'/></td>
                <td align='center'><input style="display: none;" type="submit" value='Cancelar' id='btCancelar' name="btCancelar"/></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
</table>

    