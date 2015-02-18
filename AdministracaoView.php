<?php
include "./Model/config.php";
include "./Model/MySql_Class.php";
$myClass = new MySql_Class();
$listGrupos = $myClass->getGruposDoUsuario($_SESSION['user']['idUser']);
?>

<div align="center">
    <div>
        <h1 class="titutlo">Administração</h1>
    </div>
    <div id="conteudo_opc">
        <div style="width: 100%;border-style: groove;border-bottom: none;" >
            <div style="margin-top: 1%;margin-bottom: 1%;">
                <table style="width: 70%;" >
                    <button onclick="loadDiv('CadastroGrupoView.php','dados')">Criar um novo Grupo</button>
                </table>
            </div>
            <table style="width: 70%;" >
                <tr>
                    <?php
                    if($listGrupos)
                    foreach($listGrupos as $col => $r){
                        ?>
                        <td align="center" valign="top">
                            <table style="width: 100%;border-style: groove;" >
                                <tr>
                                    <td align="left"><b><?php echo $r['titulo']?></b></td>
                                    <td align="center"><button onclick="AddUsuarioNoGrupo(this.id.split('/')[0],this.id.split('/')[1]);" id="<?php echo $r['idGrupo'].'/'.$_SESSION['user']['idUser']?>">+</button></td>
                                </tr>
                            </table>
                            <table style="width: 100%;border-style: groove;" >
                                <?php
                                $usuarioDoGrupo = $myClass->getUsuariosPorGrupo($r['idGrupo']);
                                foreach($usuarioDoGrupo as $colUser => $rUser){
                                ?>
                                <tr>
                                    <td align="left">
                                        <input type="radio" name="nameUsuario"/>
                                    </td>
                                    <td align="left">
                                        <?php echo $rUser['name']?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div id="div_solicitacoes" style="width: 100%;border-style: groove;border-bottom: none;margin-top: 1%;margin-bottom: 1%;" >
            <div style="">
                <table style="width: 70%;" >
                    <tr>
                        <td align="center">
                            <div>
                                <h1 class="titutlo">Solicitações</h1>
                            </div>
                        </td>
                    </tr>
                </table>
                
                <table style="width: 70%;" >
                    <tr>
                        <td align="center">
                            <?php
                            $solicitacoes = $myClass->GetSolicitacoesDeUmSolicitado($_SESSION['user']['idUser']);
                            if($solicitacoes)
                            {
                            ?>
                            <div>
                                <h1 class="subTitutlo">Solicitadas</h1>
                            </div>
                            <table style="width: 30%;border-style: groove;" >
                                <tr>
                                    <td align="center" style="border-style: groove;"><b>Solicitante</b></td>
                                    <td align="center" style="border-style: groove;"><b>Grupo</b></td>
                                    <td align="center" style="border-style: groove;"><b>Estado</b></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php 

                                foreach ($solicitacoes as $col => $r)
                                {
                                    $solicitante = $myClass->GetUsuarioById($r['idUsuarioEnvia']);
                                    $grupo = $myClass->GetGrupoById($r['idGrupo']);
                                ?>
                                    <tr>
                                        <td align="center" style="border-style: groove;"><?php echo $solicitante[0]['name']?></td>
                                        <td align="center" style="border-style: groove;"><?php echo $grupo[0]['titulo']?></td>
                                        <td align="center" style="border-style: groove;"><?php echo $r['estado']?></td>
                                            <?php 
                                            if($r['idEstadoSolicitacao'] == 2)
                                            {
                                                ?>
                                                <td align="center" style="border-style: groove;">
                                                <button onclick="CancelaSolicitacaoVinculo(this.id);" id="<?php echo $r['idSolicitacao']?>" style="background-color: red;">Recusar</button>
                                                <button id="<?php echo $r['idSolicitacao']?>" onclick="ConfirmaVinculo(this.id);" style="background-color: green;">Aceitar</button>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <?php
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            $solicitacoesRealizadas = $myClass->GetSolicitacoesDeUmSolicitante($_SESSION['user']['idUser']);
                            if($solicitacoesRealizadas)
                            {
                            ?>
                            <div>
                                <h1 class="subTitutlo">Realizadas</h1>
                            </div>
                            <table style="width: 30%;border-style: groove;" >
                                <tr>
                                    <td align="center" style="border-style: groove;"><b>Solicitado</b></td>
                                    <td align="center" style="border-style: groove;"><b>Grupo</b></td>
                                    <td align="center" style="border-style: groove;"><b>Estado</b></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php 

                                foreach ($solicitacoesRealizadas as $colSa => $ra)
                                {
                                    $solicitado = null;
                                    if(isset($ra['idUsuarioRecebe']))
                                    {
                                        $solicitado = $myClass->GetUsuarioById($ra['idUsuarioRecebe']);
                                    }
                                    else
                                    {
                                        $solicitado[0]['name'] = $ra['email'];
                                    }
                                    $grupo = $myClass->GetGrupoById($ra['idGrupo']);
                                ?>
                                    <tr>
                                        <td align="center" style="border-style: groove;"><?php echo $solicitado[0]['name'];?></td>
                                        <td align="center" style="border-style: groove;"><?php echo $grupo[0]['titulo']?></td>
                                        <td align="center" style="border-style: groove;"><?php echo $ra['estado']?></td>
                                        <?php 
                                        if($ra['idEstadoSolicitacao'] == 2)
                                        {
                                            ?>
                                        <td align="center" style="border-style: groove;">
                                            <button onclick="CancelaSolicitacaoVinculoRealizadas(this.id);" id="<?php echo $ra['idSolicitacao']?>" style="background-color: red;">Cancelar</button>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <?php
                            }
                            ?>
                        </td>    
                    </tr>
                    
                    <tr>
                        <td align="center">
                            
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div id="carregaCadastro" style="display: none;">
        </div>
    </div>
</div>
