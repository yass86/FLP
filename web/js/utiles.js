var arti="";
var arti2="";
var codigod="";
 var programa ="";
 var idest="";
 var idacc="";
 var idgro="";

function getHtmlHorario(divr,url,divform)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+divform).serialize(),
           success:function(msg){
           var tex = msg.split("_");    
           
           $('#'+divr).html(msg);  
           }
       })
       return false;
}
function getHoraryCell(IDGroup)
{
    var fil=0;
    var col=0;
    while(fil<8)
        {
            col=0;
            while(col<7)
                {
                    getHtml("dia_"+fil+"_"+col, "module1/getHoraryByCell/"+fil+"/"+col+"/"+IDGroup);
                    col++;
                }
                fil++;
        }
}
function getHtml(div,url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
           $('#'+div).html(msg);  
           }
       })
       return false;
}
function cambiarEstadoAsistencia(div,url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
           $('#'+div).attr("dir", msg);  
           }
       })
       return false;
}
function borrarRecorValue(div,url,ano,mat,grup,achi)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
           $('#'+div).html(msg);  
             getHtml("cuerpotabla", "module1/getRecordValueByGroup/"+ano+"/"+mat+"/"+achi+"/"+grup);
           }
       })
       return false;
}
function getHtmlInput(div,url,id)
{
    var ret=0;
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
                ret = msg;
           if(msg!="-1"){
               var arr = msg.split("_");
            $('#'+div).attr("value",arr[0]);  
            $('#'+id).attr("value",arr[1]);  
           
           }
        else
            {               
                w = 200 ; 
                h = 200 ; 
                $("#pop").css("left",w + "px"); 
                $("#pop").css("top",h + "px");

            //  $("#pop").append(getHtml("pop", "inicio/ir/getFormTercero"));
                $("#pop").fadeIn('slow');
            }
           
           }
       })
       return false;
}
function insertAccount(id,url,campo,campo2)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+id).serialize(),
           success:function(msg){
           alert("REGISTRO EXITOSO "+msg); 
          
           getHtmlInput(campo, "complemento/buscarTerceroID/"+msg,campo2);
           }
       })
}
function getHtmlDatosMatricula(url,cc,ano,IDInst)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
         
           if(msg!="-1"){
               var arr = msg.split("_");    
           
                  /*
                getHtml("ppp", "inicio/getProgramaById/"+arr[0]);
                getHtml("idgrupo", "inicio/getGruposAcademicosid/"+arr[0]+"/"+arr[1]);  
                $('#Programa').attr("value", arr[0]);  
                $('#Nivel').attr("value", arr[1]);   */               
                $('#IDAccountParent').attr("value", arr[0]);  
                $('#IDAccountParent2').attr("value", arr[1]);
               
                getHtmlInput("acu1", "complemento/buscarTerceroID/"+arr[0],"IDAccountParent");
                getHtmlInput("acu2", "complemento/buscarTerceroID/"+arr[1],"IDAccountParent2");
                getHtmlNumeroMatricula("module1/getEnrollmentByNit/"+cc+"/"+IDInst+"/"+ano);
           }
           
           }
       })
}
function getHtmlNumeroMatricula(url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){          
            if(msg!="-1"){
                var arr = msg.split("_");    
                    $('#matricula').attr("value", arr[0]);  
                getHtml("ppp", "inicio/getProgramaById/"+arr[1]);
                getHtml("idgrupo", "inicio/getGruposAcademicosid/"+arr[1]+"/"+arr[2]);  
                $('#Programa').attr("value", arr[1]);  
                $('#Nivel').attr("value", arr[2]); 
            }           
           }
       })
}
function insertMatricula(url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){          
            if(msg!="-1"){               
                    $('#matricula').attr("value", msg);                 
            }           
           }
       })
}
function getVariableComparacion(div,url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: "",
           success:function(msg){
           $('#'+div).attr("value", msg);  
           }
       })
}
function getHtmlFormulario(div,url)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#form").serialize(),
           success:function(msg){
           $('#'+div).attr("value", msg);  
           }
       })
}
function getHtmlFormularioID(div,url,idform)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+idform).serialize(),
           success:function(msg){
           $('#'+div).attr("value", msg);  
           }
       })
}
function crearLineaSede(v1,v2,v3,v4,v5,v6,v7)
{
    var url = "module1/insertEstablishment/";
    var id = 0;
    var ins=false;
    var linea="";
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#form").serialize(),
           success:function(msg){
             linea ="<tr class='fila' id='"+msg+"'> <td>"+msg+"</td><td>"+v1+"</td><td>"+v2+"</td><td>"+v3+"</td>"+
            "<td>"+v4+"</td><td>"+v5+"</td><td>"+v6+"</td><td>"+v7+"</td></tr>";
               $("#cutabla").append(linea);
               
           }
       })
       
}
function crearLineaJornada()
{
    var url = "module1/insertSchedule/";

    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#form").serialize(),
           success:function(msg){
            
               
           }
       })
       
}
function crearLineaNivel()
{
    var url = "module1/insertLevel/";

    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#form").serialize(),
           success:function(msg){
            
                getHtml("contenido", "inicio/ir/niveles");
           }
       })       
}
function crearLineaArea()
{
    var url = "module1/insertAcademicArea/";

    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#form").serialize(),
           success:function(msg){
            
                getHtml("contenido", "inicio/ir/areas");
           }
       })       
}
function crearLineaGenerica(url,idForm,urlRecarga)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+idForm).serialize(),
           success:function(msg){
            
                getHtml("contenido", urlRecarga);
           }
       })       
}
function crearLineaRetorno(url,idForm,urlRecarga,divRecarga)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+idForm).serialize(),
           success:function(msg){
            
                getHtml(divRecarga, urlRecarga);
           }
       })       
}
function crearLineaRetornoStudent(url,idForm)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+idForm).serialize(),
           success:function(msg){
              $("#IDAccountc").attr("value", msg);
               $(".acu").show();
               
           }
       })       
}
function crearLineaRetornoAcudiente(url,idForm)
{
    $.ajax({
           url:urlbase+url,
           type: "post",
           data: $("#"+idForm).serialize(),
           success:function(msg){
              $("#IDtutorc").attr("value", msg);
              $(".gro").show();
           }
       })       
}


function dar_formato(num){  
  
var cadena = "";var aux;  
  
var cont = 1,m,k;  
  
if(num<0) aux=1; else aux=0;  
  
num=num.toString();  
  
  
  
for(m=num.length-1; m>=0; m--){  
  
 cadena = num.charAt(m) + cadena;  
  
 if(cont%3 == 0 && m >aux)  cadena = "." + cadena; else cadena = cadena;  
  
 if(cont== 3) cont = 1; else cont++;  
  
}  
  
cadena = cadena.replace(/.,/,",");  
  
return cadena;  
  
}  
  