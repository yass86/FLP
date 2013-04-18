        <?php 
       
        foreach ($lista as $value) {
            ?>
        <tr id="<?php echo "f_".$value->IDRecordValue?>" class="normal">
            <td class="borrar" lang="<?php echo $value->IDRecordValue?>"></td> 
            <td class="idcampo"><?php echo $value->IDRecordValue?></td> 
            <td class="notacampo"><input class="nparcial" type="text" id="Description" lang="<?php echo $value->IDRecordValue?>" value="<?php echo $value->Description?>"></td>
        </tr>
        <?php
       
        }?>


