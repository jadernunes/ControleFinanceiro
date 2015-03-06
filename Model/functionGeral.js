
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

function selectAllCheckbox(checkboxFather,classCheckboxChildren)
{
    
    if(checkboxFather.checked)
    {
        $('.'+classCheckboxChildren).each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"               
        });
    }
    else
    {
        $('.'+classCheckboxChildren).each(function() { //loop through each checkbox
            this.checked = false;  //select all checkboxes with class "checkbox1"               
        });
    }
}

function setEnable(campo)
{
    $('#'+campo+'').removeAttr('disabled');
}

function setDisable(campo)
{
    $('#'+campo+'').attr('disabled','disabled');
}

function unSelectedCheckbox(idCheckboxFather,checkboxChildren)
{
    var todosMarcados = true;
    
    if(checkboxChildren.checked)
    {
        $('.'+checkboxChildren.className).each(function() { 
            if(!this.checked)
                todosMarcados = false;
        });
        
        if(todosMarcados)
        {
            $('#'+idCheckboxFather).each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }
    }
    else
    {
        $('#'+idCheckboxFather).each(function() { //loop through each checkbox
            this.checked = false;  //select all checkboxes with class "checkbox1"               
        });
    }
}

function RegistrarPagamento(idUsuario)
{
    var idTicket = $('#idTicketChecked').val();
    var m = prompt('Digite o valor desejado');
    
    if($.isNumeric(m))
    {
        m = parseFloat(m);
        loadDiv('ColocaPost.php?action=pagarTicket&idTicket='+idTicket+'&valorPago='+m+'&idUsuario='+idUsuario+'','divRegistraPagamento');
    }
    else
    {
        if(m != "")
        {
            alert('Valor inválido. Deve conter apenas números com "." Ex.: 12.45');
        }
    }
}
