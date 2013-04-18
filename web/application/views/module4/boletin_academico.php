<div>
    <fieldset class="formulario">
        <legend>BOLETIN ESTUDIANTE</legend>
        <table class="tabalasedes">
            <tr>
                <td>BUSCAR (CC,Apellido,Nombre)</td><td><input type="text" id="txtbus"> 
                    <input type="hidden" value="" id="idaccount">
                    <input type="hidden" value="" id="nombre">
                </td>
                 <td>AÑO LECTIVO</td><td><input type="text" value="<?php echo date("Y");?>" id="ano"></td>
                 <td>PERIODO ACADEMICO</td><td>
                    <select id="periodo">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td><input type="button" value="BUSCAR" class="boton2" id="bus"></td>
            </tr>
        </table>
        <div id="resultados">
            
        </div>
        <div id="error">
            
        </div>
       
    </fieldset>
</div>
<script type="text/javascript">
  
    $("#bus").click(function(){
        var txt = $("#txtbus").attr("value");
        getHtml("resultados", "complemento/buscarTerceroAny/"+txt);
    });
    $(".listabus").live("click",function(){
            var IDAcoount = $(this).attr("id"); 
            $("#idaccount").attr("value",IDAcoount);
            $("#nombre").attr("value",$(this).html());
            var ano = $("#ano").attr("value");
            var per = $("#periodo").attr("value");
            getHtml("resultados", "module1/doNotesReportByAccount/"+ano+"/"+per+"/"+IDAcoount);

        });
        
</script>