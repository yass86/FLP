<div>
   
<table class="tabalasedes">
    <thead>
        <tr>
            <td>COD</td>
            <td>DOCUMENTO</td>
            <td>NOMBRE</td>
            <td>DEFINITIVA</td>
            <td>AUSENCIAS</td>
            <td>LOGROS</td>
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
            <td><?php echo number_format($value['Def'],2);?></td>
            <td><?php echo $value['Absents'];?></td>
            <td><?php echo $value['FailedObjectives'];?></td>
        </tr>
        <?php
        $cod++;
        }?>
    </tbody>
</table>
    </div>
<script type="text/javascript">
    
</script>