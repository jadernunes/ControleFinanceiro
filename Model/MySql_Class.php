<?php
include "classGeral.php";

class MySql_Class {
       
    function CadastroNovoUsuario($nome,$email,$identificador)
    {
        $classGeral = new classGeral();
        $sqlUser = 'INSERT INTO Usuario (name,email,identificador,ativo) VALUES (\''.$nome.'\',\''.$email.'\',\''.$identificador.'\',1);';
        $idUsuario = $classGeral->insert($sqlUser);
//        $this->alert($sql);
        
        if(count($idUsuario) > 0)
        {
            $sqlGrupoGeral = 'INSERT INTO UsuarioGrupo (idUsuario,idGrupo,ativo) VALUES ('.$idUsuario.',1, 1);';
            $idUsuarioGrupo = $classGeral->insert($sqlGrupoGeral);
            
            if($idUsuarioGrupo)
            {
                $idSolicitacao = $this->AtualizaSolicitacoesParaNovoUsuario($email,$idUsuario);
                if($idSolicitacao)
                {
                    $sql = 'SELECT * FROM Usuario WHERE idUsuario = '.$idUsuario;
                    $user = $classGeral->select($sql);
                    if($user)
                    {
                        return $user;
                    }
                    return FALSE;
                }
                return FALSE;
            }
            return FALSE;
        }
        return FALSE;
    }
            
    function GetGrupoById($idGrupo)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT * FROM Grupo WHERE idGrupo = '.$idGrupo;
        $grupo = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($grupo) > 0)
        {
            return $grupo;
        }
        
        return NULL;
    }
    
    function GetUsuarioById($idUsuario)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT * FROM Usuario WHERE idUsuario = '.$idUsuario;
        $user = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($user) > 0)
        {
            return $user;
        }
        
        return NULL;
    }
    
    function GetSolicitacoesDeUmSolicitado($idUsuario)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT s.*,e.descricao\'estado\',s.idEstadoSolicitacao FROM Solicitacao s INNER JOIN EstadoSolicitacao e on e.idEstadoSolicitacao = s.idEstadoSolicitacao WHERE s.idUsuarioRecebe = '.$idUsuario.' ORDER BY s.idEstadoSolicitacao DESC';
        $solicitacao = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return $solicitacao;
        }
        
        return NULL;
    }
    
    function GetSolicitacoesDeUmSolicitante($idUsuario)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT s.*,e.descricao\'estado\',s.idEstadoSolicitacao FROM Solicitacao s INNER JOIN EstadoSolicitacao e on e.idEstadoSolicitacao = s.idEstadoSolicitacao WHERE s.idUsuarioEnvia = '.$idUsuario.' ORDER BY s.idEstadoSolicitacao = 2 DESC';
        $solicitacao = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return $solicitacao;
        }
        
        return NULL;
    }
    
    function AtualizaSolicitacoesParaNovoUsuario($email,$idUsuario)
    {
        $classGeral = new classGeral();
        $sql = 'UPDATE Solicitacao SET idUsuarioRecebe = '. $idUsuario .' where email like \''.$email.'\'';
        $idSolicitacao = $classGeral->insert($sql);
//        $this->alert($sql);
//        break;
        if(count($idSolicitacao) > 0)
        {
            return TRUE;
        }
        return FALSE;
    }
    
    function CriarGrupo($titulo,$idusuarioCriador)
    {
        $classGeral = new classGeral();
        $idGrupo = $classGeral->insert('INSERT INTO Grupo(titulo,idUsuarioCriador,ativo) VALUES (\''. $titulo .'\','. $idusuarioCriador .',1)');
        
        if($idGrupo)
        {
            $idGrupo = $classGeral->insert('INSERT INTO UsuarioGrupo(idUsuario,idGrupo,ativo) VALUES ('. $idusuarioCriador .', '. $idGrupo .', 1)') ? $idGrupo : NULL;
        }
        
        return $idGrupo;
    }
    
    function usuarioEstaNoGrupo($email,$grupo)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT u.* FROM Usuario u INNER JOIN UsuarioGrupo ug on u.idUsuario = ug.idUsuario WHERE ug.idGrupo = '.$grupo.' AND u.email like \''.$email.'\' AND ug.ativo = 1';
        $user = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($user) > 0)
        {
            return TRUE;
        }
        
        return false;
    }
    
    function temSolicitacaoVinculoParaGrupo($email,$grupo)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT s.* FROM Usuario u INNER JOIN Solicitacao s WHERE u.idUsuario = s.idUsuarioRecebe AND s.idGrupo = '.$grupo.' AND s.idTipoSolicitacao = 1 AND (s.email like \''.$email.'\' AND s.idEstadoSolicitacao = 2)';
        $solicitacao = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return true;
        }
        
        return false;
    }
    function CancelaSolicitacaoVinculo($idSolicitacao)
    {
        $classGeral = new classGeral();
        $idSolicitacao = $classGeral->insert('UPDATE Solicitacao SET idEstadoSolicitacao = 3 where idSolicitacao = '.$idSolicitacao);
        
        if($idSolicitacao)
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    function CancelaSolicitacaoVinculoRealizadas($idSolicitacao)
    {
        $classGeral = new classGeral();
        $idSolicitacao = $classGeral->insert('DELETE FROM Solicitacao where idSolicitacao = '.$idSolicitacao);
        
        if($idSolicitacao)
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    function ConfirmaVinculo($idSolicitacao)
    {
        $classGeral = new classGeral();
        $sql = 'SELECT * FROM Solicitacao WHERE idSolicitacao = '.$idSolicitacao;
        $solicitacao = $classGeral->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            $usuarioGrupo = $classGeral->insert('INSERT INTO UsuarioGrupo (idUsuario,idGrupo,ativo) VALUES ('.$solicitacao[0]['idUsuarioRecebe'].','.$solicitacao[0]['idGrupo'].', 1)');
            
            if(count($usuarioGrupo) > 0)
            {
                $idSolicitacao = $classGeral->insert('UPDATE Solicitacao SET idEstadoSolicitacao = 1 where idSolicitacao = '.$idSolicitacao);
        
                if($idSolicitacao)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
            
    function AddUsuarioNoGrupo($email,$idGrupo,$idUsuarioEnvia)
    {
        $classGeral = new classGeral();
        
        /*
         * 1º - Criar uma solicitação
         * 2º - Se usuário já esá cadastrado aparece para ele uma solicitação pendente podendo ele aprovar ou recusar
         * 3º - Se ele não está Cadastrado, apos ele realizar o cadastro é mostrada a ele uma solicitação pendente e não é feito o vínculo no momento.
         * 4º - Somente após o usuário confirmar a solicitação é que é feito o vínculo;
         */
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $user = $this->getUsuarioByEmail($email);
            if($user)
            {
                if(!$this->usuarioEstaNoGrupo($email,$idGrupo))
                {
                    if(!$this->temSolicitacaoVinculoParaGrupo($email,$idGrupo))
                    {
                        $idUsuarioRecebe = $user[0]['idUsuario'];
                        $sql = 'INSERT INTO Solicitacao (idUsuarioEnvia,idUsuarioRecebe,idGrupo,idEstadoSolicitacao,idTipoSolicitacao,email) VALUES ('.$idUsuarioEnvia.','.$idUsuarioRecebe.', '.$idGrupo.', 2, 1,\''.$email.'\')';
                        $idSolicitacao = $classGeral->insert($sql);
                        if($idSolicitacao)
                        {
                            $this->alert('Solicitação criada com sucesso!');
                            return TRUE;
                        }
                        else
                        {
                            $this->alert('Ocorreu um problema no seu pedido');
                            return FALSE;
                        }
                    }
                    else
                    {
                        $this->alert('Usuário já tem uma solicitação pendente para entrar neste Grupo');
                        return FALSE;
                    }
                }
                else
                {
                    $this->alert('Usuário já está no Grupo');
                    return FALSE;
                }
            }
            else
            {
                $sql = 'INSERT INTO Solicitacao (email,idUsuarioEnvia,idGrupo,idEstadoSolicitacao,idTipoSolicitacao) VALUES (\''.$email.'\', '.$idUsuarioEnvia.', '.$idGrupo.', 2, 1)';
                $idSolicitacao = $classGeral->insert($sql);
                if($idSolicitacao)
                {
                    $this->alert('Solicitação criada com sucesso. Aguardando cadastro com este email');
                    return TRUE;
                }
                else
                {
                    $this->alert('Ocorreu um problema no seu pedido');
                    return FALSE;
                }
            }
        }
        else
        {
            $this->alert('Email Inválido');
            return FALSE;
        }
    }
    
    function getUsuarioByEmail($email)
    {
        $classGeral = new classGeral();
        $user = $classGeral->select('SELECT * FROM Usuario WHERE email like \''.$email.'\'');
        
        if($user)
        {
            return $user;
        }
        
        return NULL;
    }
            
    function getTodosUsuarios()
    {
        $classGeral = new classGeral();
        $jsonResult = $classGeral->select('Select * From Usuario');
        return $jsonResult;
    }
    
    function getUsuarioPorIdentificador($identificador)
    {
        $classGeral = new classGeral();
        $jsonResult = $classGeral->select('SELECT * FROM Usuario WHERE identificador LIKE \''.$identificador.'\'');
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return FALSE;
        }
    }
    
    function getGrupos()
    {
        $classGeral = new classGeral();
        $jsonResult = $classGeral->select('SELECT * FROM Grupo where idGrupo != 1');
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return FALSE;
        }
    }
    
    function getGruposDoUsuario($idUsuario)
    {
        $classGeral = new classGeral();
        $jsonResult = $classGeral->select('SELECT g.* FROM Grupo g INNER JOIN UsuarioGrupo ug ON g.idGrupo = ug.idGrupo WHERE g.idGrupo != 1 AND ug.idUsuario = '.$idUsuario);
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return FALSE;
        }
    }
    
    function getUsuariosPorGrupo($idGrupo)
    {
        $classGeral = new classGeral();
        $jsonResult = $classGeral->select('SELECT u.* FROM Usuario u INNER JOIN UsuarioGrupo ug ON u.idUsuario = ug.idUsuario WHERE ug.idGrupo = '.$idGrupo.' AND u.ativo = 1 AND ug.ativo = 1');
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return FALSE;
        }
    }
    
    function loadPagina($pageName = '')
    {
        $this->ValidaSession($_SESSION['user']['identificador']);
        if($pageName){
            echo '
                <script>
                    window.location="'.$pageName.'"
                </script>
            ';
        }else
        {
            echo '
                <script>
                    window.location="../Index.php"
                </script>
            ';
        }
    }
    
    function loadDiv($pageName,$div)
    {
        $this->ValidaSession($_SESSION['user']['identificador']);
        echo '
            <script>
                $(\'#'.$div.'\').load(\''.$pageName.'\');
            </script>
        ';
    }
            
    function alert($msg = '')
    {
        echo '
            <script>
                alert("'.$msg.'");
            </script>
        ';
    }
    
    function show($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    function verifyField($field)
    {
        if(!$field || $field == "" || $field == '' || $field == null || $field == NULL || (strlen($field) == 0))
        {
            return false;
        }
        return true;
    }
    
    function verifyPostGetSession($postGetSession)
    {
        if(!isset($postGetSession))
        {
            return false;
        }
        else if(!$postGetSession || $postGetSession == "" || $postGetSession == '' || $postGetSession == null || $postGetSession == NULL)
        {
            return false;
        }
        return true;
    }
    
    function ValidaSession($identificador)
    {
        date_default_timezone_set("Brazil/East");
        $tempolimite = 60000;
        $_SESSION['limite'] = $tempolimite;
        
        if(!isset($_SESSION['\''.$identificador.'\'']))
        {
            return false;
        }
        else
        {
            $registro = $_SESSION['\''.$identificador.'\''];
            $limite = $_SESSION['limite'];

            if($registro)
            {
                $segundos = time()- $registro;
            }

            if($segundos>$limite)
            {
                session_destroy();
                $this->alert('Sua sessão expirou. Faça login novamente!');
                return false;
            }
            else
            {
                $_SESSION['\''.$identificador.'\''] = time();
                return true;
            }
        }
    }
    
    function validateBrowser($var)
    {
        $ua = $var;
        // Chrome
        $chrome            = strpos($ua, 'Chrome') ? true : false;        // Google Chrome

        // Firefox
        $firefox        = strpos($ua, 'Firefox') ? true : false;    // All Firefox
        $firefox_2        = strpos($ua, 'Firefox/2.0') ? true : false;    // Firefox 2
        $firefox_3        = strpos($ua, 'Firefox/3.0') ? true : false;    // Firefox 3
        $firefox_3_6        = strpos($ua, 'Firefox/3.6') ? true : false;    // Firefox 3.6

        // Internet Exlporer
        $msie            = strpos($ua, 'MSIE') ? true : false;        // All Internet Explorer
        $msie_7            = strpos($ua, 'MSIE 7.0') ? true : false;    // Internet Explorer 7
        $msie_8            = strpos($ua, 'MSIE 8.0') ? true : false;    // Internet Explorer 8

        // Opera
        $opera            = preg_match("/\bOpera\b/i", $ua);                    // All Opera


        // Safari
        $safari            = strpos($ua, 'Safari') ? true : false;        // All Safari
        $safari_2        = strpos($ua, 'Safari/419') ? true : false;    // Safari 2
        $safari_3        = strpos($ua, 'Safari/525') ? true : false;    // Safari 3
        $safari_3_1        = strpos($ua, 'Safari/528') ? true : false;    // Safari 3.1
        $safari_4        = strpos($ua, 'Safari/531') ? true : false;    // Safari 4
        
        if($safari)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>