<div id="view-politicas-calidad" class="view-row columnx2">   
    <img src="<?php echo site_url().$imagen?>" width="150" height="100">
    <div class="content">
        <h2><?php echo $titulo?></h2> 
        <p><?php echo $contenido?></p>
        <?php 
        $url_boton = str_replace("_", "/", $url_boton);
        ?>
        <span><a href="<?php echo site_url('flp/page/').'/'.$url_boton?>" class="btn-orange"><?php echo $txt_boton?></a></span>
    </div>
</div>