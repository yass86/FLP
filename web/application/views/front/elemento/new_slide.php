<div id="<?php echo "slide-" . $id; ?>" class="item-slide">
    <div class="content-slide">
        <h1 id="titulo_slide"><?php echo $titulo ?></h1>
        <p id="contenido_slide"><?php echo $contenido ?></p>
        <a href="<?php echo $url_boton ?>"class="btn-orange"><?php echo $txt_boton ?></a>
    </div>
    <img src="<?php echo site_url() . $imagen; ?>" width="960" height="300">    
</div>

