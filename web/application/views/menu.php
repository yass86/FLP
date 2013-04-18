<div id="menu">
   <?php 
    foreach ($lista as $value) {
        ?>
    
    <div class="top_menu" dir="<?php echo str_replace(" ", "_", $value->tipo);?>" ><div class="carpeta"></div><?php echo $value->tipo;?></div>
    <div class="sub_link" id="<?php echo str_replace(" ", "_", $value->tipo);?>"></div>
    <?php
    }
   ?>
</div>
<script type="text/javascript">
    $(".top_menu").click(function(){
        var link = $(this).attr("dir");
        $(".sub_link").hide();
        getHtml(link, "inicio/getMenuInterno/"+link);
        $("#"+link).show();
    })
    $(".linkurl").live("click",function(){
        var linkurl = $(this).attr("id");
        getHtml("contenido", linkurl);
    })

</script>