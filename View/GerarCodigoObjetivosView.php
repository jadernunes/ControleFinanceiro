<?php
include "../Model/config.php";
include "../Model/classGeral.php";

$classGeral = new classGeral();

$result = $classGeral->select('Select * From Grupo');
$resultMax = $classGeral->select('Select MAX(identificadorGrupo) From Grupo');

$idMax = $resultMax[0]['MAX(identificadorGrupo)'];

if($idMax <= 0 || $idMax == null || $idMax == "" || $idMax == "null" || $idMax == "NULL"){
    $idMax = 0;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Model/functionGeral.js"></script>
        <script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body>
        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
            <tr>
                <td  align="left">
                    <form action="../Persistence/formGerarCodigoObjetivos.php" name="form" method="post" >
                        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                            <tr>
                                <td  align="left">
                                    <input type="submit" value="Gerar codigo"/>
                                    <input type="hidden" id="idMax" name="idMax" value="<?php echo $idMax;?>"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('../Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table  align="center" >
            <tr>
                <td><label>Código</label></td>
                <td>&nbsp;</td>
                <td><label>Status</label></td>
            </tr>
            <?php
            foreach ($result as $coll => $valor){
            ?>
            <tr >
                <td style="border-style: groove;"><label><?php echo $valor['identificadorGrupo']?></label></td>
                <td>&nbsp;</td>
                <?php
                $status = $valor['status'];
                if($status == 0){
                    $status = "Liberado";
                }
                else if($status == 1){
                    $status = "Usado";
                }
                else if($status == 2){
                    $status = "Bloqueado";
                }
                ?>
                <td style="border-style: groove;"><label><?php echo $status;?></label></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>

    