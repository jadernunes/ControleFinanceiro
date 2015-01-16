<?php
include "./Model/config.php";
?>
<div align="center">
    <div>
        <h1 class="titutlo">A Pagar</h1>
    </div>
    <div id="conteudo_opc" >
        <div style="width: 100%;border-style: groove;border-bottom: none;">
            <table>
                <tr>
                    <td>Total a Pagar</td>
                </tr>
                <tr>
                    <td><input disabled="disabled" type="text" value="R$ 150,00"/></td>
                </tr>
            </table>
            <div style="width: 100%" >
                <table style="width: 70%" >
                    <tr>
                        <td>
                            <table style="width: 100%" align="center">
                                <tr>
                                    <td align="left">
                                        <button onclick="loadDiv('PagarTicketView.php','dados')">Pagar Ticket</button>&nbsp;
                                        <button disabled="disabled">Visualizar Fluxo</button>&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="border-style: groove;width: 100%" align="center">
                                <!--cabeçalho-->
                                <tr>
                                    <td align="center" style="border-style: groove;width: 70%;">Título</td>
                                    <td align="center" style="border-style: groove;width: 15%;">Valor do Ticket</td>
                                    <td align="center" style="border-style: groove;width: 25%;">Valor Pago</td>
                                </tr>
                                <!--Corpo-->
                                <tr>
                                    <td align="center" style="border-style: groove;width: 70%;">
                                        <table style="border-style: groove;width: 100%;">
                                            <tr>
                                                <td align="left" style="width: 2px;"><input type="radio" /></td>
                                                <td align="left"><label>Camisetas</label></td>
                                                <td align="right"><a href="#" onclick="loadDiv('DetalhesView.php','detalhes')">detalhe</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" style="border-style: groove;width: 15%;">
                                        <label>R$ 100,00</label>
                                    </td>
                                    <td align="center" style="border-style: groove;width: 25%;">
                                        <label>R$ 50,00</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-style: groove;width: 70%;">
                                        <table style="border-style: groove;width: 100%;">
                                            <tr>
                                                <td align="left" style="width: 2px;"><input type="radio" /></td>
                                                <td align="left"><label>Cartões</label></td>
                                                <td align="right"><a href="#" onclick="loadDiv('DetalhesView.php','detalhes')">detalhe</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center" style="border-style: groove;width: 15%;">
                                        <label>R$ 150,00</label>
                                    </td>
                                    <td align="center" style="border-style: groove;width: 25%;">
                                        <label>R$ 50,00</label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="detalhes">
        
    </div>
</div>