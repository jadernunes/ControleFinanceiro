<?php

include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();

if(isset($_GET['idGrupo']))
{
    if($_GET['idGrupo'] != -1)
    {
?>
<!--    <table style="width: 100%;">
        <tr>
            <td>-->
                <?php
                $usuarios = $myClass->getUsuariosPorGrupo($_GET['idGrupo']);
                
                ?>
                <select>
                    <option value="0">Selecione</option>
                    <?php
                    foreach ($usuarios as $coll => $dado)
                    {
                        ?>
                        <option value="<?php echo $dado['idGrupo']?>"><?php echo $dado['name']?></option>
                        <?php
                    }
                    ?>
                </select>
<!--            </td>
        </tr>
    </table>-->
<?php
    }
}
?>