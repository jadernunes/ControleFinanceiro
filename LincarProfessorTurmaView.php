<?php
include "./config.php";
include "./classGeral.php";

$classGeral = new classGeral();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="functionGeral.js"></script>
        <title>My School</title>
    </head>
    <body>
        <table cellpadding=0 cellspacing=0  align="center" style=" background-color: darkgray;width: 100%;border-bottom: none;border-left: none;border-right: none;">
            <tr>
                <td  align="left">
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="left">Lincar Professor em Turma</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table align="center" style=" background-color: darkgray;width: 100%;border: none;border-bottom: none;border-left: none;border-right: none;">
                        <tr>
                            <td  align="right"><input type="button" value='Início' onclick="loadPagina('Inicial.php')" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <form action="formLincar.php" name="form" method="post">
            <table cellpadding=0 cellspacing=0 align="center" style="border-bottom: none;border-left: none;border-right: none;">
                <input type="hidden" id="typeLinck" name="typeLinck" value="professorTurma"/>
                <tr><td align="center">Selecione uma turma</td></tr>
                <tr>
                    <td align="center">
                        <select id="idTurma" name="idTurma" style="width: 200px;">
                            <option value="0" >Select</option>
                            <?php

                            $result = $classGeral->select('Select * From Turma');

                            foreach($result as $var => $valor){
                                ?>
                            <option value="<?php echo $valor['idTurma'];?>"><?php echo $valor['codigo'].'/'.$valor['ano'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td align="center">&nbsp;</td></tr>
                <tr><td align="center"><input type="submit" value="Lincar os Usuários abaixo"/></td></tr>
                <tr><td align="center">&nbsp;</td></tr>
                <tr><td align="center">Professores</td></tr>
                <tr>
                    <td align="center">
                        <table  cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%;">
                            <tr>
                                <td align="center" >Nome</td>
                                <td align="center" >email</td>
                                <td align="center" >
                                    <input type="checkbox" name="todos" id="todos" value="todos" onclick="marcardesmarcar();" /> Marcar/Desmarcar todos<br/>
                                </td>
                            </tr>
                            <?php

                            $result = $classGeral->select('Select * from usuario u where u.idTipoUsuario = 1');

                            foreach($result as $var => $valor){
                            ?>
                                <tr>
                                    <td align="center" style="width: 100px;border-style: ridge;border-bottom: none;border-left: none;border-right: none;"><label><?php echo $valor['nome'];?></label></td>
                                    <td align="center" style="width: 200px;border-style: ridge;border-bottom: none;"><label><?php echo $valor['login'];?></label></td>
                                    <td align="center" style="width: 50px;border-style: ridge;border-bottom: none;border-right: none;"><input type="checkbox" class="marcar" id="idUsuario" name="idUsuario<?php echo $valor['idUsuario'];?>" value="<?php echo $valor['idUsuario'];?>"/></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr><td align="center" style="height: 200px;">&nbsp;</td></tr>
                <tr>
                    <td align="center" >
                        <table  cellpadding=0 cellspacing=0 align="center" style="border-style: groove;width: 100%; border-style: solid;border-width: 1px;">
                            <tr>
                                <td align="center">
                                    Turmas
                                </td>
                                <td style="border-style: solid;border-width: 1px;">
                                    <table cellpadding=0 cellspacing=0 style="border-style: solid;border-width: 1px;width: 100%;">
                                        <tr>
                                            <td align="center">
                                                <table>
                                                    <tr>
                                                        <td>Professores</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <table cellpadding=0 cellspacing=0 style="border-style: solid;border-width: 1px;width: 100%;">
                                                    <tr>
                                                        <td style="border-style: solid;border-width: 1px;width: 200px;" align="center">Nome</td>
                                                        <td style="border-style: solid;border-width: 1px;width: 200px;" align="center">Email</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php
                            $resultTurmas = $classGeral->select('Select * From Turma');
                            foreach($resultTurmas as $varT => $valorT){
                                ?>
                            <tr>
                                <td align="center"  style="border-style: solid;border-width: 1px;">
                                    <table cellpadding=0 cellspacing=0>
                                        <tr>
                                            <td align="center"  >
                                                <label><?php echo $valorT['codigo'].'/'.$valorT['ano'];?></label>
                                            </td>

                                        </tr>
                                        
                                    </table>
                                </td>
                                <td  >
                                    <table cellpadding=0 cellspacing=0  style="border-style: solid;border-width: 1px;width: 100%">
                                        <?php

                                        $resultP = $classGeral->select('select * From Usuario u inner join UsuarioTurma ut on u.idUsuario = ut.idUsuario where u.idTipoUsuario = 1 and ut.idTurma = '.$valorT['idTurma']);

                                        foreach($resultP as $varP => $valorP){
                                        ?>
                                        <tr>
                                            <td  align="center" style="border-style: solid;border-width: 1px;width: 200px;">
                                                <label><?php echo $valorP['nome'];?></label>
                                            </td>
                                            <td align="center" style="border-style: solid;border-width: 1px;width: 200px;">
                                                <label><?php echo $valorP['login'];?></label>
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
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>