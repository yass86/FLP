<legend>GRUPOS</legend>
    <form id="formGroup" action="<?echo site_url()?>" method="post">
    <table class="tabalasedes">
        <thead>
            <tr><td colspan="4"><?php echo $titulo;?></td></tr>
            <tr>
                <td>ELIMINAR</td>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>           
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $value) {
                ?>
            <tr>
                    <td><div class="borrar" lang="<?php echo $value->IDGroup?>"></div></td>
                    <td><input type="text" value="<?php echo $value->IDGroup?>" readonly=""/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDGroup?>" id="Name"  value="<?php echo $value->Name?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDGroup?>" id="Description"  value="<?php echo $value->Description?>"/></td>
              </tr>     
            <?php
            }?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td><input type="hidden" id="oc" name="IDProgram" value="<?php echo $programa?>" lang="<?php echo $grado?>"/>
                    <input type="hidden" name="IDGrade" value="<?php echo $grado?>"/></td>
                <td><input type="text" name="Name"/></td>
                <td><input type="text" name="Description"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="AGREGAR" class="boton"/></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
        </form>

<script type="text/javascript">
    $(".boton").click(function(){
       if(confirm("AGREGAR CAMPO ?"))
           {
               var pro = $("#oc").attr("value");
               var gra = $("#oc").attr("lang");
               crearLineaRetorno("module1/insertGroup", "formGroup", "complemento/getCursos/"+gra+"/"+pro,"grados");
           }
    });
     $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateGroupField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    });
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR CURSO ?"))
        {
            getHtml("mensaje", "module1/deleteGroup/"+fil);
            $("#"+fil).remove();           
        }
        else
            {}
             var pro = $("#oc").attr("value");
               var gra = $("#oc").attr("lang");
             getHtml("grados", "complemento/getCursos/"+gra+"/"+pro);
    })
</script>