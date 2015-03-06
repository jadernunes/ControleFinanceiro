<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();
if(isset($_GET['idTicket']))
{
    $ticket = $myClass->getTicket($_GET['idTicket']);
    
    $usuariosTicket = $myClass->getUsuariosByTicket($ticket[0]['idTicket']);
//    $myClass->show($usuariosTicket);
?>
<div align="center" style="border-style: groove;border-bottom: none;margin-top: 2%;">
    <div>
        <h1 class="titutlo">Detalhes</h1>
    </div>
    <div id="conteudo_opc" >
        <div style="width: 100%;">
            <div style="width: 100%">
                <table style="width: 70%">
                    <tr>
                        <td>
                            <table style="width: 100%">
                                <tr>
                                    <td><label>Título</label></td>
                                </tr>
                                <tr>
                                    <td><input value="<?php echo $ticket[0]['titulo']?>" disabled="disabled" type="text" style="width: <?php echo '\''.strlen($ticket[0]['titulo']).'px\'';?>"/></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="width: 100%"><label>Descrição</label></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;height: 50%;"><textarea disabled="disabled" style="width: 100%;"><?php echo $ticket[0]['descricao']?></textarea></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td align="center">
                                        <table style="width: 70%;">
                                            <tr>
                                                <td style="width: 70%;" align="center">
                                                    <table>
                                                        <tr>
                                                            <td><label>Valor</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input disabled="disabled" value="<?php echo $myClass->moedaGetDB($ticket[0]['valorTicket']);?>" type="text" style="width: 100%;"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <?php
                                            if($usuariosTicket)
                                            {
                                            ?>
                                            <tr>
                                                <td style="width: 70%;" align="center" >
                                                    <table  align="center">
                                                        <tr>
                                                            <td align="center">
                                                                <table>
                                                                    <tr>
                                                                        <td><label>Devedores</label></td>
                                                                    </tr>
                                                                </table>
                                                                <table style="border-style: dotted">
                                                                    <tr>
                                                                        <td>
                                                                            <table >
                                                                                <?php 
                                                                                for($i = 0;$i < count($usuariosTicket);$i++)
                                                                                {
                                                                                    if(isset($_GET['tipoConta']))
                                                                                    {
                                                                                        if($_GET['tipoConta'] == 'pagar')
                                                                                        {
                                                                                            if($usuariosTicket[$i]['idUsuario'] == $_SESSION['user']['idUser'])
                                                                                            {
                                                                                                $totalDevido = $myClass->getValorPagoUsuarioTicket($usuariosTicket[$i]['idUsuario'],$usuariosTicket[$i]['idTicket']);
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $usuariosTicket[$i]['name'].' - '.$myClass->moedaGetDB($usuariosTicket[$i]['valorDevido']).' - '.$myClass->moedaGetDB($totalDevido[0]['valorPago']).' - '.$myClass->moedaGetDB($usuariosTicket[$i]['valorDevido']-$totalDevido[0]['valorPago'])?></td>
                                                                                                </tr>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $totalDevido = $myClass->getValorPagoUsuarioTicket($usuariosTicket[$i]['idUsuario'],$usuariosTicket[$i]['idTicket']);
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td><?php echo $usuariosTicket[$i]['name'].' - '.$myClass->moedaGetDB($usuariosTicket[$i]['valorDevido']).' - '.$myClass->moedaGetDB($totalDevido[0]['valorPago']).' - '.$myClass->moedaGetDB($usuariosTicket[$i]['valorDevido']-$totalDevido[0]['valorPago'])?></td>
                                                                                            </tr>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
?>