<table class="tabalasedes">
    <thead>
        <tr>
            <td>MATERIA</td>
            <td>NOTA DEFINITIVA</td>
            <td>AUSENCIAS</td>
            <td>LOGROS PERDIDOS</td>
        </tr>
    </thead>
    <tbody>
        <?php 
foreach ($lista as $value) {
    ?>
        <tr>
            <td><?php echo $value['MatterName'];?></td>
            <td><?php echo $value['Def'];?></td>
            <td><?php echo $value['Absents'];?></td>
            <td><?php echo $value['FailedObjectives'];?></td>
        </tr>       
<?php
}
?>
    </tbody>
</table>


