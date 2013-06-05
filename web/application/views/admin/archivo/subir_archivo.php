<form id="archivo" method="post" action="<?php echo site_url('archivo/control_archivo/subirarchivo')?>"  enctype="multipart/form-data">        
    <div class="form-item field-idgaleria">
        <label for="">Galeria<span>*</span></label>        
        <span class="wrapper-select">
            <?php echo $galeria?>
        </span>
    </div>                               
    <div class="form-item field-idgaleria">
        <label for="">Titulo<span>*</span></label>
        <input type="hidden" name="idimagen" id="idimagen" value="<?php echo $idimagen?>">
        <input type="hidden" name="idgaleria" id="idgaleria" value="<?php echo $id?>">
        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo?>">
    </div>                               
    <div class="form-item field-idgaleria">
        <label for="">Texto alt<span>*</span></label>        
        <input type="text" name="text_alt" id="txtalt" value="<?php echo $text_alt?>">
    </div>                                                 
    <div class="form-item field-idgaleria">
        <label for="">Archivo<span>*</span></label>        
        <input type="file" name="archivo" id="file" value="<?php echo $file?>">
    </div>                                                          
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-archivo" value="Registrar">
    </div> 
    <div id="up">
     <?php echo $upload?>
    </div>
   
</form> 
<script type="text/javascript">  
       
    $('#select-galeria').change(function(){
        var txt = $(this).attr('value');
        $('#idgaleria').attr('value', txt) ;
    });
    $('#titulo').click(function(){
        $('#select-galeria').change();
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