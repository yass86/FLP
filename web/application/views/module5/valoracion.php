<fieldset class="formulario" >
    <legend>ESCALAS DE CALIFICACION</legend>
     <form enctype="multipart/form-data" id="form" method="post" action="<?php echo site_url('module1/insertValuationScale')?>">
         <table class="escala_valoracion">
             <tr>
                 <td></td>
                 <td class="sombra">Desempeño Superior</td>
                 <td class="sombra">Desempeño Alto</td>
                 <td class="sombra">Desempeño Basico</td>
                 <td class="sombra">Desempeño Bajo</td>
             </tr>
             <tr>
                 <td class="sombra">Calificacion numerica</td>
                 <td><input type="text" id="TopScale" name="TopScale" value="<?php echo $TopScale?>"/></td>                 
                 <td><input type="text" id="HighScale" name="HighScale" value="<?php echo $HighScale?>"/></td>                 
                 <td><input type="text" id="BasicScale" name="BasicScale" value="<?php echo $BasicScale?>"/></td>                 
                 <td><input type="text" id="LowScale" name="LowScale" value="<?php echo $LowScale?>"/></td>                 
             </tr>
             <tr>
                 <td class="sombra">Calificacion por letras</td>
                 <td><input type="text" id="TopLetter" name="TopLetter" value="<?php echo $TopLetter?>"/></td>
                 <td><input type="text" id="HighLetter" name="HighLetter" value="<?php echo $HighLetter?>"/></td>
                 <td><input type="text" id="BasicLetter" name="BasicLetter" value="<?php echo $BasicLetter?>"/></td>
                 <td><input type="text" id="LowLetter" name="LowLetter" value="<?php echo $LowLetter?>"/></td>
             </tr>
              <tr>
                 <td colspan="5"><h2>Calificacion por imagen</h2></td>
             </tr>
             <tr>
                 <td></td>
                 <td><h2>Superior</h2></td>
                 <td><h2>Alto</h2></td>
             </tr>
             <tr>
                 <td class="sombra">Vista previa</td>
                 <td colspan="2" id="img1"><img src="<?php echo site_url().$TopImage;?>" width="50" height="50"/></td>
                 <td colspan="2" id="img2"><img src="<?php echo site_url().$HighImage;?>" width="50" height="50"/></td>                
             </tr>
            
             <tr>
                 <td class="sombra"></td>
                 <td colspan="2"> <input name="userfile[]" type="file" /></td>
                 <td colspan="2"> <input name="userfile[]" type="file" /></td>                 
             </tr>
             <tr>
                 <td></td>
                 <td><h2>Medio</h2></td>
                 <td><h2>Bajo</h2></td>
             </tr>
             <tr>
                 <td class="sombra">Vista previa</td>
                 
                 <td colspan="2" id="img3"><img src="<?php echo site_url().$BasicImage;?>" width="50" height="50"/></td>
                 <td colspan="2" id="img4"><img src="<?php echo site_url().$LowImage;?>" width="50" height="50"/></td>

             </tr>
             <tr>
                 <td class="sombra"></td>
              
                 <td colspan="2"> <input name="userfile[]" type="file" /></td>
                 <td colspan="2"> <input name="userfile[]" type="file" /></td>
   
             </tr>
             
             <tr>
                 <td colspan="1"><input type="submit" value="ACTUALIZAR" class="boton"/></td>
                 <td colspan="4"></td>
             </tr>
         </table>
    </form>
</fieldset>
<script type="text/javascript">
    $(".boton").click(function(){
        if(confirm("ACTUALIZAR SISTEMA DE CALIFICAION"))
            {
             //  getHtmlFormulario("contenido", "module1/insertValuationScale");
                
            }
            else
                return false;
    });
</script>