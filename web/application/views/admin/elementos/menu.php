<nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                      <ul class="main-menu item-list"> 
                      <?php                                           
                      $con =1;
                      foreach ($lista as $key => $value){                          
                          ?>
                          <li class="menu-item"><a href="#" ><?php echo $key?></a>
                           <ul class=""> 
                           <?php foreach ($value as $val) 
                            { ?>
                                 <li id ="<?php echo $val->nombre;?>" class="item-list">
                                     <a class="" href="<?php echo site_url().$val->url?>"><?php echo $val->descripcion?></a>
                                 </li>                          
                           <?php }?>
                           </ul>
                        </li>  
                      <?php
                      }
                      ?>                   
                      </ul>
                  </div> <!-- /.content -->
</nav> <!--/.block -->  

