<article id="<?php echo "bloque_".$id?>" class="block columnx3 font-green">
    <h2><?php echo $titulo?></h2>   
    <div class="content">
        <img src="<?php echo site_url().$imagen ?>" width="281" height="75">
        <p><?php echo $contenido?></p>
        <?php 
        $url_boton = str_replace("_", "/", $url_boton);
        ?>
        <span><a href="<?php echo site_url('flp/page/').'/'.$url_boton?>" class="btn-orange"><?php echo $txt_boton?></a></span>
        <div>
</article>