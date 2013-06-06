<div id="editar-seccion">
    <h2>NUEVO SLIDE</h2>
    <div class="form-item field-idioma">
        <label for="">Idioma<span></span></label>
        <span class="wrapper-select"> <?php echo $idioma;?></span>
    </div>
    <div class="form-item field-nombre">
        <label for="">Nombre Seccion<span></span></label>       
        <span id="sec" class="wrapper-select"><select name="seccion"></select></span>            
    </div>  
    <div class="form-item btn-busqueda">
        <input type="button" class="" name="" id="submit-login" value="Crear">
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
        getHtmlPlano("zona-edit-seccion","slide/slide/bloquenuevo/"+ids);
    });
   
</script>