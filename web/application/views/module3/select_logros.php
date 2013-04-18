<select id="subasignatura">
    <option value="0">N/A</option>
    <?php 
    foreach ($lista as $value) {
        ?>
    <option value="<?php echo $value->IDObjective;?>"><?php echo $value->Name;?></option>
    <?php
    }
    ?>
</select>
