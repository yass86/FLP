<div>

<table class="tabalasedes">
    <thead>
        <tr>
            <td>COD</td>
            <td>DOCUMENTO</td>
            <td>NOMBRE</td>
            <td>ASISTENCIA</td>
         
        </tr>
    </thead>
    <tbody>
        <?php 
        $cod=1;
        foreach ($lista as $value) {
            ?>
        <tr id="<?php echo "fila_".$value["IDAccount"];?>" class="nada">
            <td><?php echo $cod;?></td>
            <td><?php echo $value["Nit"];?></td>
            <td class="nombrelista"><?php echo $value["Surname"]." ".$value["Name"];?></td>
            <td <?php  if($value["IDObjectiveNote"]!="0")echo "class='ausente'";else echo "class='noasente'"?> id="<?php echo "c_".$value["IDAccount"];?>">
                <select class="asistencia" lang="<?php echo $value["IDAccount"];?>" id="<?php echo $value["IDObjectiveNote"]?>">
                    <?php 
                    if($value["IDObjectiveNote"]!="0"){
                    ?>
                    <option value="0">NO APROBADO</option>
                    <option value="1">APROBADO</option>                    
                    <?php } else{?>
                    <option value="1">APROBADO</option> 
                    <option value="0">NO APROBADO</option>                    
                    <?php }?>
                </select>
            </td>
           
        </tr>
        <?php
        $cod++;
        }?>
    </tbody>
</table>
    </div>
<script type="text/javascript">
    $(".nada").click(function(){
        var id = $(this).attr("id");
        $(".bloquesel").attr("class", "nada");
        $("#"+id).attr("class", "bloquesel");
    })
</script>