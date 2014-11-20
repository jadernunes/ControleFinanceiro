<?php
include "./Model/config.php";

$user = $_SESSION['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="Model/functionGeral.js"></script>
        <script src="ajax.googleapis.com_ajax_libs_jquery_1.11.1_jquery.min.js"></script>
        <title>My School</title>
    </head>
    <body>
            <form action="./Persistence/formLogout.php" method="post">
                <table  align="center" style=" background-color: darkgray;width: 100%;border: none;">
                    <tr >
                        <td align="left">
                            <table align="left" style="border: none;">
                                <tr>
                                    <?php 
                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){ 
                                    ?>
                                        <td><input type="button" value="Cadastro Professor" onclick="loadPagina('View/CadastroProfessorView.php')"/></td>
                                    <?php 
                                    }

                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Cadastro Aluno" onclick="loadPagina('View/CadastroAlunoView.php')"/></td>
                                    <?php 
                                    }

                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Cadastro Secretario" onclick="loadPagina('View/CadastroSecretarioView.php')"/></td>
                                    <?php 
                                    }

                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Cadastro Diretor" onclick="loadPagina('View/CadastroDiretorView.php')"/></td>
                                    <?php 
                                    }

                                    if($user['idTipoUsuario'] == 1){
                                    ?>
                                        <td><input type="button" value="Gerar Código de Grupo" onclick="loadPagina('View/GerarCodigoObjetivosView.php')"/></td>
                                        <td><input type="button" value="Cadastro Objetivos" onclick="loadPagina('View/CadastroObjetivosView.php')"/></td>
                                        <td><input type="button" value="Criar Relatórios" onclick="loadPagina('View/CadastroRelatoriosView.php')"/></td>
                                        <td><input type="button" value="Preencher Relatório" onclick="loadPagina('View/PreencherRelatorioView.php')"/></td>
                                        <td><input type="button" value="Relatórios Pendentes" onclick="loadPagina('View/VisualizarRelatorioView.php')"/></td>
                                        <td><input type="button" value="Relatórios Preenchidos" onclick="loadPagina('View/RelPreView.php')"/></td>
                                        <td><input type="button" value="Relatórios Concluidos/Confirmados" onclick="loadPagina('View/RelConcView.php')"/></td>
                                        <td><input type="button" value="Corrigir Relatório" onclick="loadPagina('View/RelCorrigirView.php')"/></td>
                                    <?php 
                                    }
                                    if($user['idTipoUsuario'] == 5){
                                    ?>
                                        <td><input type="button" value="Avaliar Relatorio" onclick="loadPagina('View/AvaliarRelatorioView.php')"/></td>
                                    <?php 
                                    }
                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Cadastro Supervisor" onclick="loadPagina('View/CadastroSupervisorView.php')"/></td>
                                    <?php 
                                    }
                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Cadastro Turma" onclick="loadPagina('View/CadastroTurmaView.php')"/></td>
                                    <?php 
                                    }
                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td><input type="button" value="Lincar Prossor em Turma" onclick="loadPagina('View/LincarProfessorTurmaView.php')"/></td>
                                    <?php 
                                    }
                                    if($user['idTipoUsuario'] == 3 || $user['idTipoUsuario'] == 4){
                                    ?>
                                        <td ><input type="button" value="Lincar Aluno em Turma" onclick="loadPagina('View/LincarAlunoTurmaView.php')"/></td>
                                    <?php 
                                    }
                                    ?>
                                </tr>
                            </table>
                        </td>
                        <td align="right">
                            <table  align="right" cellspacing='0' style=" background-color: darkgray;width: 100%;border: none; margin: none;">
                                <tr>
                                    <td  align="right"><label><?php echo $user['nome'];?>&nbsp;</label><input type="submit" value='Logout'/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
            
    </body>
</html>
