<form id="new-form-person" method="post" action="<?php echo site_url('usuario/usuario/crearUsuario')?>" >
    <div class="form-item field-mail">
        <label for="">Correo electronico<span>*</span></label>
        <input type="hidden" name="id" id="id_user" value="<?php echo $id;?>">
        <input type="text" name="mail" id="mail" class="input" value="<?php echo $mail;?>">
    </div>
    <div class="form-item field-nombre">
        <label for="">Nombre completo<span>*</span></label>
        <input type="text" name="nombre" id="nombre" class="input" value="<?php echo $nombre;?>">
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
    
    <div class="form-item btn-register-submit" id="reto">
    </div>
</form> 
<script type="text/javascript">
    $('#mail').change(function(){        
       validarExisteMail("usuario/usuario/validarmail/","new-form-person"); 
    });
    $("#new-form-person").submit(function(){
       return validar_new_user();
    });
</script>