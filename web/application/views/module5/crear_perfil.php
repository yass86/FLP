<fieldset class="formulario">
    <legend>CREAR PERFIL</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/editInstitute')?>">
        <table class="tablaperfil">
            <tr>
                <td>Codigo Dane</td>
                <td><input type="hidden" value="<?php echo $id;?>" name="id"/><input  type="text" name="dane" value="<?php echo $dane;?>"/></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input  type="text" name="nombre" value="<?php echo $nombre;?>"/></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td><select name="tipo">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select></td>
            </tr>
            <tr>
                <td>Tercero</td>
                <td><input  type="text" name="tercero" value="<?php echo $tercero;?>"/></td>
            </tr>
            <tr>
                <td>Año</td>
                <td><input type="text" name="Year" value="<?php echo $ano;?>"/></td>
            </tr>
            <tr>
                
                <td>Periodo</td>
                 <td>   <?php echo $periodo?>
                </td>
            </tr>
            <tr>
                <td colspan="1"><input type="button" class="boton" value="REGISTRAR"/></td>
                <td></td>
            </tr>
        </table>
        
    </form>
</fieldset>
<script type="text/javascript">
    $(".boton").click(function(){
        alert("enviando datos");
        getHtmlFormulario("form", "module1/editInstitute") 
    });
</script>
