<div id="block-operaciones" class="block acoordeon">
    <div id="item-pais">
        <?php 
        $cont=0;
        foreach ($lista as $value) {
            ?>        
            <span class="content items-acoordeon <?php if($cont==0)echo "on";else echo "off";$cont++;?>" id="<?php echo "pais-".$value->id_operaciones?>"><?php echo $value->pais?></span>            
            <?php
        }
        ?>        
    </div>
    <div id="item-contenido-pais">
        <?php
        $cont=0;
    foreach ($lista as $value) {
        ?>
        <div class="item-row-acoordeon <?php if($cont==0)echo "on";else echo "off";$cont++;?>" id="<?php echo "pais-".$value->id_operaciones?>">
            <img src="<?php 
            $img = $value->img;
            if($img=="null"|$img=="")
                $img = "default.jpg";
            echo site_url('files')."/".$img?>" width="120" height="250">
            <div class="contenido">
                <h2><?php echo $value->titulo?></h2>
                <p><?php echo $value->contenido?></p>
                 <?php
                 $url_boton = $value->url_boton;                 
                 $url_boton = str_replace("_", "/", $url_boton);
                 
                 
                 ?>
                <span><a href="<?php echo site_url('flp/page/').'/'.$url_boton?>" class="btn-orange"><?php echo $value->txt_boton?></a></span>
            </div>
        </div>       
        <?php
    }
        ?>        
    </div>

</div> <!-- /.section-inner-->