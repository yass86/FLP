<form id="pagina" method="post" action="<?php echo site_url('pagina/pagina/registrar_pagina')?>"  enctype="multipart/form-data">
    
    <div id="response">
        
    </div>
    <div class="form-item field-slu">
        <label for="">Slu<span>*</span></label>
        <input type="hidden" name="id" id="id_producto" value="<?php echo $id;?>">
        <input type="hidden" name="seccion" id="id_seccion" value="<?php echo $seccion;?>">       
        <input type="hidden" name="seccion" id="id_seccion" value="<?php echo $seccion;?>">
        <input type="text" name="slu" id="slu" class="input" value="<?php echo $slu;?>">
    </div>
    <div class="form-item field-titulo">
        <label for="">Titulo<span>*</span></label>
        <input type="text" name="titulo" id="titulo" class="input" value="<?php echo $titulo;?>">
    </div>                             
    <div class="form-item field-tex-destacado-area">
        <label for="">Texto destacado<span>*</span></label>        
        <textarea name="txtdestacado"><?php echo $txt_destacado;?></textarea>
    </div>                                                     
    <div class="form-item field-cont-wisi">
        <label for="">Contenido<span>*</span></label>
        <textarea name="contenido"><?php echo $txt_destacado;?></textarea>
    </div>                                    
    <div class="form-item btn-register-submit">
        <label for="">Imagen<span>*</span></label>
        <input id="file" name="userfile" type="file" value="<?php echo $imagen;?>">     
    </div>
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-pagina" value="Registrar">
    </div>    

</form> 
<script type="text/javascript">
   /* $('#submit-pagina').click(function(){
        envioFormulario('pagina', 'response');
        return false;
    });*/
   
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