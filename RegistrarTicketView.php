<?php
include "./Model/config.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./Model/functionGeral.js"></script>
        <script src="./ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body>
        <div>
            <h1 class="titutlo">Registrar Ticket</h1>
        </div>
        <div>
            <table >
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td><label>Título</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" style="width: 200px;"/></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td><label>Descrição</label></td>
                            </tr>
                            <tr>
                                <td><textarea style="width: 200px;height: 100px;"></textarea></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td>Autor</td>
                            </tr>
                            <tr>
                                <td>
                                    <select style="width: 200px;">
                                        <option value="0" >Bruno</option>
                                        <option value="1" >Jáder</option>
                                        <option value="2" selected="selected">Alisson</option>
                                        <option value="3" >Enrique</option>
                                        <option value="4" >Guilherme</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td style="border-style: dotted">
                                    <table>
                                        <tr>
                                            <td><label>Devedores</label></td>
                                            <td><input type="checkbox"><label>Todos</label></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <table >
                                                    <tr>
                                                        <td><input type="checkbox" /> Bruno</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" /> Jáder</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" /> Alisson</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" /> Enrique</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" /> Guilherme</td>
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
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><label>Valor</label></td>
                </tr>
                <tr>
                    <td><input type="text" style="width: 200px;"/></td>
                </tr>
            </table>
        </div>
        <div>
            <table>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><button onclick="loadPagina('./')" >Cancelar</button></td>
                    <td><button >Salvar</button></td>
                </tr>
            </table>
        </div>
    </body>
</html>