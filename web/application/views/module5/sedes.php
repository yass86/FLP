<fieldset class="formulario">
    <legend>SEDES</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/sedes')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>ID</td>
            <td>CODIGO DANE</td>
            <td>NOMBRE</td>
            <td>TIPO</td>
            <td>CIUDAD</td>
            <td>DIRECCION</td>
            <td>TELEFONO</td>
            <td>RECTOR</td>
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 
         
            foreach ($lista as $value) {
                $value->Name = str_replace("%20", " ", $value->Name);
                $value->Address = str_replace("%20", " ", $value->Address);
                $value->Telephone = str_replace("%20", " ", $value->Telephone);
                ?>
            <tr class="fila" id="<?php echo $value->IDEstablishment?>">
                <td><div class="borrar" lang="<?php echo $value->IDEstablishment?>"></div></td>
                <td><input class="edit id" type="text" id="IDEstablishment" lang="<?php echo $value->IDEstablishment?>" readonly=""  value="<?php echo $value->IDEstablishment?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDEstablishment?>" id="Code"  value="<?php echo $value->Code?>"/></td>
                    <td><input class="edit nombre" type="text" lang="<?php echo $value->IDEstablishment?>" id="Name"  value="<?php echo $value->Name?>"/></td>
                <td>
                    <?php if($value->Type=="1"){?>
                    <select class="edit" lang="<?php echo $value->IDEstablishment?>" name="Type" id="Type">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                    <?php }else{?>
                    <select class="edit" lang="<?php echo $value->IDEstablishment?>" name="Type" id="Type">
                         <option value="0">INACTIVO</option>
                        <option value="1">ACTIVO</option>
                       
                    </select>
                    <?php }?>
                </td>
                <td><input class="edit" lang="<?php echo $value->IDEstablishment?>" type="text" id="City" value="<?php echo $value->City?>"/></td>
                <td><input class="edit" lang="<?php echo $value->IDEstablishment?>" type="text" id="Address"  value="<?php echo $value->Address?>"/></td>
                <td><input class="edit" lang="<?php echo $value->IDEstablishment?>" type="text" id="Telephone"  value="<?php echo $value->Telephone?>"/></td>
                <td><input class="edit" lang="<?php echo $value->IDEstablishment?>" type="text" id="Director"  value="<?php echo $value->Director?>"/></td>
                    
                    </tr>
            <?php
             }
            ?>
        </tbody>
        <tfoot>
            <tr class="inputsedes">
                <td></td>
                <td></td>
                <td><input type="text" id="dane" name="Code"/></td>
                <td><input type="text" id="nombre" name="Name"/></td>
                <td>
                    <select name="Type" id="tipo">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                </td>
                <td><input type="text" id="ciudad" name="City"/></td>
                <td><input type="text" id="direccion" name="Address"/></td>
                <td><input type="text" id="telefono" name="Telephone"/></td>
                <td><input type="text" id="rector" name="Director"/></td>
            </tr>
            <tr>
                <td ><input type="button" class="boton" value="AGREGAR"/></td>
                
            </tr>
        </tfoot>
    </table>
    </form>
</fieldset>
<script type="text/javascript">
    $('.boton').click(function(){
        var v1=$("#dane").attr("value");
        var v2=$("#nombre").attr("value");
        var v3=$("#tipo").attr("value");
        var v4=$("#ciudad").attr("value");
        var v5=$("#direccion").attr("value");
        var v6=$("#telefono").attr("value");
        var v7=$("#rector").attr("value");
        
        $("#cutabla").append(crearLineaSede(v1, v2, v3, v4, v5, v6, v7));
         getHtml("contenido", "inicio/ir/sedes");
    })
    $(".fila").live("click",function(){
       
    })
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR SEDE ?"))
        {
            getHtml("mensaje", "module1/deleteEstablishment/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             getHtml("contenido", "inicio/ir/sedes");
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
        campo = campo.replace("1","");
        getHtml("", "module1/updateEstablishmentField/"+campo+"/"+valor+"/"+id);
        alert("CAMPO ACTUALIZADO");
    })
</script>