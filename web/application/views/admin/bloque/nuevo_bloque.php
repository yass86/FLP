<form id="pagina" method="post" action="<?php echo site_url('bloque/bloque/registrar_bloque') ?>"  enctype="multipart/form-data">

    <div id="response">

    </div>
    <div class="form-item field-titulo">
        <label for="">Titulo<span>*</span></label>
        <input type="hidden" name="id"  value="<?php echo $id; ?>">
        <input type="hidden" name="seccion" value="<?php echo $seccion ?>">
        <input type="text" name="titulo" id="titulo" class="input" value="<?php echo $titulo; ?>">
    </div>                                                                                   
    <div class="form-item field-cont-wisi">
        <label for="">Contenido<span>*</span></label>
        <textarea name="contenido"><?php echo $contenido; ?></textarea>
    </div> 
    <div class="form-item field-txt-boton">
        <label for="">Texto Boton<span>*</span></label>
        <input type="text" name="txtboton" id="titulo" class="input" value="<?php echo $txtboton; ?>">
    </div>  
    <div class="form-item field-txt-boton">
        <label for="">Url Boton<span>*</span></label>
        <input type="text" name="urlboton" id="titulo" class="input" value="<?php echo $urlboton; ?>">
    </div>  
    <div class="form-item btn-register-submit">
        <label for="">Imagen<span>*</span></label>
        <input id="file" name="archivo" type="file" value="<?php echo $imagen; ?>">     
    </div>
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-pagina" value="Registrar">
    </div>    

</form> 
<script type="text/javascript">
    tinyMCE.init({
        mode: "textareas",
// ===========================================
// !!! [DO NOT FORGET TO SET THEME TO ADVANCED]
// ===========================================
        theme: "advanced",
// ===========================================
// !!! [DO NOT FORGET TO INCLUDE THE PLUGIN]
// ===========================================

        plugins: "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
// ===========================================
// !!! [DO NOT FORGET TO SET LANGUAGE TO EN]
// ===========================================
// Otherwise, you'll need to use plugin translation file

        language: "en",
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
// ===========================================
// !!! [DO NOT FORGET TO INCLUDE PLUGIN'S BUTTON]
// ===========================================

        theme_advanced_buttons4: "jbimages,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
// ===========================================
// !!! [DO NOT FORGET TO SET RELATIVE URL FALSE]
// ===========================================
// This is required to images display properly

        relative_urls: false
    });

</script>
</script>