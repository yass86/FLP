 <div id="cerrar">X</div> 
       <form id="newestudiante"  action="<?php echo site_url()?>" method="post" enctype="multipart/form-data">                            
                            <table class="tabla_registro">
                                <input type="hidden" id="IDAccount" name="IDAccount" value="<?php echo $IDAccount?>"/>
                                <input type="hidden" id="IDInstitute" name="IDInstitute" value="<?php echo $IDInstitute?>"/>
                               
                                <tr><td><h3>TIPO IDENTIFICACION</h3></td> <td><?php echo $tipodoc;?></td></tr>
                                <tr><td><h3>NUMERO DE IDENTIFICACION</h3></td> <td><input type="text" id="Nit" name="Nit" value="<?php echo $Nit?>" readonly=""/></td></tr>
                                <tr><td><h3>NOMBRE</h3></td> <td><input type="text" name="Name" value="<?php echo $Name?>"/></td></tr>
                                <tr><td><h3>APELLIDO</h3></td> <td><input type="text" name="Surname" value="<?php echo $Surname?>"/></td></tr>
                                <tr><td><h3>TELEFONO</h3></td> <td><input type="text" name="Telephone" value="<?php echo $Telephone?>"/></td></tr>
                                <tr><td><h3>DIRECCION</h3></td> <td><input type="text" name="Address" value="<?php echo $Address?>"/></td></tr>
                                <tr><td><h3>CORREO</h3></td> <td><input type="text" name="Mail" value="<?php echo $Mail?>"/></td></tr>
                                <tr><td><h3>FOTO</h3></td> <td><input type="file" name="userfile[]" value=""/></td></tr>
                                <tr><td colspan="2"><input type="button" value="CREAR" id="gest" class="boton"/></td></tr>
                            </table>
                        
        </form>