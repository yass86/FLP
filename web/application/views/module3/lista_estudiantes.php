<div>
<table class="tabalasedes">
    <thead>
        <tr>
            <td>COD</td>
            <td>DOCUMENTO</td>
            <td>NOMBRE</td>
            <td class="oculta">NOTA PARCIAL</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $cod=1;
        foreach ($lista as $value) {
            ?>
        <tr id="<?php echo "fila_".$value['IDAccount'];?>" class="nada">
            <td><?php echo $cod;?></td>
            <td><?php echo $value['Nit'];?></td>
            <td class="nombrelista"><?php echo $value['Surname']." ".$value['Name'];?></td>
            <td class="oculta"><input class="casilla" type="text" id="<?php echo $value['IDAccount'];?>" lang="" value="<?php echo $value['Nota']?>"></td>
        </tr>
        <?php
        $cod++;
        }?>
    </tbody>
</table>
    </div>
<script type="text/javascript">
    
</script>