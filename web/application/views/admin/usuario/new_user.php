<form id="new-form-person" method="post" action="<?php echo site_url('usuario/crearUsuario')?>" >
    <div class="form-item field-mail">
        <label for="">Correo electronico<span>*</span></label>
        <input type="text" name="mail" id="mail" class="input" value="">
    </div>
    <div class="form-item field-nombre">
        <label for="">Nombre completo<span>*</span></label>
        <input type="text" name="nombre" id="nombre" class="input" value="">
    </div>                             
    <div class="form-item field-password">
        <label for="">Contraseña<span>*</span></label>
        <input type="password" name="pwd" id="pwd" class="input" value="">
    </div>
    <div class="form-item field-password">
        <label for=""> Repetir Contraseña<span>*</span></label>
        <input type="password" name="pwd1" id="pwd1" class="input" value="">
    </div>
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-login" value="Registrar">
    </div>
</form> 
<script type="text/javascript">
    $('#mail').change(function(){
        var mail = $('#mail').attr('value');
        mail = mail.replace("@","_");
       validarExisteMail("usuario/validarmail/","new-form-person"); 
    });
</script>