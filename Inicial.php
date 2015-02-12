<?php

include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();

?>
<div id="div_vefiry"></div>

<div id="menu" style="width: 100%; height: 40px;background-color: blanchedalmond;" >
    <table align="center" valign="middle" style="width: 100%;height: 100%;">
        <tr>
            <td align="left">
                <form action="./formLoad.php" method="post">
                    <table>
                        <tr >
                            <td ><button name="page" value="AdministracaoView-dados" >Administração</button></td>
<!--                            <td ><button name="page" value="RegistrarTicketView-dados" >Registrar Ticket</button></td>
                            <td ><button name="page" value="AReceberView-dados" >A Receber</button></td>
                            <td ><button name="page" value="APagarView-dados">A Pagar</button></td>
                            <td ><button name="page" value="RelacaoGeralView-dados">Relação Geral</button></td>
                            <td ><button name="page" value="SolicitacoesPendentesView-dados">Solicitações de Pagamentos</button></td>-->
                        </tr>
                    </table>
                </form>
            </td>
            <td align="right">
                <form action="./Persistence/formPrinc.php" method="post">
                    <table valign="middle">
                        <tr >
                            <td ><?php echo $_SESSION['user']['nome'];?></td>
                            <td>&nbsp;</td>
                            <td ><button name="logout" value="true">Logout</button></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<div id="dados" align="center">
</div>
<script>
    if(isVisible('menu')){
        loadDiv('InicialDados.php','dados');
    }
    
    if(isVisible('div_vefiry')){
        loadDiv('pageVerify.php','div_vefiry');
    }
</script>