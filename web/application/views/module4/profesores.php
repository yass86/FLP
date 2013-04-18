<fieldset class="formulario">
    <legend>PERSONAL ACADEMICO</legend>
    <form id="profesor" method="post" action="<?php echo site_url('module1')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>APELLIDO</td>
            <td>NIT</td>
            <td>RESOLUCION</td>
            <td>NOMBRAMIENTO</td>
            <td>TITULO</td>
            <td>ESCALAFON</td>
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 
        
            foreach ($lista as $value) {
                ?>
             <tr>
                <td><div class="borrar" lang="<?php echo $value->IDTeacher?>"></div></td>                
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>" id="IDTeacher" value="<?php echo $value->IDTeacher?>" readonly=""/></td>
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>" id="Name"  value="<?php echo $value->Name?>"/></td>
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>" id="Surname"  value="<?php echo $value->Surname?>"/></td>                
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>"  id="Nit" value="<?php echo $value->Nit?>"/></td>
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>"  id="Resolution"  value="<?php echo $value->Resolution?>"/></td>
                <td><?php echo $value->NominationType?></td>
                <td><input class="edit" type="text" lang="<?php echo $value->IDTeacher?>"  id="Title"  value="<?php echo $value->Title?>"/></td>
                <td><?php echo $value->Scale?></td>                    
             </tr>
            <?php
           
             }
            ?>
        </tbody>
        <tfoot>
            <tr class="inputsedes">
                <td></td>                
                <td><input type="hidden" name="IDInstitute" value="<?php echo $IDInstitute?>"/></td>                
                <td><input type="text" id="dane" name="Name"/></td>
                <td><input type="text" id="nombre" name="Surname"/></td>
                <td><input type="text" id="ciudad" name="Nit"/></td>
                <td><input type="text" id="direccion" name="Resolution"/></td>
                <td><?php echo $nominacion?></td>
                <td><input type="text" id="rector" name="Title"/></td>
                <td><?php echo $escala?></td> 
            </tr>
            <tr>
                <td ><input type="button" class="boton" value="AGREGAR"/></td>
                
            </tr>
        </tfoot>
    </table>
    </form>
</fieldset>
<script type="text/javascript">
    $('.boton').click(function(){              
          crearLineaRetorno("module1/insertTeacher", "profesor", "inicio/ir/profesores/","contenido");
    })
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
         if(confirm("ELIMINAR PERSONAL ?"))
         {
                crearLineaRetorno("module1/deleteTeacher/"+fil, "profesor", "inicio/ir/profesores/","contenido");
         }
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        getHtml("", "module1/updateTeacherField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    })
</script>