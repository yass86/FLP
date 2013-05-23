<div id="editar-seccion">
    <h2>NUEVA PAGINA</h2>
    <div class="form-item field-idioma">
        <label for="">Idioma<span></span></label>
       <?php echo $idioma;?>
    </div>
    <div class="form-item field-nombre">
        <label for="">Nombre Seccion<span></span></label>
        <div id="sec"><select name="seccion"></select></div>
    </div>  
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-login" value="Crear">
    </div>
</div>
<div id="zona-edit-seccion">
    
</div>
<script type="text/javascript">
    urlbase = $('body').attr('dir');
    var ido = $('.select-idioma').attr('value');
    getHtmlPlano("sec","seccion/seccion/getSeccion/"+ido);
   
    $('.select-idioma').live('change',function(){
         var ido = $(this).attr('value');
         getHtmlPlano("sec","seccion/seccion/getSeccion/"+ido);
    });
    $('#select-seccion').live('change',function(){
        $('#zona-edit-seccion').html("");
    });
    $('#submit-login').click(function(){      
        var ids=$('#select-seccion').attr('value');
        getHtmlPlano("zona-edit-seccion","pagina/pagina/pagina_nueva/"+ids);
    });
</script>