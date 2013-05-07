<select name="seccion" id="select-seccion">
    <?php 
    foreach ($lista as $value) {
        ?>
    <option value="<?php echo $value->id_seccion?>"><?php echo $value->nombre?></option>
            <?php
    }
    ?>
</select>