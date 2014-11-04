
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