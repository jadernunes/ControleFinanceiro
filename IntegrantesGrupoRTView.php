<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();
$usuarioDoGrupo = $myClass->getUsuariosPorGrupo($_GET['idGrupo']);
if($usuarioDoGrupo)
{
?>
<table style="width: 20%;" >
    <tr>
        <td style="width: 30%;">
            <input checked="checked" id="selecctall" class="selecctall"   onclick="selectAllCheckbox(this,'mark_idUsuario')" type="checkbox" name="selecctall"/>Todos
        </td>
    </tr>
</table>
<table style="width: 20%;border-style: groove;" >
    <?php
    foreach($usuarioDoGrupo as $colUser => $rUser){
//        if($rUser['idUsuario'] != $_SESSION['user']['idUser'])
//        {
    ?>
        <tr>
            <td align="left">
                <input style="width: 100%;" class="mark_idUsuario" type="checkbox" id="idUsuario" name="idUsuario<?php echo $rUser['idUsuario']?>" value="<?php echo $rUser['idUsuario']?>" checked="checked" onclick="unSelectedCheckbox('selecctall',this)"/>
            </td>
            <td align="left">
                <?php echo $rUser['name']?>
            </td>
        </tr>
    <?php
//        }
    }
    ?>
</table>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td align="center">
        <table>
            <tr>
                <td><label>Valor</label></td>
            </tr>
            <tr>
                <td>
                    <input type="text" id="idValor" name="valorTicket"/>
                </td>
            </tr>
        </table>
    </td>
</tr>
<?php
}
?>