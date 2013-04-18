<div id="evaluaciones">
    <fieldset class="formulario">
        <legend>REGISTRO DE ASISTENCIA</legend>
        <table class="tabalasedes">
            <tr>
                <td>DOCENTE</td><td><?php echo $profesores;?></td>                
                 <td>PROGRAMA</td><td><?php echo $programas;?></td>
                 <td>GRUPO</td><td id="idgrupo"></td>
            </tr>
            <tr>
                 <td>ASIGNATURA</td><td id="materias"></td>
                 <td>FECHA</td><td><input type="text" class="date" readonly="" value="<?php echo date("Y-m-d")?>"></td>
                 <td colspan="2"><input type="button" value="LISTAR" class="boton" id="listaAlu"></td>
            </tr>           
        </table>
        <div id="parciales">
            
        </div>
        <div id="lista">
            
        </div>
        <div id="error">
            
        </div>
    </fieldset>
</div>
<script type="text/javascript">
    $('.date').datePicker(
		{
			startDate: '2011/01/01',
			endDate: (new Date()).asString(),
                        clickInput:true
		});
                $('.date').keypress(function(){
                    $(".date").attr('value',"");
                });
    $("#parciales").hide();
   
   $("#IDMatter").live("change",function(){
        try
            {
                $("#lista").html(""); 
            //Run some code here
            }
            catch(err)
            {
            //Handle errors here
            }
      
   });
   
$("#IDProgram").change(function(){
        var pro = $(this).attr("value");
        $("#IDProgramc").attr("value",pro);
        getHtml("idgrupo", "inicio/getGruposAcademicos/"+pro);
    });


    $("#idgroupa").live("change",function(){        
         var grupo = $("#idgroupa").attr("value");
          getHtml("materias", "inicio/armarSelectoresMateria/"+grupo);         
    });
    $("#listaAlu").click(function(){
        var IDGroup = $("#idgroupa").attr("value");
        var fecha = $(".date").attr("value");
        var materia = $("#IDMatter").attr("value");
        getHtml("lista", "module1/getStudentAssistanceCatalogByGroup/"+fecha+"/"+materia+"/"+IDGroup);
        $("#lista").show(); 
    });
    $(".asistencia").live("change",function(){
        var IDGroup = $("#idgroupa").attr("value");
        var fecha = $(".date").attr("value");
        var materia = $("#IDMatter").attr("value");
        var ADAco = $(this).attr("lang");
        var descripcion = $("#des_"+ADAco).attr("value");
        var tipo = $(this).attr("value");
        var asistencia = $(this).attr("id");
       
      
         var   descripcion="NADA";
            if(tipo=="0"){
                 $("#c_"+ADAco).attr("class", "ausente");
                 getHtml("error", "module1/insertAssistance/"+materia+"/"+IDGroup+"/"+ADAco+"/"+descripcion+"/"+fecha); 
                }
            else
                {
                    
                 $("#c_"+ADAco).attr("class", "noausente");
                getHtml("error", "module1/deleteAssistance/"+asistencia);
                }
                
    });
   $(".obsasistencia").live("change",function(){
       var obs = $(this).attr("value");
       var idAsi = $(this).attr("dir");
       getHtml("error", "module1/updateAssistanceField/Description/"+obs+"/"+idAsi);
   });
    
   
    
    
</script>