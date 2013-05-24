<nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                      <ul class="main-menu items-list level-one"> 
                      <?php                       
                    //  echo "<pre>".print_r($lista,true)."</pre>";                   
                      $con =1;
                      foreach ($lista as $key => $value){                          
                          ?>
                          <li class="item-menu expanded"><a href="#" ><?php echo $key?></a>
                           <ul class="main-menu items-list level-one"> 
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

