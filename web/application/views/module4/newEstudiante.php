<fieldset class="formulario">
    <legend>MATRICULA ESTUDIANTE</legend>
    <table class="tabalasedes">  
        <tr>
            <td>Año a inscribir</td>
            <td colspan="2">
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
        </tr>
        <tr>
            <td>Identificacion Estudiante</td><td><input type="text" id="est"/></td><td><input type="button" id="cest" value="CREAR" class="boton"/></td>
        </tr>
        <tr>
            <td>Matricula</td><td colspan="2"><input type="text" id="matricula" value="" readonly=""/></td>
        </tr>
        <tr>
            <td>Programa</td>
            <td colspan="2" id="ppp"><?php echo $programas?></td>
        </tr>
        <tr>
            <td>Grupo</td>
            <td colspan="2" id="idgrupo"></td>
        </tr>        
        <tr>
            <td>Identificacion Acudiente Padre</td><td><input type="text" id="acu1"/></td><td><input type="button" id="cacu1" value="CREAR" class="boton"/></td>
        </tr>
        <tr>
            <td>Identificacion Acudiente Madre</td><td><input type="text" id="acu2"/></td><td><input type="button" id="cacu2" value="CREAR" class="boton"/></td>
        </tr>
        <tr>
            <td><input type="button" value="LIMPIAR" id="lim" class="boton"></td>
            <td><input type="button" value="INSCRIBIR" id="ins" class="boton"></td>
            <td><input type="button" value="MATRICULAR" id="mat" class="boton">
            <input type="button" value="RETIRAR" id="ret" class="boton"></td>
        </tr>
        <input type="hidden" id="IDAccount">
        <input type="hidden" id="IDAccountParent">
        <input type="hidden" id="IDAccountParent2">
        <input type="hidden" id="Programa">        
        <input type="hidden" id="Nivel">
        <input type="hidden" id="Matricula">
        <input type="hidden" id="Yeare">
        <input type="hidden" id="IDInstitute" value="<?php echo $IDInstitute;?>">
    </table>
    <div id="formulario_carga">
    </div>
</fieldset>
<div id="pop" class="content-popup"> 
 <div id="cerrar">X</div> 
       <form id="newestudiante"  action="<?php echo site_url()?>" method="post" enctype="multipart/form-data">                            
                            <table class="tabla_registro">
                                <input type="hidden" id="IDAccount" name="IDAccount" value="<?php echo $IDAccount?>"/>
                                <input type="hidden" id="IDInstitute" name="IDInstitute" value="<?php echo $IDInstitute?>"/>
                               
                                <tr><td><h3>TIPO IDENTIFICACION</h3></td> <td><?php echo $tipodoc;?></td></tr>
                                <tr><td><h3>NUMERO DE IDENTIFICACION</h3></td> <td><input type="text" id="Nit" name="Nit" value="<?php echo $Nit?>" readonly=""/></td></tr>
                                <tr><td><h3>NOMBRE</h3></td> <td><input type="text" name="Name" value="<?php echo $Name?>"/></td></tr>
                                <tr><td><h3>APELLIDO</h3></td> <td><input type="text" name="Surname" value="<?php echo $Surname?>"/></td></tr>
                                <tr><td><h3>TELEFONO</h3></td> <td><input type="text" name="Telephone" value="<?php echo $Telephone?>"/></td></tr>
                                <tr><td><h3>DIRECCION</h3></td> <td><input type="text" name="Address" value="<?php echo $Address?>"/></td></tr>
                                <tr><td><h3>CORREO</h3></td> <td><input type="text" name="Mail" value="<?php echo $Mail?>"/></td></tr>
                                <tr><td><h3>FOTO</h3></td> <td><input type="file" name="userfile[]" value=""/></td></tr>
                                <tr><td colspan="2"><input type="button" value="CREAR" id="gest" class="boton"/></td></tr>
                            </table>
                        
        </form>
 
</div>
<div id="retorno"></div>
<script type="text/javascript">
    campo ="";
    campo2 ="";
    $('#pop').hide();
    $("#idlevel").attr("value", $("#idgroupa").attr("value"));
    
    $("#cest").click(function(){
        var cc = $("#est").attr("value");
        var IDins = $("#IDInstitute").attr("value");
        var IDPro = $("#Programa").attr("value");
        var ano = $("#ano").attr("value");
        campo="est";
        campo2="IDAccount";
         $("#Nit").attr("value",cc);
         var IDi = $("#IDInstitute").attr("value");
       getHtmlInput("est", "complemento/buscarTercero/"+cc,"IDAccount");
       getHtmlDatosMatricula("module1/getStudentByNit/"+cc+"/"+IDins,cc,ano,IDins);       
      
    });
    
    $("#cacu1").click(function(){
        var cc = $("#acu1").attr("value");
        campo="acu1";
        campo2="IDAccountParent";
         $("#Nit").attr("value",cc);
        getHtmlInput("acu1", "complemento/buscarTercero/"+cc,"IDAccountParent");
    });
    $("#cacu2").click(function(){
        var cc = $("#acu2").attr("value");
        campo="acu2";
        campo2="IDAccountParent2";
         $("#Nit").attr("value",cc);
        getHtmlInput("acu2", "complemento/buscarTercero/"+cc,"IDAccountParent2");
    });

    $('#cerrar').live("click",function(){
        $('#pop').fadeOut('slow');
    });
    $("#IDProgram").change(function(){
        var pro = $(this).attr("value");
        $("#IDProgramc").attr("value",pro);
        getHtml("idgrupo", "inicio/getGruposAcademicos/"+pro);
    });
    $("#idgroupa").live("change",function(){
        var idlevel = $(this).attr("value");
        $("#idlevel").attr("value", idlevel);
    });
    $("#gest").click(function(){
        if(confirm("Crear ?")){
            $("#pop").hide();
            insertAccount("newestudiante", "module1/insertAccount",campo,campo2);            
        }
    });
    $("#ins").click(function(){
        var year = $("#ano").attr("value");
        var acce = $("#IDAccount").attr("value");
        var acc1 = $("#IDAccountParent").attr("value");
        var acc2 = $("#IDAccountParent2").attr("value");
        var pro = $("#IDProgram").attr("value");
        var niv = $("#idgroupa").attr("value");
        getHtml("retorno", "module1/insertStudent/"+acce+"/"+acc1+"/"+acc2);
        alert("ALUMNO INSCRITO CORRECTAMENTE!");
    });
    $("#lim").click(function(){
        getHtml("contenido", "inicio/ir/crear_estudiante"); 
    });
    $("#mat").click(function(){
        var idest= $("#IDAccount").attr("value");
        var ano= $("#ano").attr("value");
        var IDpro= $("#IDProgram").attr("value");
        var IDGro= $("#idgroupa").attr("value");
        insertMatricula("module1/insertEnrollment/"+idest+"/"+ano+"/"+IDpro+"/"+IDGro);
       // getHtml("retorno", "module1/insertEnrollment/"+idest+"/"+ano+"/"+IDpro+"/"+IDGro);
    });
    $("#ret").click(function(){
        var ano= $("#ano").attr("value");
        var IDAco= $("#IDAccount").attr("value");
        getHtml("retorno", "module1/deleteEnrollment/"+IDAco+"/"+ano);
        alert("ESTUDIANTE RETIRADO CORRECTAMENTE");
        
    });
</script>