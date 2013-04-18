<legend>SUBASIGNATURAS</legend>
<form id="forms" action="<?echo site_url()?>" method="post">
<table class="tabalasedes">
    <thead>
        <tr>
            <td colspan="4"><?php echo $titulo?></td>
        </tr>
        <tr>
            <td></td>         
            <td>ID</td>
            <td>NOMBRE</td>
            <td>DETALLE</td>
        </tr>        
    </thead>
    <tbody class="listagrados" lang="">
        <?php foreach ($grados as $value) {
            ?>
        <tr>
            <td><div class="borrar" lang="<?php echo $value->IDAchievement?>"></div></td>           
            <td><input  type="text" id="IDAchievement" lang="IDMatter" name="IDAchievement" readonly="" value="<?php echo $value->IDAchievement;?>"/></td>
            <td><input class="edit" type="text" id="Name" lang="<?php echo $value->IDAchievement;?>" name="Name" value="<?php echo str_replace("%20", " ", $value->Name);?>"/></td>
            <td><input class="edit" type="text" id="Description" lang="<?php echo $value->IDAchievement;?>" name="Name" value="<?php echo str_replace("%20", " ", $value->Description);?>"/></td>
           
        </tr>
        <?php
        }?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td>
                <input type="hidden" id="ocs" lang="<?php echo str_replace("%20", " ", $titulo);?>" name="IDMatter" value="<?php echo $nivel?>"/>
                <input type="text" name="IDAchievement" readonly=""/>
            </td>
           <td><input type="text" name="Name" /></td>       
           <td><input type="text" name="Description" /></td>       
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="AGREGAR" class="boton"/></td>
        </tr>
    </tfoot>
</table>
    </form>
<script type="text/javascript">
    $(".boton").click(function(){
       if(confirm("INSERTAR FILA ?"))
           {
               var id = $("#ocs").attr("value");
               var titulo = $("#ocs").attr("lang");
               crearLineaRetorno("module1/insertAchievement", "forms", "complemento/getSubAsignaturas/"+id+"/"+titulo,"subasignatura");
           }
    });
     $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateAchievementField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    });
    
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR ASIGNATURA ?"))
        {
            getHtml("mensaje", "module1/deleteAchievement/"+fil);
            $(this).remove();
           
        }
        else
            {}
             var id = $("#ocs").attr("value");
               var titulo = $("#ocs").attr("lang");
             getHtml("subasignatura", "complemento/getSubAsignaturas/"+id+"/"+titulo);
    })
</script>