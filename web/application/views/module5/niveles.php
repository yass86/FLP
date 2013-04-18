<fieldset class="formulario">
    <legend>NIVELES DE EDUCACION</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/niveles')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>ID</td>
            <td>ETIQUETA</td>
            <td>NOMBRE</td>
            <td>TIPO</td>
         
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 
         
            foreach ($lista as $value) {
                $value->Code = str_replace("%20", " ", $value->Code);
                $value->Name = str_replace("%20", " ", $value->Name);
                
                ?>
            <tr class="fila" id="<?php echo $value->IDLevel?>">
                <td><div class="borrar" lang="<?php echo $value->IDLevel?>"></div></td>
                <td><input class="edit id" type="text" id="IDEstablishment" lang="<?php echo $value->IDLevel?>" readonly=""  value="<?php echo $value->IDLevel?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDLevel?>" id="Code"  value="<?php echo $value->Code?>"/></td>
                    <td><input class="edit nombre" type="text" lang="<?php echo $value->IDLevel?>" id="Name"  value="<?php echo $value->Name?>"/></td>
                <td>
                    <?php if($value->Type=="1"){?>
                    <select class="edit" lang="<?php echo $value->IDLevel?>" name="Type" id="Type">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                    <?php }else{?>
                    <select class="edit" lang="<?php echo $value->IDLevel?>" name="Type" id="Type">
                         <option value="0">INACTIVO</option>
                        <option value="1">ACTIVO</option>
                       
                    </select>
                    <?php }?>
                </td> 
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
                <td>
                    <select name="Type" id="tipo">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                </td>

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
        
         $("#cutabla").append(crearLineaNivel());
        
    })
    $(".fila").live("click",function(){
       
    })
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR NIVEL ?"))
        {
            getHtml("mensaje", "module1/deleteLevel/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             getHtml("contenido", "inicio/ir/niveles");
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateLevelField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    })
</script>