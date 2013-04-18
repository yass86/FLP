<div id="evaluaciones">
    <fieldset class="formulario">
        <legend>CALCULO DE NOTAS DEFINITIVAS</legend>
        <table class="tabalasedes">
            <tr>
                <td>DOCENTE</td><td><?php echo $profesores;?></td>                
                 <td>PROGRAMA</td><td><?php echo $programas;?></td>
                 <td>GRUPO</td><td id="idgrupo"></td>
            </tr>
            <tr>
                <td>AÑO</td>
                <td>
                    <select name="ano" id="ano">
                    <?php 
                    $cont=0;
                    $ano = date("Y");
                    while($cont<3)
                    {
                        ?>
                    <option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                    <?php
                        $cont++;
                        $ano++;
                    }
                    ?>
                </select>
                </td>
                <td>PERIODO</td><td>
                    <select id="periodo">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                 <td>ASIGNATURA</td><td id="materias"></td>
            </tr>
            <tr>
                
                 <td><input type="button" value="CALCULAR" class="boton" id="defAlu"></td>
            </tr>           
        </table>
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
    $("#defAlu").click(function(){
        var IDGroup = $("#idgroupa").attr("value");
        var fecha = $(".date").attr("value");
        var materia = $("#IDMatter").attr("value");
        var ano = $("#ano").attr("value");
        var periodo = $("#periodo").attr("value");
        getHtml("lista", "module1/calculateDefByGroup/"+ano+"/"+periodo+"/"+materia+"/"+IDGroup);
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