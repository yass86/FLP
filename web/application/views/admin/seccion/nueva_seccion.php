<h2 id="titulo-seccion"><?php echo $titulo?></h2>
<form id="new-form-seccion" method="post" action="<?php echo site_url('seccion/seccion/registrarSeccion')?>" >
    <div class="form-item field-idioma">
        <label for="">Idioma<span>*</span></label>
       <?php echo $idioma;?>
    </div>  
    <div class="form-item field-nombre">
        <label for="">Nombre Seccion<span>*</span></label>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="text" name="nombre" id="nombre" class="input" value="<?php echo $nombre;?>">
    </div>                             
    <div class="form-item field-slu">
        <label for="">slu (url)<span>*</span></label>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="text" name="slu" id="nombre" class="input" value="<?php echo $slu;?>">
    </div>                             
      
    <div class="form-item btn-register-submit">
        <input type="submit" class="" name="" id="submit-login" value="Registrar">
    </div>
    
    <div class="form-item btn-register-submit" id="reto">
    </div>
</form> 
<script type="text/javascript">    
    $("#new-form-seccion").submit(function(){
       
    });
</script>