<div id="evaluaciones">
    <fieldset class="formulario">
        <legend>REGISTRO LOGROS ACADEMICOS</legend>
        <table class="tabalasedes">
            <tr>
                <td>DOCENTE</td><td><?php echo $profesores;?></td>
                 <td>PROGRAMA</td><td><?php echo $programas;?></td>
                 <td>GRUPO</td><td id="idgrupo"></td>
            </tr>
            <tr>
                <td>ASIGNATURA</td><td id="materias"></td>
                <td>AÑO LECTIVO</td><td><input type="text" id="ano" value="<?php echo date("Y");?>"></td>
                   <td>PERIODO</td>
                <td>
                    <select name="periodo" id="periodo">
                        <option value="0">SELECCIONE</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>   
                </td>
            </tr>
           <tr>
                <td>LOGROS</td>
                <td id="subasig"></td>
                
            </tr>
            <tr>
                <td><input type="button" value="EVALUAR" class="boton" id="generar"></td>
            </tr>
           
        </table>
        <div id="parciales">
            <table class="tabalasedes">
                <thead>
                    <tr>
                        <td></td>
                        <td class="idcampo">ID</td>
                        <td class="notacampo">NOTA PARCIAL</td>
                    </tr>
                </thead>
                <tbody id="cuerpotabla">
                    
                </tbody>
                <tfoot>
                    
                    <tr>
                        <td>
                            <form id="formparcial" action="<?php echo site_url('module1/insertRecordValue')?>" method="post">                                                           
                            <input type="hidden" name="IDMatter" id="materia">
                            <input type="hidden" name="IDAchievement" id="suba2" value="">
                            <input type="hidden" name="IDGroup" id="grupo" value="">
                            <input type="hidden" name="Year" id="Year" value="">
                            <input type="hidden" name="Period" id="Period" value="">
                            <input type="hidden" name="Description" id="des" value="">
                            <input type="hidden" name="sub" id="sub" value="0">
                            <input type="hidden" name="nota" id="nota" value="0">
                            
                            </form>
                        </td>
                        <td><input type="text" readonly=""></td>
                        <td class="colmunancha"><input type="text" id="desc" name="descripcion"></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="button" value="CREAR" class="boton" id="cparcial"></td>
                    </tr>
                   
                </tfoot>
            </table>
        </div>
        <div id="lista">
            
        </div>
        <div id="error">
            
        </div>
    </fieldset>
</div>
<script type="text/javascript">
    $("#parciales").hide();
   
    $("#cparcial").click(function(){
        var mat = $("#IDMatter").attr("value");
        var grup = $("#idgroupa").attr("value");
        var ano = $("#ano").attr("value");
        var per = $("#periodo").attr("value");
        var des = $("#desc").attr("value");
        var suba = $("#subasignatura").attr("value");
         $("#suba2").attr("value",suba);
        $("#materia").attr("value",mat); 
        $("#grupo").attr("value",grup); 
        $("#Year").attr("value",ano); 
        $("#Period").attr("value",per); 
        $("#des").attr("value",des);
        var sub2 = $("#subasignatura").attr("value");
        getHtmlFormularioID("error", "module1/insertRecordValue","formparcial");
        getHtml("cuerpotabla", "module1/getRecordValueByGroup/"+ano+"/"+mat+"/"+sub2+"/"+grup);
    });
    $("#periodo").change(function(){
         var mat = $("#IDMatter").attr("value");
        var grup = $("#idgroupa").attr("value");
        var ano = $("#ano").attr("value");
        var per = $("#periodo").attr("value");
        var des = $("#desc").attr("value");
        $("#materia").attr("value",$("#IDMatter").attr("value")); 
        $("#grupo").attr("value",$("#idgroupa").attr("value")); 
        $("#Year").attr("value",$("#ano").attr("value")); 
        $("#Period").attr("value",$("#periodo").attr("value")); 
        // 
    });
$("#IDProgram").change(function(){
        var pro = $(this).attr("value");
        $("#IDProgramc").attr("value",pro);
        getHtml("idgrupo", "inicio/getGruposAcademicos/"+pro);
    });
$("#IDMatter").live("change",function(){
         var mat = $("#IDMatter").attr("value");         
         $("#cuerpotabla").html("");
         $("#lista").html("");
         $("#parciales").fadeOut("slow");
         getHtml("subasig", "module1/getObjectiveCatalogByIDMatter/"+mat);
      //   getVariableComparacion("sub","module1/getMatterByID/"+mat);
    });
$("#subasignatura").live("change",function(){  
     var suba = $("#subasignatura").attr("value");
         $("#suba2").attr("value",suba);
         $("#cuerpotabla").html("");
         $("#lista").html("");
         //$("#parciales").fadeOut("slow");      
    });
    $("#idgroupa").live("change",function(){        
         var grupo = $("#idgroupa").attr("value");
          getHtml("materias", "inicio/armarSelectoresMateria/"+grupo);         
    });
    $(".borrar").live("click",function(){
        var id = $(this).attr("lang"); 
         var mat = $("#IDMatter").attr("value");
        var grup = $("#idgroupa").attr("value");
        var ano = $("#ano").attr("value");
         var sub2 = $("#subasignatura").attr("value");
        borrarRecorValue("error", "module1/deleteRecordValue/"+id,ano,mat,grup,sub2);
      
    });
    $("#generar").click(function(){
        var grupo = $("#idgroupa").attr("value");       
        var mat = $("#IDMatter").attr("value");
        var grup = $("#idgroupa").attr("value");
        var ano = $("#ano").attr("value");
        var per = $("#periodo").attr("value");
         var sub2 = $("#subasignatura").attr("value");
        var des = $("#desc").attr("value");
        var sub = $("#sub").attr("value");
               
        var mensaje ="";
        if((sub!="1"|sub2!="0")&per!="0")
            {
                
                getHtml("lista", "module1/getObjectiveNoteCatalogByGroup/"+ano+"/"+per+"/"+sub2+"/"+grup);
               // getHtml("lista", "module1/getStudentNoteCatalogByGroup/"+ano+"/"+per+"/"+sub2+"/"+grup);
               // $("#parciales").fadeIn("slow");
            }
        else
            {
               if(per=="0")
                   mensaje+="DEBE SELECCINAR UN PERIODO\n"; 
               
                   alert(mensaje); 
            }
          
    });
    $(".casilla").live("change",function(){
         var nota = $("#nota").attr("value");
          if(nota!="0")
            {
                var ano = $("#ano").attr("value");
                var per = $("#periodo").attr("value");
                var IDrec = $("#nota").attr("value");
                var IDAcco =$(this).attr("id");
                var note =$(this).attr("value");
                getHtml("error", "module1/insertNote/"+IDrec+"/"+IDAcco+"/"+note+"/"+ano+"/"+per); 
            }
             else
                {
                    $(this).attr("value","");
                    alert("PARA CALIFICAR PRIMERO DEBE SELECCIONAR UNA NOTA PARCIAL");
                }
    });
    $(".casilla").live("click",function(){
        var nota = $("#nota").attr("value");
        if(nota!="0")
            {
               
            }
            else
                {
                    alert("PARA CALIFICAR PRIMERO DEBE SELECCIONAR UNA NOTA PARCIAL");
                }
    });
    $(".nparcial").live("click",function(){
        var id = $(this).attr("lang");       
        $(".bloquesel").attr("class", "normal");
        $("#f_"+id).attr("class", "bloquesel");
        $("#nota").attr("value",id);
         var grup = $("#idgroupa").attr("value");
         var ano = $("#ano").attr("value");
         var per = $("#periodo").attr("value");
         var sub2 = $("#nota").attr("value");
         getHtml("lista", "module1/getObjectiveNoteCatalogByGroup/"+ano+"/"+per+"/"+sub2+"/"+grup);
    });
    $(".nparcial").live("change",function(){
        var fielname=$(this).attr("id");
        var value=$(this).attr("lang");
        var fielvalue=$(this).attr("value");
        getHtml("error", "module1/updateObjectiveField/"+fielname+"/"+fielvalue+"/"+value);
    });
    $(".asistencia").live("change",function(){  
        var grupo = $("#idgroupa").attr("value");  
        var ano = $("#ano").attr("value");
        var ADAco = $(this).attr("lang");        
        var tipo = $(this).attr("value");
        var asistencia = $(this).attr("id");
         var per = $("#periodo").attr("value");
       var sub2 = $("#subasignatura").attr("value");

            if(tipo=="0"){
                 $("#c_"+ADAco).attr("class", "ausente");
                 getHtml("error", "module1/insertObjectiveNote/"+sub2+"/"+ADAco+"/"+asistencia+"/"+ano+"/"+per+"/"+grupo); 
                }
            else
                {
                    
                 $("#c_"+ADAco).attr("class", "noausente");
                getHtml("error", "module1/deleteObjectiveNote/"+asistencia);
                }                
    });
    
</script>