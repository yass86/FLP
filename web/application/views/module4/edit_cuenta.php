<div>
    <fieldset>
        <legend>EDICION Y ACTUALIZACION DE CUENTA</legend>
        <table class="tabalasedes">
            <tr>
                <td>BUSCAR (CC,Apellido,Nombre)</td><td><input type="text" id="txtbus"></td>
                <td><input type="button" value="BUSCAR" class="boton" id="bus"></td>
            </tr>
        </table>
        <div id="resultados">
            
        </div>
        <div id="pop" class="content-popup"> 
       
 
</div>
    </fieldset>
</div>
<script type="text/javascript">
    $("#pop").hide();
    $("#bus").click(function(){
        var txt = $("#txtbus").attr("value");
        getHtml("resultados", "complemento/buscarTerceroAny/"+txt);
    });
    $(".listabus").live("click",function(){
        var IDAcoount = $(this).attr("id"); 
        getHtml("pop", "inicio/ir/crear_estudiante/"+IDAcoount);
                w = 200 ; 
                h = 200 ; 
                $("#pop").css("left",w + "px"); 
                $("#pop").css("top",h + "px");

            //  $("#pop").append(getHtml("pop", "inicio/ir/getFormTercero"));
                $("#pop").fadeIn('slow');
    });
    $('#cerrar').live("click",function(){
        $('#pop').fadeOut('slow');
    });
    $("#gest").live("click",function(){
        if(confirm("Crear ?")){
            $("#pop").hide();
            getHtmlFormularioID("error","module1/insertAccount","newestudiante");
           // insertAccount("newestudiante", "module1/insertAccount",campo,campo2);            
        }
    });
</script>