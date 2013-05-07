<select name="<?php echo $nombre?>" class="select-idioma">
    <?php 
    foreach ($lista as $value) {
        if($value->nombre==$nombre)
            { ?> <option selected="" value="<?php echo $value->sigla?>"><?php echo $value->nombre?></option> 
        <?php }
        else { ?>
            <option value="<?php echo $value->sigla?>"><?php echo $value->nombre?></option> 
        <?php }
    }
    ?>
</select>