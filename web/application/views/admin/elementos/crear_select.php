<select name="<?php echo $nombre?>" class="<?php echo $clase?>" id="<?php echo $id?>">
    <?php 
    foreach ($lista as $value) {
        if($value->opcion==$opcion)
            { ?> <option selected="on" value="<?php echo $value->opcion?>"><?php echo $value->valor?></option> 
        <?php }
        else { ?>
            <option value="<?php echo $value->opcion?>"><?php echo $value->valor?></option> 
        <?php }
    }
    ?>
</select>