<legend>GRADOS POR NIVEL</legend>
<form id="form" action="<?echo site_url()?>" method="post">
<table class="tabalasedes">
    <thead>
        <tr>
            <td colspan="5"><?php echo str_replace("%20", " ", $titulo)?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>ID</td>
            <td>CALIFICACION</td>
            <td>NOMBRE</td>
            <td>FECHA</td>
        </tr>        
    </thead>
    <tbody class="listagrados" lang="">
        <?php foreach ($grados as $value) {
            ?>
        <tr>
            <td><div class="borrar" lang="<?php echo $value->IDGrade?>"></div></td>
            <td><div class="editarg" lang="<?php echo $value->IDGrade?>" dir="<?php echo $value->Name?>"></div></td>
            <td><input  type="text" id="IDGrade" lang="IDGrade" name="IDGrade" readonly="" value="<?php echo $value->IDGrade;?>"/></td>
            <td><?php echo $value->EvaluationType;?></td>
            <td><input class="edit" type="text" id="Name" lang="<?php echo $value->IDGrade;?>" name="Name" value="<?php echo $value->Name;?>"/></td>
            <td><input type="text" id="Since" lang="<?php echo $value->IDGrade;?>" name="Since" readonly="" value="<?php echo $value->Since;?>"/></td>
        </tr>
        <?php
        }?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="hidden" id="oc" lang="<?php echo str_replace("%20", " ", $titulo);?>" name="IDLevel" value="<?php echo $nivel?>"/>
                <input type="text" name="IDGrade" readonly=""/>
            </td>
            <td><?php echo $value->EvaluationType;?></td>
            <td><input type="text" name="Name"/></td>
            <td><input type="text" name="Since" readonly="" value="<?php echo date('Y-m-d')?>"/></td>            
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="ACTUALIZAR" class="boton"/></td>
        </tr>
    </tfoot>
</table>
    </form>
<script type="text/javascript">
    $(".boton").click(function(){
       if(confirm("ACTUALIZAR CAMPO ?"))
           {
               var id = $("#oc").attr("value");
               var titulo = $("#oc").attr("lang");
               crearLineaRetorno("module1/insertGrade", "form", "complemento/getGrados/"+id+"/"+titulo,"grados");
           }
    });
     $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateGradeField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    });
     $(".editarg").click(function(){
         var idGrade = $(this).attr("lang");
         var tit = $(this).attr("dir");
        
        
          getHtml("asignatura", "complemento/getAsignatura/"+idGrade+"/"+tit);
    });
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR GRADO ?"))
        {
            getHtml("mensaje", "module1/deleteGrade/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             var id = $("#oc").attr("value");
               var titulo = $("#oc").attr("lang");
             getHtml("grados", "complemento/getGrados/"+id+"/"+titulo);
    })
</script>