
    <fieldset class="formulario">
        <legend>NUEVO INGRESO</legend>    
            <div id="matricula">
                <div class="titulo" id="est">ESTUDIANTE</div>
                <div class="est">
                   <form id="newestudiante" method="post" action="<?php echo site_url()?>">
                            
                            <table class="tabla_registro">
                                <input type="hidden" id="IDAccount" name="IDAccount" value="<?php echo $IDAccount?>"/>
                                <input type="hidden" id="IDInstitute" name="IDInstitute" value="<?php echo $IDInstitute?>"/>
                                <tr><td><h3>TIPO IDENTIFICACION</h3></td> <td><?php echo $tipodoc;?></td></tr>
                                <tr><td><h3>NUMERO DE IDENTIFICACION</h3></td> <td><input type="text" id="Nit" name="Nit" value="<?php echo $Nit?>"/></td></tr>
                                <tr><td><h3>NOMBRE</h3></td> <td><input type="text" name="Name" value="<?php echo $Name?>"/></td></tr>
                                <tr><td><h3>APELLIDO</h3></td> <td><input type="text" name="Surname" value="<?php echo $Surname?>"/></td></tr>
                                <tr><td><h3>TELEFONO</h3></td> <td><input type="text" name="Telephone" value="<?php echo $Telephone?>"/></td></tr>
                                <tr><td><h3>DIRECCION</h3></td> <td><input type="text" name="Address" value="<?php echo $Address?>"/></td></tr>
                                <tr><td><h3>CORREO</h3></td> <td><input type="text" name="Mail" value="<?php echo $Mail?>"/></td></tr>
                                <tr><td colspan="2"><input type="button" value="GUARDAR ESTUDIANTE" id="gest" class="boton"/></td></tr>
                            </table>
                        
                    </form>
                </div>
                <div class="titulo" id="acu">ACUDIENTE</div>
                <div class="acu">
                    <form id="newacudiente" method="post" action="<?php echo site_url()?>">
                      
                            <table class="tabla_registro">
                                <input type="hidden" id="IDAccount1" name="IDAccount1" value=""/>
                                <input type="hidden" id="IDInstitute1" name="IDInstitute1" value="<?php echo $IDInstitute?>"/>
                                <tr><td><h3>TIPO IDENTIFICACION</h3></td> <td><?php echo $tipodoc;?></td></tr>
                                <tr><td><h3>NUMERO DE IDENTIFICACION</h3></td> <td><input type="text" id="Nit1" name="Nit1" value="<?php echo $Nit?>"/></td></tr>
                                <tr><td><h3>NOMBRE</h3></td> <td><input type="text" name="Name" value="<?php echo $Name?>"/></td></tr>
                                <tr><td><h3>APELLIDO</h3></td> <td><input type="text" name="Surname" value="<?php echo $Surname?>"/></td></tr>
                                <tr><td><h3>TELEFONO</h3></td> <td><input type="text" name="Telephone" value="<?php echo $Telephone?>"/></td></tr>
                                <tr><td><h3>DIRECCION</h3></td> <td><input type="text" name="Address" value="<?php echo $Address?>"/></td></tr>
                                <tr><td><h3>CORREO</h3></td> <td><input type="text" name="Mail" value="<?php echo $Mail?>"/></td></tr>
                                <tr><td colspan="2"><input type="button" value="GUARDAR ACUDIENTE" class="boton" id="acug"/></td></tr>
                            </table>
                       
                    </form>
                </div>
                <div class="titulo" id="acu">INFORMACION ACADEMICA</div>
                <div class="gro">
                    <form id="academic" method="post" action="<?php echo site_url()?>">                      
                            <table class="tabla_registro">
                                <input type="hidden" id="IDProgramc"  value=""/>
                                <input type="hidden" id="IDAccountc"  value=""/>
                                <input type="hidden" id="IDInstitutec"  value="<?php echo $IDInstitute?>"/>
                                <input type="hidden" id="IDtutorc"  value=""/>
                                <input type="hidden" id="IDGroupc"  value=""/>   
                                <tr>
                                    <td><h3>PROGRAMA</h3></td>
                                    <td><?php echo $programas?></td>
                                </tr>
                                <tr>
                                    <td><h3>GRUPO</h3></td>
                                    <td id="idgrupo"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="button" value="MATRICULAR" class="boton" id="mat"/></td>
                                </tr>
                                <tr>
                                    <td id="xs"></td>
                                </tr>
                                    
                            </table>                       
                    </form>
                </div>
            </div>
    </fieldset>


<script type="text/javascript">
    $(".acu").hide();
    $(".gro").hide();
    $("#gest").click(function(){
        if(confirm("CREAR ESTUDIANTE")){
            crearLineaRetornoStudent("module1/insertAccount", "newestudiante");            
        }
    });
    $("#acug").click(function(){
        if(confirm("CREAR ACUDIENTE")){
            crearLineaRetornoAcudiente("module1/insertAccount", "newacudiente");            
        }
    });
    $("#IDProgram").change(function(){
        var pro = $(this).attr("value");
        $("#IDProgramc").attr("value",pro);
        getHtml("idgrupo", "inicio/getGruposAcademicos/"+pro);
    });
    $("#idgroupa").live("change",function(){
        var pro = $(this).attr("value");
        $("#IDGroupc").attr("value",pro);
       
    });
    $("#mat").click(function(){
        var idprogram = $("#IDProgramc").attr("value"); 
        var idacc = $("#IDAccountc").attr("value"); 
        var idtuto = $("#IDtutorc").attr("value"); 
        var idgru = $("#IDGroupc").attr("value"); 
        getHtml("xs", "module1/insertStudent/"+idprogram+"/"+idacc+"/"+idtuto+"/"+idgru);
        getHtml("contenido", "inicio/ir/crear_estudiante");
    });
</script>