<select name="<?php echo $nombre?>" class="select-idioma">
    <?php 
    foreach ($lista as $value) {
        if($value->id_idioma==$id)
            { ?> <option selected value="<?php echo $value->id_idioma?>"><?php echo $value->nombre?></option> 
        <?php }
        else { ?>
            <option value="<?php echo $value->id_idioma?>"><?php echo $value->nombre?></option> 
        <?php }
    }
    ?>
</select>