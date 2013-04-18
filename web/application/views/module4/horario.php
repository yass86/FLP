<fieldset class="formulario">
    <legend>HORARIO DE CLASES</legend>
    <table class="tabalasedes">
        <tr>
            <td>PROGRAMA</td>
            <td><?php echo $programas?></td>
        </tr>
        <tr>
            <td>GRUPO</td>
            <td id="idgrupo"></td>
        </tr>
    </table>
    <div id="showhorario">
        
  
    <table class="tabalasedes">
        <thead>
            <tr>
                <td>BLOQUE</td>
                <td>LUNES</td>
                <td>MARTES</td>
                <td>MIERCOLES</td>
                <td>JUEVES</td>
                <td>VIERNES</td>
                <td>SABADO</td>
                <td>DOMINGO</td>
            </tr>
        </thead>
        <tbody>
          <?php 
          $fila=0;
          $colu=0;
          while ($fila<8)
          {
              ?>
            <tr>
                  <td class="bloquetext"><?php echo "HORA ".($fila+1);?></td>
                <?php 
                $colu=0;
                  while ($colu<7)
                  {
                     ?>
                        <td class="bloque" id="<?php echo "dia_".$fila."_".$colu?>"></td>
                    <?php 
                $colu++;
                  }
                ?>
            </tr>
            <?php
            $fila++;
          }
          ?>
        </tbody>
    </table>
          </div>
</fieldset>
<fieldset class="formulario" id="conf_bloque">
    <legend>CONFIGURACION BLOQUE</legend>
    <form id="formbloque" action="<?php echo site_url()?>" method="post">
        <input type="hidden" name="Day" id="Day"/>
        <input type="hidden" name="Hour" id="Hour"/>
        <input type="hidden" name="IDLevel" id="IDLevel"/>
        <input type="hidden" name="IDMatter" id="IDMatter"/>
        <input type="hidden" name="IDTeacher" id="IDTeacher"/>
        <input type="hidden" name="IDGroup" id="IDGroup"/>
        <input type="hidden" name="reto" id="reto"/>
        <table class="tabalasedes">
            <tr>
                <td>MATERIA</td>
                <td id="materias"></td>
            </tr>
            <tr>
                <td>PROFESOR</td>
                <td><?php echo $profesores?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="AGREGAR" class="boton" id="agregarBloque"/></td>
            </tr>
        </table>
        
    </form>
</fieldset>
<script type="text/javascript">
    $("#conf_bloque").hide();
    $(".bloque").click(function(){
        var index = $(this).attr("id");
        var reto = index;
        index = index.split("_");
        var bloque = index[1];
        var dia = index[2];
        var grupo = $("#idgroupa").attr("value");       
        var profesor = $("#profesor").attr("value");
        $("#reto").attr("value",reto);
        $("#Hour").attr("value",bloque);
        $("#Day").attr("value",dia);
        $("#IDGroup").attr("value",grupo);
        $("#IDTeacher").attr("value",profesor);
        $(".bloque").attr("class","bloque");
        $(".bloquesel").attr("class","bloque");
        $(this).attr("class","bloquesel");
       
        $("#conf_bloque").show();
    });
    $("#idgroupa").live("change",function(){
        var IDLev = $(this).attr("value");
         var grupo = $("#idgroupa").attr("value");
         $("#IDGroup").attr("value",grupo);
         $("#IDLevel").attr("value",IDLev);
          getHtml("materias", "inicio/armarSelectoresMateria/"+grupo);
          getHoraryCell($("#IDGroup").attr("value"));
    });
    $("#IDMatter").live("change",function(){
        var IDMAtt = $(this).attr("value");
         $("#IDMatter").attr("value",IDMAtt);
         
    });
    
    $("#IDProgram").change(function(){
        var pro = $(this).attr("value");
        $("#IDProgramc").attr("value",pro);
        getHtml("idgrupo", "inicio/getGruposAcademicos/"+pro);
    });
    $("#profesor").change(function(){
        var pro = $(this).attr("value");
        $("#IDTeacher").attr("value",pro);       
    });
    $("#agregarBloque").click(function(){
        getHtmlHorario($("#reto").attr("value"), "module1/insertHorary","formbloque");
    });
</script>