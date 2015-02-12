<?php
include "./Model/config.php";
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
                                    <td><input disabled="disabled" type="text" style="width: 100%"/></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="width: 100%"><label>Descrição</label></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;height: 50%;"><textarea disabled="disabled" style="width: 100%;"></textarea></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td align="left">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 20%;">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td>Autor</td>
                                                        </tr>
                                                        <tr>
                                                            <td >
                                                                <select disabled="disabled" style="width: 100%;">
                                                                    <option value="0" >Bruno</option>
                                                                    <option value="1" >Jáder</option>
                                                                    <option value="2" selected="selected">Alisson</option>
                                                                    <option value="3" >Enrique</option>
                                                                    <option value="4" >Guilherme</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Registrou Ticket</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select disabled="disabled" style="width: 100%;">
                                                                    <option value="0" >Bruno</option>
                                                                    <option value="1" >Jáder</option>
                                                                    <option value="2" >Alisson</option>
                                                                    <option value="3" selected="selected">Enrique</option>
                                                                    <option value="4" >Guilherme</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width: 25%;" >
                                                    <table  align="center">
                                                        <tr>
                                                            <td >
                                                                <table>
                                                                    <tr>
                                                                        <td><label>Devedores</label></td>
                                                                    </tr>
                                                                </table>
                                                                <table style="border-style: dotted">
                                                                    <tr>
                                                                        <td>
                                                                            <table >
                                                                                <tr>
                                                                                    <td><input disabled="disabled" type="checkbox" /> Bruno</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input disabled="disabled" type="checkbox" /> Jáder</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input disabled="disabled" type="checkbox" /> Alisson</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input disabled="disabled" type="checkbox" /> Enrique</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input disabled="disabled" type="checkbox" /> Guilherme</td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td><label>Valor</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input disabled="disabled" type="text" style="width: 100%;"/></td>
                                                        </tr>
                                                    </table>
                                                </td>
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