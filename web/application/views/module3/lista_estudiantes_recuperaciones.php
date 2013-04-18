<div>
<table class="tabalasedes">
    <thead>
        <tr>
           
            <td>CURSO</td>
            <td>ASIGNATURA</td>
            <td>LOGRO</td>           
            <td>FECHA</td>
            <td>APROVACION</td>
            <td>NOTA</td>
            <td></td>
         
        </tr>
    </thead>
    <tbody>
        <?php 
        $cod=1;
        foreach ($lista as $value) {
            ?>
        <tr id="<?php echo "fila_".$value["IDObjectiveNote"];?>" class="nada">
           
            <td><?php echo $value["GroupName"];?></td>
            <td class="nombrelista"><?php echo $value["MatterName"];?>
               
            </td>
            <td class="nombrelista"><?php echo $value["ObjectiveName"];?></td>
            <td><input id="<?php echo "da_".$value["IDObjectiveNote"];?>" type="text" value="<?php echo date("Y-m-d")?>" class="date" readonly=""></td>
            <td <?php  if($value["IDRecoverObjective"]!="0")echo "class='ausente2'";else echo "class='ausente'"?> id="<?php echo "c_".$value["IDObjectiveNote"];?>">
                <select class="asistencia" lang="<?php echo $value["IDObjectiveNote"];?>" id="<?php echo "ap_".$value["IDObjectiveNote"]?>">
                    <?php 
                    if($value["IDRecoverObjective"]!="0"){
                    ?>
                    <option value="0">APROBADO</option>
                    <option value="1">NO APROBADO</option>                    
                    <?php } else{?>
                    <option value="1">NO APROBADO</option> 
                    <option value="0">APROBADO</option>                    
                    <?php }?>
                </select>
            </td>
            <td><input type="text" value="<?php echo $value["NoteValue"]?>" class="casilla" lang="<?php echo $value["IDObjectiveNote"];?>"
                       id="<?php echo "no_".$value["IDObjectiveNote"];?>" ></td>
            <td><input type="button" class="boton" value="GRABAR"
                       id="<?php echo $value["IDGroup"]?>" dir="<?php echo $value['IDRecoverObjective'];?>" lang="<?php echo $value["IDObjectiveNote"];?>"></td>
           
        </tr>
        <?php
        $cod++;
        }?>
    </tbody>
</table>
    </div>
<script type="text/javascript">
    $('.date').datePicker(
		{
			startDate: '2011/01/01',
			endDate: (new Date()).asString(),
                        clickInput:true
		});
                $('.date').keypress(function(){
                    $(".date").attr('value',"");
                });
    $(".nada").click(function(){
        var id = $(this).attr("id");
        $(".bloquesel").attr("class", "nada");
        $("#"+id).attr("class", "bloquesel");
    });
    
</script>