<?php 

include "./Model/config.php";

?>

<html >
    <head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <link href="defaultCSS.css" rel="stylesheet">
        <script src="./Model/functionGeral.js" ></script>
        
        <title>Controle Financeiro</title>
    </head>
    <body style="padding: 0;margin: 0;" >
        <div id="menu" style="width: 100%; height: 40px;background-color: blanchedalmond;">
            <table align="center" valign="middle" style="width: 100%;height: 100%;">
                <tr>
                    <td align="left">
                        <table >
                            <tr >
                                <td ><button onclick="loadDiv('RegistrarTicketView.php','dados')">Registrar Ticket</button></td>
                                <td ><button onclick="loadDiv('AReceberView.php','dados')">A Receber</button></td>
                                <td ><button onclick="loadDiv('APagarView.php','dados')">A Pagar</button></td>
                                <td ><button onclick="loadDiv('RelacaoGeralView.php','dados')">Relação Geral</button></td>
                                <td ><button onclick="loadDiv('SolicitacoesPendentesView.php','dados')">Solicitações Pendentes</button></td>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <table>
                            <tr >
                                <td ><button >Login</button></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div id="dados" align="center" > 
            <table valign="middle"  style="width: 100%;height: 100%;">
                <tr>
                    <td align="center"><h1 style="color: gainsboro;font-size: 72px;">Controle Financeiro</h1></td>
                </tr>
            </table>
        </div>
    </body>
</html>
