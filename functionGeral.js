
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