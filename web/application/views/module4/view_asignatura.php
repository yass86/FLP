<legend>ASIGNATURAS</legend>
<form id="forma" action="<?echo site_url()?>" method="post">
<table class="tabalasedes">
    <thead>
        <tr>
            <td colspan="6"><?php echo str_replace("%20", " ", $titulo)?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>AREA</td>
            <td>SUBASIGNATURA</td>
            <td>PROMEDIAR</td>
            <td>HORAS X SEMANA</td>
        </tr>        
    </thead>
    <tbody class="listagrados" lang="">
        <?php foreach ($grados as $value) {
            ?>
        <tr>
            <td><div class="borrar" lang="<?php echo $value->IDMatter?>"></div></td>
            <td><div class="editars" lang="<?php echo $value->IDMatter?>" dir="<?php echo $value->Name?>"></div></td>
            <td><div class="editarl" lang="<?php echo $value->IDMatter?>" dir="<?php echo $value->Name?>"></div></td>
            <td><input  type="text" id="IDMatter" lang="IDMatter" name="IDMatter" readonly="" value="<?php echo $value->IDMatter;?>"/></td>
            <td><input class="edit" type="text" id="Name" lang="<?php echo $value->IDMatter;?>"  value="<?php echo $value->Name;?>"/></td>
            <td><?php echo $value->IDAcademicArea;?></td>
            <td><input class="edit" type="checkbox" id="Achievements" lang="<?php echo $value->IDMatter;?>" value="<?php if($value->Achievements==1)echo "0";else echo "1";?>" <?php if($value->Achievements) echo "checked";?>></td>
            <td><input class="edit" type="checkbox" id="Average" lang="<?php echo $value->IDMatter;?>" value="<?php if($value->Average==1)echo "0";else echo "1";?>" <?php if($value->Average) echo "checked";?>/> </td>
             <td><input class="edit" type="text" id="WeekHours" lang="<?php echo $value->IDMatter;?>"  value="<?php echo $value->WeekHours;?>"/></td>
        </tr>
        <?php
        }?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <input type="hidden" id="oca" lang="<?php echo str_replace("%20", " ", $titulo);?>" name="IDGrade" value="<?php echo $nivel?>"/>
                <input type="text" name="IDMatter" readonly=""/>
            </td>
            <td><input type="text" name="Name"/></td>
            <td><?php echo $areas;?></td>            
            <td><input type="checkbox" name="Achievements" value="1"></td>
                <td><input type="checkbox" name="Average" value="1">     </td>
                 <td><input type="text" name="WeekHours"/></td>
            </td>            
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
               var id = $("#oca").attr("value");
               var titulo = $("#oca").attr("lang");
               crearLineaRetorno("module1/insertMatter", "forma", "complemento/getAsignatura/"+id+"/"+titulo,"asignatura");
           }
    });
     $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateMatterField/"+campo+"/"+valor+"/"+id);
       // alert("CAMPO ACTUALIZADO");
    });
     $(".editars").click(function(){
         var idGrade = $(this).attr("lang");
          var tit = $(this).attr("dir");
          tit = tit.replace('Ñ','N');
        
           getHtml("subasignatura", "complemento/getSubAsignaturas/"+idGrade+"/"+tit);
        
    });
     $(".editarl").click(function(){
         var idGrade = $(this).attr("lang");
          var tit = $(this).attr("dir");
          tit = tit.replace('Ñ','N');
        
           getHtml("subasignatura", "complemento/getlogros/"+idGrade+"/"+tit);
        
    });
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR ASIGNATURA ?"))
        {
            getHtml("mensaje", "module1/deleteMatter/"+fil);
            $(this).remove();
           
        }
        else
            {}
             var id = $("#oca").attr("value");
               var titulo = $("#oca").attr("lang");
             getHtml("asignatura", "complemento/getAsignatura/"+id+"/"+titulo);
    })
</script>