<div id="slideshow" class="pics">
    <div id="slide-1" class="item-slide">
        <?php echo $new_slide;?>  
    </div> <!-- item-slide -->

    <div id="nav-slide">
        <?php 
        $cont =1;
        foreach ($nav as $value) {
            ?>
        <a href="#" id="<?php echo "nav_".$value?>" class="bot_slide"><?php echo $cont; $cont++;?></a>
                <?php            
        }?>
        
    </div>     
</div> <!-- block-slide -->
<script type="text/javascript">
    $("bot_slide").click(function(){
       var slide = $(this).attr("id");
       slide = slide.split("_");
       alert(slide[0]);
    });
</script>