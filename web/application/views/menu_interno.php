<div class="menu_interno">
    <ul>
        <?php foreach ($lista as $value) {
            ?>
        <li><div class="linkurl" id="<?php echo $value->url?>" href=""><div class="flecha"></div><?php echo $value->descripcion;?></div></li>
        <?php
        }?>
    </ul>
</div>