<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";

$myClass = new MySql_Class();
$listGrupos = $myClass->getGruposDoUsuario($_SESSION['user']['idUser']);
?>
<div align="center" style="border-style: groove;border-bottom: none;margin-top: 2%;">
    <div>
        <h1 class="titutlo">Pagar Ticket</h1>
    </div>
    <div id="conteudo_opc" >
        <div style="width: 100%;">
            <form action="./Persistence/formPrinc.php" method="post" >
                <div style="width: 100%">
                    <table style="width: 70%">
                        <tr>
                            <td >
                                <table style="width: 100%">
                                    <tr>
                                        <td><label>Título</label></td>
                                    </tr>
                                    <tr>
                                        <td><input id="titulo" name="titulo" type="text" style="width: 100%"/></td>
                                    </tr>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr>
                                        <td style="width: 100%"><label>Descrição</label></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%;"><textarea id="descricao" name="descricao" style="width: 100%;"></textarea></td>
                                    </tr>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr>
                                        <td align="center">
                                            <table>
                                                <tr>
                                                    <td><label>Grupo</label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select id="idGrupo" name="idGrupo" onchange="loadDiv('IntegrantesGrupoRTView.php?idGrupo='+$(this).val(),'divDevedores');">
                                                            <option value="0">Selecione</option>
                                                            <?php 
                                                            if($listGrupos)
                                                            {
                                                                foreach($listGrupos as $col => $r){
                                                                ?>
                                                                <option value="<?php echo $r['idGrupo']?>"><?php echo $r['titulo']?></option>
                                                                <?php 
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div id="divDevedores"></div>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <table>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td><button name="page" value="Inicial-dados" style="background-color: red;">Cancelar</button></td>
                            <td><button name="registrarTicket" value="salvar" style="background-color: green;">Salvar</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>