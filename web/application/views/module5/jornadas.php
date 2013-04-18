<fieldset class="formulario">
    <legend>JORNADAS</legend>
    <form id="form" method="post" action="<?php echo site_url('module1/sedes')?>">
    <table class="tabalasedes">
        <thead>
            <tr>
            <td>ELIMINAR</td>
            <td>ID</td>
            <td>ETIQUETA</td>
            <td>NOMBRE</td>
            <td>HORAS</td>
            <td>HORA INICIO</td>
            <td>HORA FINAL</td>
            <td>ESTADO</td>
            <td>DIAS</td>
            
            </tr>
        </thead>
        <tbody id="cutabla">
            <?php 

            foreach ($lista as $value) {
                $value->Name = str_replace("%20", " ", $value->Name);
             
                ?>
            <tr class="fila" id="<?php echo $value->IDSchedule?>">
                <td><div class="borrar" lang="<?php echo $value->IDSchedule?>"></div></td>
                <td><input class="edit campoid" type="text" id="IDSchedule" lang="<?php echo $value->IDSchedule?>" readonly=""  value="<?php echo $value->IDSchedule?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDSchedule?>" id="Code"  value="<?php echo $value->Code?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDSchedule?>" id="Name"  value="<?php echo $value->Name?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDSchedule?>" id="DailyHours"  value="<?php echo $value->DailyHours?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDSchedule?>" id="InitHour"  value="<?php echo $value->InitHour?>"/></td>
                    <td><input class="edit" type="text" lang="<?php echo $value->IDSchedule?>" id="EndingHour"  value="<?php echo $value->EndingHour?>"/></td>
                    <td>
                         <?php if($value->Type=="1"){?>
                        <select class="edit"  id="Type"  lang="<?php echo $value->IDSchedule;?>" dir="<?php echo $value->Type;?>">
                            <option value="1">POR APROBAR</option>
                            <option value="2">LEGALIZADO</option>
                            <option value="3">CIERRE TEMPORAL</option>
                            <option value="4">CIERRE DEFINITIVO</option>
                        </select>
                        <?php }else if($value->Type=="2"){?>
                         <select class="edit"  id="Type"  lang="<?php echo $value->IDSchedule;?>" dir="<?php echo $value->Type;?>">
                            <option value="2">LEGALIZADO</option>
                             <option value="1">POR APROBAR</option>                           
                            <option value="3">CIERRE TEMPORAL</option>
                            <option value="4">CIERRE DEFINITIVO</option>
                        </select>
                        <?php }else if($value->Type=="3"){?>
                         <select class="edit"  id="Type"  lang="<?php echo $value->IDSchedule;?>" dir="<?php echo $value->Type;?>">
                            <option value="3">CIERRE TEMPORAL</option>
                             <option value="1">POR APROBAR</option>
                            <option value="2">LEGALIZADO</option>                            
                            <option value="4">CIERRE DEFINITIVO</option>
                        </select>
                        <?php } else{?>
                         <select class="edit"  id="Type"  lang="<?php echo $value->IDSchedule;?>" dir="<?php echo $value->Type;?>">
                            <option value="4">CIERRE DEFINITIVO</option>
                             <option value="1">POR APROBAR</option>
                            <option value="2">LEGALIZADO</option>
                            <option value="3">CIERRE TEMPORAL</option>                            
                        </select>
                        <?php }?>
                       </td>
                    <td >
                        <input  class="edit" id="Day1" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day1==1)echo "0";else echo "1";?>" <?php  if($value->Day1==1)echo "checked";?> />
                        <input  class="edit" id="Day2" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day2==1)echo "0";else echo "1";?>" <?php  if($value->Day2==1)echo "checked";?> />
                        <input  class="edit" id="Day3" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day3==1)echo "0";else echo "1";?>" <?php  if($value->Day3==1)echo "checked";?> />
                        <input  class="edit" id="Day4" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day4==1)echo "0";else echo "1";?>" <?php  if($value->Day4==1)echo "checked";?> />
                        <input  class="edit" id="Day5" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day5==1)echo "0";else echo "1";?>" <?php  if($value->Day5==1)echo "checked";?> />
                        <input  class="edit" id="Day6" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day6==1)echo "0";else echo "1";?>" <?php  if($value->Day6==1)echo "checked";?> />
                        <input  class="edit" id="Day7" lang="<?php echo $value->IDSchedule?>" type="checkbox" value="<?php if($value->Day7==1)echo "0";else echo "1";?>"  <?php  if($value->Day7==1)echo "checked";?>/>
                    </td>
                    </tr>
            <?php
             }
            ?>
        </tbody>
        <tfoot>
            <tr class="inputsedes">
                <td></td>
                <td></td>
                <td><input type="text" id="etiqueta" name="Code"/></td>
                <td><input type="text" id="nombre" name="Name"/></td>               
                <td><input type="text" id="DailyHours" name="DailyHours"/></td>               
                <td><input type="text" id="horai" name="InitHour"/></td>
                <td><input type="text" id="horaf" name="EndingHour"/></td>
                <td>
                  
                   
                    <select type="text" id="estado" name="Type">
                            <option value="1">POR APROBAR</option>
                            <option value="2">LEGALIZADO</option>
                            <option value="3">CIERRE TEMPORAL</option>
                            <option value="4">CIERRE DEFINITIVO</option>
                        </select>
                </td>
                <td>
                   
                    <table>
                        <tr>
                            <td>L</td>
                            <td>M</td>
                            <td>M</td>
                            <td>J</td>
                            <td>V</td>
                            <td>S</td>
                            <td>D</td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" class="dias" name="Day1"/></td>
                            <td> <input type="checkbox" class="dias" name="Day2"/></td>
                            <td> <input type="checkbox" class="dias" name="Day3"/></td>
                            <td> <input type="checkbox" class="dias" name="Day4"/></td>
                            <td> <input type="checkbox" class="dias" name="Day5"/></td>
                            <td> <input type="checkbox" class="dias" name="Day6"/></td>
                            <td> <input type="checkbox" class="dias" name="Day7"/></td>
                            
                        </tr>
                    </table>
                </td>
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
        var v1=$("#etiqueta").attr("value");
        var v2=$("#nombre").attr("value");
        var v3=$("#horai").attr("value");
        var v4=$("#horaf").attr("value");
        var v5=$("#estado").attr("value");
        var v6=$("#Day1").attr("value");
        var v7=$("#Day2").attr("value");
        var v8=$("#Day3").attr("value");
        var v9=$("#Day4").attr("value");
        var v10=$("#Day5").attr("value");
        var v11=$("#Day6").attr("value");
        var v12=$("#Day7").attr("value");
        
        crearLineaJornada();
         getHtml("contenido", "inicio/ir/jornadas");
    })
    $(".fila").live("click",function(){
       
    })
    $(".borrar").click(function(){
         var fil = $(this).attr("lang");
        if(confirm("ELIMINAR SEDE ?"))
        {
            getHtml("mensaje", "module1/deleteSchedule/"+fil);
            $("#"+fil).remove();
           
        }
        else
            {}
             getHtml("contenido", "inicio/ir/jornadas");
    })
    $(".edit").change(function(){
        var campo = $(this).attr("id");
        var valor = $(this).attr("value");
        var id = $(this).attr("lang");
      //  campo = campo.replace("1","");
        getHtml("", "module1/updateScheduleField/"+campo+"/"+valor+"/"+id);
        //alert("CAMPO ACTUALIZADO");
    })
</script>