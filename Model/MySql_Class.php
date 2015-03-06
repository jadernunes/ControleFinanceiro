<?php
class MySql_Class {
       
	function connection(){
                
        $servidorLocal = "localhost";
        $usuarioLocal = "cf";
        $senhaLocal = "cfGreenb";
        
//Descomentar para conexões locais
        $servidor = $servidorLocal;
        $usuario = $usuarioLocal;
        $senha = $senhaLocal;
        
        $con=mysqli_connect($servidor,$usuario,$senha,"ControleFinanceiro");
        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            return $con;
        }
    }
    
    function select($query){
        $con = $this->connection();
        $result = mysqli_query($con,$query);
        $arrayObjects = array();
        
        $i = 0;
        while($arrayObject = mysqli_fetch_array($result)){
            $objetc = array();
            foreach($arrayObject as $colun => $r){
                if(!is_numeric($colun)){
                    $objetc[$colun] = $r;
                }
            }
            $arrayObjects[$i] = $objetc;
            $i++;
        }
        mysqli_close($con);
        return $arrayObjects;
    }
	
    function insert($query){
        $con = $this->connection();
        mysqli_query($con,$query);
        $id = mysqli_insert_id($con);
        mysqli_close($con);
        return $id;
    }
	   
    function CadastroNovoUsuario($nome,$email,$identificador)
    {
        //$classGeral = new classGeral();;
        $sqlUser = 'INSERT INTO Usuario (name,email,identificador,ativo) VALUES (\''.$nome.'\',\''.$email.'\',\''.$identificador.'\',1);';
        $idUsuario = $this->insert($sqlUser);
//        $this->alert($sql);
        
        if(count($idUsuario) > 0)
        {
            $sqlGrupoGeral = 'INSERT INTO UsuarioGrupo (idUsuario,idGrupo,ativo) VALUES ('.$idUsuario.',1, 1);';
            $idUsuarioGrupo = $this->insert($sqlGrupoGeral);
            
            if($idUsuarioGrupo)
            {
                $idSolicitacao = $this->AtualizaSolicitacoesParaNovoUsuario($email,$idUsuario);
                if($idSolicitacao)
                {
                    $sql = 'SELECT * FROM Usuario WHERE idUsuario = '.$idUsuario;
                    $user = $this->select($sql);
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
    
    function AlteraDadosUsuario($nome,$email,$identificador,$idUsuario)
    {
        $sqlUser = 'UPDATE Usuario SET name = \''.$nome.'\', email = \''.$email.'\', identificador = \''.$identificador.'\' WHERE idUsuario = '.$idUsuario;
        $idUsuario = $this->insert($sqlUser);
        
        if(count($idUsuario) > 0)
        {
            return $user;
        }
        return FALSE;
    }
            
    function GetGrupoById($idGrupo)
    {
        //$classGeral = new classGeral();
        $sql = 'SELECT * FROM Grupo WHERE idGrupo = '.$idGrupo;
        $grupo = $this->select($sql);
//        $this->alert($sql);
        
        if(count($grupo) > 0)
        {
            return $grupo;
        }
        
        return NULL;
    }
    
    function GetUsuarioById($idUsuario)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT * FROM Usuario WHERE idUsuario = '.$idUsuario;
        $user = $this->select($sql);
//        $this->alert($sql);
        
        if(count($user) > 0)
        {
            return $user;
        }
        
        return NULL;
    }
    
    function GetSolicitacoesDeUmSolicitado($idUsuario)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT s.*,e.descricao\'estado\',s.idEstadoSolicitacao FROM Solicitacao s INNER JOIN EstadoSolicitacao e on e.idEstadoSolicitacao = s.idEstadoSolicitacao WHERE s.idUsuarioRecebe = '.$idUsuario.' ORDER BY s.idEstadoSolicitacao DESC';
        $solicitacao = $this->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return $solicitacao;
        }
        
        return NULL;
    }
    
    function GetSolicitacoesDeUmSolicitante($idUsuario)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT s.*,e.descricao\'estado\',s.idEstadoSolicitacao FROM Solicitacao s INNER JOIN EstadoSolicitacao e on e.idEstadoSolicitacao = s.idEstadoSolicitacao WHERE s.idUsuarioEnvia = '.$idUsuario.' ORDER BY s.idEstadoSolicitacao = 2 DESC';
        $solicitacao = $this->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return $solicitacao;
        }
        
        return NULL;
    }
    
    function AtualizaSolicitacoesParaNovoUsuario($email,$idUsuario)
    {
        //$classGeral = new classGeral();;
        $sql = 'UPDATE Solicitacao SET idUsuarioRecebe = '. $idUsuario .' where email like \''.$email.'\'';
        $idSolicitacao = $this->insert($sql);
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
        //$classGeral = new classGeral();;
        $idGrupo = $this->insert('INSERT INTO Grupo(titulo,idUsuarioCriador,ativo) VALUES (\''. $titulo .'\','. $idusuarioCriador .',1)');
        
        if($idGrupo)
        {
            $idGrupo = $this->insert('INSERT INTO UsuarioGrupo(idUsuario,idGrupo,ativo) VALUES ('. $idusuarioCriador .', '. $idGrupo .', 1)') ? $idGrupo : NULL;
        }
        
        return $idGrupo;
    }
    
    function usuarioEstaNoGrupo($email,$grupo)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT u.* FROM Usuario u INNER JOIN UsuarioGrupo ug on u.idUsuario = ug.idUsuario WHERE ug.idGrupo = '.$grupo.' AND u.email like \''.$email.'\' AND ug.ativo = 1';
        $user = $this->select($sql);
//        $this->alert($sql);
        
        if(count($user) > 0)
        {
            return TRUE;
        }
        
        return false;
    }
    
    function temSolicitacaoVinculoParaGrupo($email,$grupo)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT s.* FROM Usuario u INNER JOIN Solicitacao s WHERE u.idUsuario = s.idUsuarioRecebe AND s.idGrupo = '.$grupo.' AND s.idTipoSolicitacao = 1 AND (s.email like \''.$email.'\' AND s.idEstadoSolicitacao = 2)';
        $solicitacao = $this->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            return true;
        }
        
        return false;
    }
    function CancelaSolicitacaoVinculo($idSolicitacao)
    {
        //$classGeral = new classGeral();;
        $idSolicitacao = $this->insert('UPDATE Solicitacao SET idEstadoSolicitacao = 3 where idSolicitacao = '.$idSolicitacao);
        
        if($idSolicitacao)
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    function CancelaSolicitacaoVinculoRealizadas($idSolicitacao)
    {
        //$classGeral = new classGeral();;
        $idSolicitacao = $this->insert('DELETE FROM Solicitacao where idSolicitacao = '.$idSolicitacao);
        
        if($idSolicitacao)
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    function ConfirmaVinculo($idSolicitacao)
    {
        //$classGeral = new classGeral();;
        $sql = 'SELECT * FROM Solicitacao WHERE idSolicitacao = '.$idSolicitacao;
        $solicitacao = $this->select($sql);
//        $this->alert($sql);
        
        if(count($solicitacao) > 0)
        {
            $usuarioGrupo = $this->insert('INSERT INTO UsuarioGrupo (idUsuario,idGrupo,ativo) VALUES ('.$solicitacao[0]['idUsuarioRecebe'].','.$solicitacao[0]['idGrupo'].', 1)');
            
            if(count($usuarioGrupo) > 0)
            {
                $idSolicitacao = $this->insert('UPDATE Solicitacao SET idEstadoSolicitacao = 1 where idSolicitacao = '.$idSolicitacao);
        
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
        //$classGeral = new classGeral();;
        
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
                        $idSolicitacao = $this->insert($sql);
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
                $idSolicitacao = $this->insert($sql);
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
        //$classGeral = new classGeral();;
        $user = $this->select('SELECT * FROM Usuario WHERE email like \''.$email.'\'');
        
        if($user)
        {
            return $user;
        }
        
        return NULL;
    }
            
    function getTodosUsuarios()
    {
        //$classGeral = new classGeral();;
        $jsonResult = $this->select('Select * From Usuario');
        return $jsonResult;
    }
    
    function getUsuarioPorIdentificador($identificador)
    {
        //$classGeral = new classGeral();;
        $jsonResult = $this->select('SELECT * FROM Usuario WHERE identificador LIKE \''.$identificador.'\'');
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
         $jsonResult = $this->select('SELECT * FROM Grupo where idGrupo != 1');
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
        //$classGeral = new classGeral();;
        $jsonResult = $this->select('SELECT g.* FROM Grupo g INNER JOIN UsuarioGrupo ug ON g.idGrupo = ug.idGrupo WHERE g.idGrupo != 1 AND ug.idUsuario = '.$idUsuario.' ORDER BY titulo ASC');
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
        //$classGeral = new classGeral();;
        $jsonResult = $this->select('SELECT u.* FROM Usuario u INNER JOIN UsuarioGrupo ug ON u.idUsuario = ug.idUsuario WHERE ug.idGrupo = '.$idGrupo.' AND u.ativo = 1 AND ug.ativo = 1  ORDER BY u.name ASC');
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
    
    function addTicket($ticket)
    {
        
        $valorTicket = $this->moedaSendDB($ticket['valorTicket']);
        $valorPago = $this->moedaSendDB($ticket['valorPago']);
        
        $sql = 'INSERT INTO Ticket (titulo, descricao, idGrupo, idUsuarioAutor, valorTicket, valorPago, status, ativo) VALUES (\''.$ticket['titulo'].'\',\''.$ticket['descricao'].'\','.$ticket['idGrupo'].', '.$ticket['idUsuarioAutor'].', '.$valorTicket.', '.$valorPago.', '.$ticket['status'].', '.$ticket['ativo'].');';
        $idTicket = $this->insert($sql);
        
        if($idTicket)
        {
            $valorDevido =  floatval($ticket['valorTicket'])/count($ticket['usuarios']);
            $valorDevido = $this->moedaSendDB($valorDevido);
            $sucess = true;
            for($i = 0;$i < count($ticket['usuarios']);$i++)
            {
                $sql = 'INSERT INTO UsuarioTicket(idUsuario,idTicket,ativo,valorDevido) VALUES ('.$ticket['usuarios'][$i].','.$idTicket.',1,'.$valorDevido.');';
                $idUsuarioTicket = $this->insert($sql);
                if($idUsuarioTicket <= 0)
                {
                    $sucess = false;
                }
                else
                {
                    if($ticket['idUsuarioAutor'] == $ticket['usuarios'][$i])
                    {
                        $sql = 'INSERT INTO Registro (idUsuario,idTicket,valorPago,statusRegistro,ativo) VALUES ('.$ticket['usuarios'][$i].','.$idTicket.',Round('.$valorDevido.',2),1,1)';
                        $idUsuarioTicket = $this->insert($sql);
                    }
                    $sucess = true;
                }
            }
            
            if(!$sucess)
            {
                for($i = 0;$i < count($ticket['usuarios']);$i++)
                {
                    $idDeleteUsuarioTicket = $this->insert('Detele From UsuarioTicket where idTicket = '.$idTicket.' and idUsuario = '.$ticket['usuarios'][$i]);
                }
                
                $this->insert('Detele From Ticket where idTicket = '.$idTicket);
            }
        }
        return $sucess;
    }
    
    function getTicket($idTicket)
    {
        $jsonResult = $this->select('SELECT * From Ticket WHERE idTicket = '.$idTicket);
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
    
    function getTicketFromGrupoAndUser($idGrupo,$idUser)
    {
        $sql = 'SELECT * From Ticket WHERE idGrupo = '.$idGrupo.' AND idUsuarioAutor = '.$idUser;
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
    
    
    function getTicketFromUsuarioDevedorByBrupo($idUser,$idGrupo)
    {
        $sql = 'SELECT * From Ticket t INNER JOIN UsuarioTicket ut on t.idTicket = ut.idTicket WHERE t.idGrupo = '.$idGrupo.' AND ut.idUsuario = '.$idUser;
        
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
    
    function getUsuariosByTicket($idTicket)
    {
        $sql = 'SELECT u.*,ut.* From Usuario u INNER JOIN UsuarioTicket ut on u.idUsuario = ut.idUsuario WHERE ut.idTicket = '.$idTicket;
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
    
    function getTotalPagoPorTicket($idTicket)
    {
        $sql = 'SELECT SUM(valorPago) valorPago From Registro WHERE idTicket = '.$idTicket;
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
            
    function getValorPagoUsuarioTicket($idUsuario,$idTicket)
    {
        $sql = 'SELECT Round(SUM(valorPago),2) valorPago From Registro WHERE idUsuario = '.$idUsuario.' AND idTicket = '.$idTicket;
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            return $jsonResult;
        }
        else 
        {
            return null;
        }
    }
    
    function getSaldoByTicketAndUsuario($idUsuario,$idTicket)
    {
        $sql = 'SELECT count(ut.idUsuario) quantidadeDevedores,t.valorTicket From Ticket t INNER JOIN UsuarioTicket ut ON t.idTicket = ut.idTicket WHERE ut.idTicket = '.$idTicket;
        $jsonResult = $this->select($sql);
        
        if($jsonResult)
        {
            $quantidadeDevedores = $jsonResult[0]['quantidadeDevedores'];
            $valorTicket = $jsonResult[0]['valorTicket'];
            
            $saldo = $valorTicket/$quantidadeDevedores;
            return $saldo;
        }
        else 
        {
            return null;
        }
    }
            
    function PagarTicket($idUsuario,$idTicket,$valor)
    {
        $TotalPago = $this->getValorPagoUsuarioTicket($idUsuario,$idTicket);
        $valorDividido = $this->getSaldoByTicketAndUsuario($idUsuario, $idTicket);
        
        $novoValor = ($valorDividido - $TotalPago[0]['valorPago']);
        if($valor <= $novoValor)
        {
            $sql = 'INSERT INTO Registro (idUsuario,idTicket,valorPago,statusRegistro,ativo) VALUES ('.$idUsuario.','.$idTicket.','.$valor.',1,1)';
            $idRegistro = $this->insert($sql);
            if($idRegistro)
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
    
    function moedaGetDB($valor)
    {
        return money_format('%.2i',$valor);
    }
    
    function moedaSendDB($valor)
    {
        return money_format('%.2i',$valor);
    }
}

?>