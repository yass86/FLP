<form id="pagina" method="post" action="<?php echo site_url('slide/slide/nuevo_contenido_slide')?>"  enctype="multipart/form-data">
    
    <div class="form-item field-titulo">
         <label for="">Slide<span>*</span></label>
        <?php echo $slide;?>
    </div>
    <div class="form-item field-titulo">
        <label for="">Titulo<span>*</span></label>
        <input type="hidden" name="id_slide" id="idslide"  value="<?php echo $id;?>">        
        <input type="hidden" name="id_img" id="idimg"  value="<?php echo $id_img;?>">        
        <input type="text" name="titulo" id="titulo" class="input" value="<?php echo $titulo?>">
    </div>                                                                                   
    <div class="form-item field-contenido">
        <label for="">Contenido<span>*</span></label>       
        <textarea name="contenido"><?php echo $contenido;?></textarea>
    </div>                                                                                   
    <div class="form-item field-file">
        <label for="">Imagen<span>*</span></label>       
        <input type="file" name="archivo" value="" >
    </div>                                                                                   
    <div class="form-item field-orden">
        <label for="">Posicion Imagen<span>*</span></label>       
        <select name="orden" class="wrapper-select">
            <option value="1">Derecha</option>
            <option value="0">Izquierda</option>
        </select>
    </div>   
    <div class="form-item field-boton">
        <label for="">Texto Boton<span>*</span></label>       
        <input name="txtboton" value="<?php echo $txtboton?>" >
    </div>    
    <div class="form-item field-boton">
        <label for="">Url Boton<span>*</span></label>       
        <input name="urlboton" value="<?php echo $urlboton?>" >
    </div>    
   
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-pagina" value="Registrar">
    </div>    

</form> 
<script type="text/javascript">  
    $('#select-slide').live('change',function(){
        var va=$(this).attr('value');
        $('#idslide').attr('value', va);
    });
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        // Example content CSS (should be your site CSS)
        content_css: "css/example.css",
        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "js/template_list.js",
        external_link_list_url: "js/link_list.js",
        external_image_list_url: "js/image_list.js",
        media_external_list_url: "js/media_list.js",
        // Replace values for the template plugin
        template_replace_values: {
            username: "flp",
            staffid: "991234"
        }
    });
</script>