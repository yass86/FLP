<nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                    <ul class="main-menu item-list level-one"> 
                        
                        <?php
                        $cont=0;
                        foreach ($lista as $value) {
                        ?>
                        <li id ="<?php echo $value."_".$cont; $cont++;?>" class="first menu-item"><a class="" href="/"><?php echo $value?></a></li> 
                        <?php
                        }
                        ?>
                   </ul>  
                  </div> <!-- /.content -->
</nav> <!--/.block -->  