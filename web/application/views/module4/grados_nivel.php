<fieldset class="formulario">
    <legend>NIVELES</legend>
    <table class="tabalasedes">
        <thead>
            <tr>
                <th></th>
                <td>ID</td>
                <td>CODIGO</td>
                <td>NOMBRE</td>
            </tr>
        </thead>
        <body>
            <?php foreach ($niveles as $value) {
                $value->Name = str_replace("%20", " ", $value->Name);
            ?>
            <tr >
                <td><div class="editar" id="<?php echo $value->IDLevel;?>" dir="<?php echo $value->Name?>"></div></td>
                <td><?php echo $value->IDLevel;?></td>
                <td><?php echo $value->Code;?></td>
                <td><?php echo $value->Name;?></td>
            </tr>
            <?php
            }?>
        </body>
    </table>
</fieldset>
<fieldset class="formulario" id="grados">
    
</fieldset>
<fieldset class="formulario" id="asignatura">
    
</fieldset>
<fieldset class="formulario" id="subasignatura">
    
</fieldset>
<script type="text/javascript">
    $(".editar").click(function(){
        var nivel = $(this).attr("id");
        var titulo = $(this).attr("dir");
       
        getHtml("grados", "complemento/getGrados/"+nivel+"/"+titulo);
    })
</script>