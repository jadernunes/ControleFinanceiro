<?php
include "./Model/config.php";
?>
<div align="center">
    <div>
        <h1 class="titutlo">Solicitações Pendentes</h1>
    </div>
    <div id="conteudo_opc" >
        <div style="width: 100%;border-style: groove;border-bottom: none;" >
            <table style="width: 70%" >
                <tr>
                    <td>
                        <table style="width: 100%" align="center">
                            <tr>
                                <td align="left">
                                    <button style="background-color: red;">Recusar</button>&nbsp;
                                    <button style="background-color: green;">Confirmar</button>&nbsp;
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
                                <td align="center" style="border-style: groove;width: 70%;">
                                    <table style="border-style: groove;width: 100%;">
                                        <tr>
                                            <td><input type="checkbox" />Todos</td>
                                            <td>Título</td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center" style="border-style: groove;width: 15%;">Pagante</td>
                                <td align="center" style="border-style: groove;width: 25%;">Valor Pago</td>
                            </tr>
                            <!--Corpo-->
                            <tr>
                                <td align="center" style="border-style: groove;width: 70%;">
                                    <table style="border-style: groove;width: 100%;">
                                        <tr>
                                            <td align="left" style="width: 2px;"><input type="checkbox" /></td>
                                            <td align="left"><label>Camisetas</label></td>
                                            <td align="right"><a href="#" onclick="alert('Abre Detalhe');">detalhe</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center" style="border-style: groove;width: 15%;">
                                    <label>Alisson</label>
                                </td>
                                <td align="center" style="border-style: groove;width: 25%;">
                                    <label>R$ 15,00</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="border-style: groove;width: 70%;">
                                    <table style="border-style: groove;width: 100%;">
                                        <tr>
                                            <td align="left" style="width: 2px;"><input type="checkbox" /></td>
                                            <td align="left"><label>Cartões</label></td>
                                            <td align="right"><a href="#" onclick="alert('Abre Detalhe');">detalhe</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center" style="border-style: groove;width: 15%;">
                                    <label>Enrique</label>
                                </td>
                                <td align="center" style="border-style: groove;width: 25%;">
                                    <label>R$ 25,00</label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>