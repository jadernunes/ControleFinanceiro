
function loadPagina(pagina)
{
    window.location = pagina;
}

function loadDiv(pagina,idDiv)
{
    $('#'+idDiv+'').load(''+pagina+'');
}

function getfocus(campo)
{
    document.getElementById('\''+campo+'\'').focus();
}

function isVisible(campo)
{
    $('#'+campo+'').bind('isVisible', isVisible);
    
  return true;
}

function setValor(campo,valor){
    document.getElementById(''+campo+'').setAttribute('value',''+valor+'');
}

function setVisible(campo,status){
    if(status == true){
        $('#'+campo+'').show();
    }
    else if(status == false){
        $('#'+campo+'').hide();
    }
}

function AddUsuarioNoGrupo(idGrupo,idUsuarioEnvia)
{
    
    var m = prompt('Digite o email do Usuario');

    if(m != null)
    {
        loadDiv('ColocaPost.php?action=addUsuarioNoGrupo&email='+m+'&idGrupo='+idGrupo+'&idUsuarioEnvia='+idUsuarioEnvia,'carregaCadastro');
    }
}

function ConfirmaVinculo(idSolicitacao)
{
    loadDiv('ColocaPost.php?action=ConfirmaVinculo&idSolicitacao='+idSolicitacao,'carregaCadastro');
}

function CancelaSolicitacaoVinculo(idSolicitacao)
{
    loadDiv('ColocaPost.php?action=CancelaSolicitacaoVinculo&idSolicitacao='+idSolicitacao,'carregaCadastro');
}

function CancelaSolicitacaoVinculoRealizadas(idSolicitacao)
{
    loadDiv('ColocaPost.php?action=CancelaSolicitacaoVinculoRealizadas&idSolicitacao='+idSolicitacao,'carregaCadastro');
}


