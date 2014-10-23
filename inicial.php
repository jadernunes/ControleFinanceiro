<?php
include "./config.php";

$user = $_SESSION['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="functionGeral.js"></script>
        <title>My School</title>
    </head>
    <body>
        <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
            <tr >
                <td align="left">
                    <table align="left" style="border: none;">
                        <tr>
                            <?php 
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){ 
                            ?>
                                <td><input type="button" value="Cadastro Professor" onclick="loadPagina('CadastroProfessorView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Cadastro Aluno" onclick="loadPagina('CadastroAlunoView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Cadastro Secretario" onclick="loadPagina('CadastroSecretarioView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Cadastro Diretor" onclick="loadPagina('CadastroDiretorView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            
                            if($user['idTipoUsuario'] == 1){
                            ?>
                                <td><input type="button" value="Gerar Código de Grupo de Objetivos" onclick="loadPagina('GerarCodigoObjetivosView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                                <td><input type="button" value="Cadastro Objetivos" onclick="loadPagina('CadastroObjetivosView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                                <td><input type="button" value="Criar Relatórios" onclick="loadPagina('CadastroRelatoriosView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                                <td><input type="button" value="Preencher Relatório" onclick="loadPagina('PreencherRelatorioView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                                <td><input type="button" value="Visualizar Relatório" onclick="loadPagina('VisualizarRelatorioView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                                <td><input type="button" value="Corrigir Relatório" onclick=""/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            if($user['idTipoUsuario'] == 5){
                            ?>
                                <td><input type="button" value="Avaliar Relatorio" onclick="loadPagina('AvaliarRelatorioView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Cadastro Supervisor" onclick="loadPagina('CadastroSupervisorView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Cadastro Turma" onclick="loadPagina('CadastroTurmaView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td><input type="button" value="Lincar Prossor em Turma" onclick="loadPagina('LincarProfessorTurmaView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                            ?>
                                <td ><input type="button" value="Lincar Aluno em Turma" onclick="loadPagina('LincarAlunoTurmaView.php')"/></td>
                                <td ><label>&nbsp;</label></td>
                            <?php 
                            }
                            ?>
                        </tr>
                    </table>
                </td>
                <td align="right">
                    <table  align="right" cellspacing='0' style=" background-color: darkgray;width: 100%;border: none; margin: none;">
                        <tr>
                            <td  align="right"><label><?php echo $user['login'];?>&nbsp;</label><input type="button" value='Logout' onclick="loadPagina('Index.php');" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>