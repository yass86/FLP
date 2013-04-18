<legend>GRADOS POR NIVEL</legend>

<table class="tabalasedes">
    <thead>
        <tr>
            <td colspan="4"><?php echo str_replace("%20", " ", $titulo)?></td>
        </tr>
        <tr>
           
            <td></td>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>FECHA</td>
        </tr>        
    </thead>
    <tbody class="listagrados" lang="">
        <?php foreach ($grados as $value) {
            ?>
        <tr>
           
            <td><div class="editargg" lang="<?php echo $value->IDGrade?>" dir="<?php echo $value->Name?>" title="<?php echo $value->Name;?>"></div></td>
            <td><input  type="text" id="IDGrade" lang="IDGrade" name="IDGrade" readonly="" value="<?php echo $value->IDGrade;?>" readonly=""/></td>
            <td><input class="edit" type="text" id="Name" lang="<?php echo $value->IDGrade;?>" name="Name" value="<?php echo $value->Name;?>" readonly=""/></td>
            <td><input  type="text" id="Since" lang="<?php echo $value->IDGrade;?>" name="Since" readonly="" value="<?php echo $value->Since;?>" readonly=""/></td>
        </tr>
        <?php
        }?>
    </tbody>
  
</table>
   
<script type="text/javascript">
   
    
     $(".editargg").click(function(){
         var idGrade = $(this).attr("lang");
         var title = $(this).attr("title");
         var idProg = programa; 
         getHtml("grados", "complemento/getCursos/"+idGrade+"/"+idProg+"/"+title);
    });
   
</script>