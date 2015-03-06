<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();
$listGrupos = $myClass->getGruposDoUsuario($_SESSION['user']['idUser']);
$temTickets = false;
if($listGrupos)
for($j = 0;$j < count($listGrupos);$j++)
{
    $idGrupo = $listGrupos[$j]['idGrupo'];
    $listTicket = $myClass->getTicketFromUsuarioDevedorByBrupo($_SESSION['user']['idUser'],$idGrupo);
    
    if(count($listTicket) > 0)
    {
        $temTickets = true;
    }
}
?>
<div align="center">
    <input type="hidden" id="idTicketChecked" name="idTicketChecked"/>
    <div>
        <h1 class="titutlo">A Pagar</h1>
    </div>
    <div id="conteudo_opc" style="border-style: groove;border-bottom: none;">
<!--        <table>
            <tr>
                <td>Total a Receber</td>
            </tr>
            <tr>
                <td><input disabled="disabled" type="text" value="R$ 380,00"/></td>
            </tr>
        </table>-->
        <div style="width: 100%;" >
            <?php
            if($temTickets == true)
            {
            ?>
            <table style="width: 70%" >
                <tr>
                    <td>
                        <table style="width: 100%" align="center">
                            <tr>
                                <td align="left">
                                    <button disabled="disabled" id="btPagarTicket" onclick="RegistrarPagamento(<?php echo $_SESSION['user']['idUser'];?>);">Pagar Ticket</button>&nbsp;
                                    <button disabled="disabled">Visualizar Fluxo</button>&nbsp;
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php
                for($j = 0;$j < count($listGrupos);$j++)
                {
                    $idGrupo = $listGrupos[$j]['idGrupo'];
                    $listTicket = $myClass->getTicketFromUsuarioDevedorByBrupo($_SESSION['user']['idUser'],$idGrupo);
                    if($listTicket)
                    {
                ?>
                <tr>
                    <td>Grupo: <b><?php echo $listGrupos[$j]['titulo'];?></b></td>
                </tr>
                <tr>
                    <td>
                        <table style="border-style: groove;width: 100%" align="center" cellpadding="0" cellspacing="0">
                            <!--cabeçalho-->
                            <tr >
                                <td align="center" style="border-style: groove;width: 55%;border-right: none;">Título</td>
                                <td align="center" style="border-style: groove;width: 10%;border-right: none;">Valor do Ticket</td>
                                <td align="center" style="border-style: groove;width: 10%;border-right: none;">Valor Pago</td>
                                <td align="center" style="border-style: groove;width: 50%;border-right: none;">Para</td>
                            </tr>
                            <!--Corpo-->
                            
                            <?php
                            for($i = 0;$i < count($listTicket);$i++)
                            {
                                
                                $totalDevido = $myClass->getValorPagoUsuarioTicket($_SESSION['user']['idUser'], $listTicket[$i]['idTicket']);
                                $totalPago = $myClass->getTotalPagoPorTicket($listTicket[$i]['idTicket']);
                                
                                if($myClass->moedaGetDB($totalPago[0]['valorPago']) < $myClass->moedaGetDB($listTicket[$i]['valorTicket']))
                                {
//                                    $myClass->show($myClass->moedaGetDB($listTicket[$i]['valorTicket'] - $totalPago[0]['valorPago']));
                                    if($myClass->moedaGetDB($listTicket[$i]['valorTicket'] - $totalPago[0]['valorPago']) > 0.01)
                                    {
                                        $totalDevido = $myClass->getValorPagoUsuarioTicket($_SESSION['user']['idUser'],$listTicket[$i]['idTicket']);
//                                        $myClass->show($myClass->moedaGetDB($totalPago[0]['valorPago']));
//                                        if($totalDevido < $myClass->moedaGetDB($totalPago[0]['valorPago']))
//                                        {
                                            ?>
                                            <tr >
                                                <td align="center" style="border-style: groove;width: 55%;border-right: none;border-top: none;">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td align="left" style="width: 2px;"><input class="idTicket" id="idTicket" name="idTicket" value="<?php echo $listTicket[$i]['idTicket'];?>" type="radio" onclick="setValor('idTicketChecked',<?php echo $listTicket[$i]['idTicket'];?>);setEnable('btPagarTicket');"/></td>
                                                            <td align="left" ><label><?php echo $listTicket[$i]['titulo']?></label></td>
                                                            <td align="right"><a href="#"  onclick="loadDiv('DetalhesView.php?tipoConta=pagar&idTicket=<?php echo $listTicket[$i]['idTicket'];?>','detalhes')">detalhe</a></td>

                                                        </tr>
                                                    </table>
                                                </td>
                                                <td align="center" style="border-style: groove;width: 15%;border-right: none;border-top: none;">
                                                    <label><?php echo $myClass->moedaGetDB($listTicket[$i]['valorTicket']) ?></label>
                                                </td>
                                                <td align="center" style="border-style: groove;width: 15%;border-right: none;border-top: none;">
                                                    <label><?php echo $myClass->moedaGetDB($totalPago[0]['valorPago']); ?></label>
                                                </td>
                                                <td align="center" style="border-style: groove;width: 50%;border-right: none;border-top: none;">
                                                    <label><?php echo $myClass->GetUsuarioById($listTicket[$i]['idUsuarioAutor'])[0]['name']?></label>
                                                </td>
                                            </tr>
                                            <?php
//                                        }
                                    }
                                }
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
            <?php
            }
            ?>
        </div>
    </div>
    <div id="detalhes">
        
    </div>
    <div id="divRegistraPagamento">
        
    </div>
</div>