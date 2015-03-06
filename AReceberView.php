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
    $listTicket = $myClass->getTicketFromGrupoAndUser($idGrupo,$_SESSION['user']['idUser']);
    
    if(count($listTicket) > 0)
    {
        $temTickets = true;
    }
}
?>
<div align="center">
    <input type="hidden" id="idTicketChecked" name="idTicketChecked"/>
    <div>
        <h1 class="titutlo">A Receber</h1>
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
                                    <button id="btRegistrarPagamento" disabled="disabled" onclick="//RegistrarPagamento(<?php //echo $_SESSION['user']['idUser'];?>)">Registrar Pagamento</button>&nbsp;
                                    <button disabled="disabled">Visualizar Fluxo</button>&nbsp;
                                    <button disabled="disabled">Cancelar Ticket</button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php
                for($j = 0;$j < count($listGrupos);$j++)
                {
                    $idGrupo = $listGrupos[$j]['idGrupo'];
                    $listTicket = $myClass->getTicketFromGrupoAndUser($idGrupo,$_SESSION['user']['idUser']);
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
                                <td align="center" style="border-style: groove;width: 70%;border-right: none;">Título</td>
                                <td align="center" style="border-style: groove;width: 15%;border-right: none;">Valor do Ticket</td>
                                <td align="center" style="border-style: groove;width: 25%;border-right: none;">Valor Pago</td>
                            </tr>
                            <!--Corpo-->
                            
                            <?php
                            for($i = 0;$i < count($listTicket);$i++)
                            {
                                $totalPago = $myClass->getTotalPagoPorTicket($listTicket[$i]['idTicket']);
                            ?>
                            
                            <tr >
                                <td align="center" style="border-style: groove;width: 70%;border-right: none;border-top: none;">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td align="left" style="width: 2px;"><input class="idTicket" id="idTicket" name="idTicket" value="<?php echo $listTicket[$i]['idTicket'];?>" type="hidden" onclick="//setValor('idTicketChecked','<?php //echo $listTicket[$i]['idTicket'];?>');setEnable('btRegistrarPagamento')"/></td>
                                            <td align="left" ><label><?php echo $listTicket[$i]['titulo']?></label></td>
                                            <td align="right"><a href="#"  onclick="loadDiv('DetalhesView.php?tipoConta=receber&idTicket=<?php echo $listTicket[$i]['idTicket'];?>','detalhes')">detalhe</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center" style="border-style: groove;width: 15%;border-right: none;border-top: none;">
                                    <label><?php echo $myClass->moedaGetDB($listTicket[$i]['valorTicket']) ?></label>
                                </td>
                                <td align="center" style="border-style: groove;width: 25%;border-right: none;border-top: none;">
                                    <label><?php echo $myClass->moedaGetDB($totalPago[0]['valorPago']) ?></label>
                                </td>
                            </tr>
                            <?php
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