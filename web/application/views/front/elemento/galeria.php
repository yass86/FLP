<h2><?php echo $titulo;?></h2>
<p><?php echo $txt_pre;?></p>
<div id="block-carrousel156x104" class="block">
    <div class="content-carrousel">
        <a class="buttons prev" href="#">left</a>
        <div class="viewport">
            <ul class="overview">
                
                <?php 
                
                foreach ($lista as $value) {
                    ?>
                 <li><img src="<?php echo site_url().'/'.$value->ruta?>" width="156px" height="104"><span class="lupa"></span></li>
                <?php
                }
                ?>
               
            </ul>
        </div> 
        <a class="buttons next" href="#">right</a>
    </div>
</div><!-- block-carrousel -->
<p><?php echo $txt_pos;?></p>