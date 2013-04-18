<fieldset class="formulario">
    <legend>PROGRAMAS ACADEMICOS</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/niveles')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>EDITAR</td>
            <td>ID</td>
            <td>AÑO</td>
            <td>NIVEL</td>
            <td>SEDE</td>
            <td>JORNADA</td>
            <td>CODIGO PROGRAMA</td>
            <td>NOMBRE</td>
            <td>PERIODO</td>
            <td>GENERO</td>
            <td>ESTADO</td>
            <td>FECHA</td>
            
         
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 
            
         if(isset($lista))
            foreach ($lista as $value) {  
             $value->Name = str_replace("%20", " ", $value->Name);
               
               
                ?>
            <tr class="fila" id="<?php echo $value->IDProgram?>">
                <td><div class="borrar" lang="<?php echo $value->IDProgram?>"></div></td>
                <td><div class="editar" lang="<?php echo $value->IDLevel[0]?>" dir="<?php echo $value->Name?>" title="<?php echo $value->IDProgram?>"></div></td>
                <td><input class="edit" type="text" id="IDProgram" lang="<?php echo $value->IDProgram?>" readonly=""  value="<?php echo $value->IDProgram?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDProgram?>" id="Year"  value="<?php echo $value->Year?>"/></td>
                    <td><?php echo $value->IDLevel[1];?></td>
                    <td><?php echo $value->IDEstablishment;?></td>
                    <td><?php echo $value->IDSchedule;?></td>                   
                    <td><input class="edit" type="text" lang="<?php echo $value->IDProgram?>" id="Code"  value="<?php echo $value->Code?>"/></td>              
                    <td><input class="edit" type="text" lang="<?php echo $value->IDProgram?>" id="Name"  value="<?php echo $value->Name?>"/></td>                                               
                     <td><?php echo $value->Periods;?></td>
                     <td><?php echo $value->Gender;?></td>                              
                     <td><?php echo $value->State;?></td>                                                  
                    <td><input class="edit" type="text" lang="<?php echo $value->IDProgram?>" id="Since"  value="<?php echo $value->Since?>" readonly=""/></td>              
            </tr>
            <?php
             }
            ?>
        </tbody>
        <tfoot>
            <tr class="inputsedes">
                <td></td>                                       
                <td></td>                                       
                <td><input type="text" id="IDProgram" name="IDProgram" readonly=""/></td>
                <td><input type="text" id="Year" name="Year"/></td>
                <td><?php echo $IDLevel;?></td>
                <td><?php echo $IDEstablishment;?></td>
                <td><?php echo $IDSchedule;?></td>                               
                <td><input type="text" id="Code" name="Code"/></td>                
                <td><input type="text" id="Name" name="Name"/></td>                              
                <td><?php echo $Periods;?></td>                
                <td><?php echo $Gender;?></td>                
                <td><?php echo $State;?></td>                
                <td><input type="text" id="Since" name="Since" readonly=""/></td>                
            </tr>
            <tr>
                <td ><input type="button" class="boton" value="AGREGAR"/></td>
                
            </tr>
        </tfoot>
    </table>
    </form>
</fieldset>
<fieldset class="formulario" id="tablagrados">
    
</fieldset>
<fieldset class="formulario" id="grados">
    
</fieldset>
<script type="text/javascript">
   
    $(".editar").click(function(){
        var idLevel = $(this).attr("lang");
        var nombre = $(this).attr("dir");
        programa = $(this).attr("title");        
        getHtml("tablagrados", "complemento/getGradosLIsta/"+idLevel+"/"+nombre);
    });
    $('.boton').click(function(){        
       crearLineaGenerica("module1/insertProgram","form","inicio/ir/programa");
    })

    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR PROGRAMA ?"))
        {
            getHtml("mensaje", "module1/deleteProgram/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             getHtml("contenido", "inicio/ir/programa");
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateProgramField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
        getHtml("contenido", "inicio/ir/programa");
    })
</script>
