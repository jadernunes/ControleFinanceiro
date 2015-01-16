<?php
include "./Model/config.php";
?>
<div align="center">
    <div>
        <h1 class="titutlo">Pagar Ticket</h1>
    </div>
    <div id="conteudo_opc" >
        <div style="width: 100%;border-style: groove;border-bottom: none;">
            <table style="width: 70%;" >
                <tr>
                    <td style="width: 70%;">
                        <table style="width: 100%;">
                            <tr>
                                <td  style="">
                                    <table style="width: 100%;" >
                                        <tr><td align="left"><label>Título</label></td></tr>
                                        <tr><td><input type="text" style="width: 100%;"/></td></tr>
                                    </table>
                                </td>
                                <td  style="width: 20%;">
                                    <table   style="width: 100%;">
                                        <tr><td align="left"><label>Valor do Ticket</label></td></tr>
                                        <tr><td ><input type="text" style="width: 100%;"/></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td  style="width: 70%;">
                        <table style="width: 100%;" >
                            <tr><td align="left"><label>Título</label></td></tr>
                            <tr><td><textarea style="width: 100%;"></textarea></td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="width: 70%;">
                        <table style="width: 30%;">
                            <tr>
                                <td  style="">
                                    <table   style="width: 100%;">
                                        <tr><td align="left"><label>Valor</label></td></tr>
                                        <tr><td ><input type="text" style="width: 100%;"/></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align='center' style="width: 70%;">
                        <table style="width: 100%;">
                            <tr>
                                <td align='center'><button style="background-color: red;" onclick="loadDiv('APagarView.php','dados')">Cancelar</button>&nbsp;<button style="background-color: green;" onclick="loadDiv('APagarView.php','dados')">Salvar</button></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
