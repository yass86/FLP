<div>
 
<table class="tabalasedes">
    <thead>
        <tr>
            <td>COD</td>
            <td>DOCUMENTO</td>
            <td>NOMBRE</td>
            <td>NOTA CONDUCTA</td>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        $cod=1;
        foreach ($lista as $value) {
            ?>
        <tr <?php if($cod%2==0)echo "class='sombra'";?>>
            <td><?php echo $cod;?></td>
            <td><?php echo $value['Nit'];?></td>
            <td class="nombrelista"><?php echo $value['Surname']." ".$value['Name'];?></td>           
            <td><input class="casilla" type="text" id="<?php echo "idac_".$value['IDAccount'];?>" 
                       lang="<?php echo $value['IDConductNote'];?>" value="<?php echo $value['NoteValue'];?>"></td>
        </tr>
        <?php
        $cod++;
        }?>
    </tbody>
</table>
    </div>
<script type="text/javascript">
    
</script>