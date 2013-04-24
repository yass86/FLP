urlbase = "";
function getHtml(div, url)
{
    $.ajax({
        url: urlbase + url,
        type: $("#"+div).attr('method'),
        data: $("#"+div).serialize(),
        success: function(msg) {
            $('#' + div).html(msg);
        }
    });
}
function validarExisteMail(url,div)
{
    $.ajax({
        url: urlbase + url,
        type: $("#"+div).attr('method'),
        data:$("#"+div).serialize(),
        success: function(msg){            
            
            if(msg!="-1"){
                alert("ESTA CUENTA DE CORREO YA SE ENCUENTRA ACTIVA");
                $("#mail").attr('value',"");
            }
            
           // alert(msg);            
          //  $("#reto").html(msg);
        }
    });
}
function getHtmlarticulo(div, url)
{
    $.ajax({
        url: urlbase + url,
        type: "post",
        data: $("#formulario").serialize(),
        success: function(msg) {
            $('#' + div).attr("value", msg);
        }
    });
}


function VistaPrevia(div, url)
{
    $.ajax({
        url: urlbase + url,
        type: "post",
        data: "",
        success: function(msg) {
            //$('#'+div).hide();
            $('#' + div).html(msg);
        }
    })
    return false;
}
function dar_formato(num) {

    var cadena = "";
    var aux;
    var cont = 1, m, k;
    if (num < 0)
        aux = 1;
    else
        aux = 0;
    num = num.toString();
    for (m = num.length - 1; m >= 0; m--) {
        cadena = num.charAt(m) + cadena;

        if (cont % 3 == 0 && m > aux)
            cadena = "." + cadena;
        else
            cadena = cadena;

        if (cont == 3)
            cont = 1;
        else
            cont++;
    }
    cadena = cadena.replace(/.,/, ",");
    return cadena;
}
  