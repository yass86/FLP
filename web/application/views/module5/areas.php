<fieldset class="formulario">
    <legend>AREAS ACADEMICAS</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/niveles')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>ID</td>
            <td>ETIQUETA</td>
            <td>NOMBRE</td>
            <td>DESCRIPCION</td>
         
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 
         
            foreach ($lista as $value) {
                $value->Code = str_replace("%20", " ", $value->Code);
                $value->Name = str_replace("%20", " ", $value->Name);
                $value->Description = str_replace("%20", " ", $value->Description);
                $value->Description = str_replace("%C3%91", "Ñ", $value->Description);
                
                ?>
            <tr class="fila" id="<?php echo $value->IDAcademicArea?>">
                <td><div class="borrar" lang="<?php echo $value->IDAcademicArea?>"></div></td>
                <td><input class="edit" type="text" id="IDAcademicArea" lang="<?php echo $value->IDAcademicArea?>" readonly=""  value="<?php echo $value->IDAcademicArea?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDAcademicArea?>" id="Code"  value="<?php echo $value->Code?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDAcademicArea?>" id="Name"  value="<?php echo $value->Name?>"/></td>              
                    <td><input class="edit" type="text" lang="<?php echo $value->IDAcademicArea?>" id="Description"  value="<?php echo $value->Description?>"/></td>              
            </tr>
            <?php
             }
            ?>
        </tbody>
        <tfoot>
            <tr class="inputsedes">
                <td></td>               
                <td><input type="text" id="dane" name="IDLevel" readonly=""/></td>
                <td><input type="text" id="nombre" name="Code"/></td>
                <td><input type="text" id="name" name="Name"/></td>
                <td><input type="text" id="des" name="Description"/></td>                
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
        
         $("#cutabla").append(crearLineaArea());
        
    })
    $(".fila").live("click",function(){
       
    })
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR AREA ?"))
        {
            getHtml("mensaje", "module1/deleteAcademicArea/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             getHtml("contenido", "inicio/ir/areas");
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateAcademicAreaField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    })
</script>