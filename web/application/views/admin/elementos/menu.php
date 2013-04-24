<nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                      <ul class="admin-menu items-menu level-one"> 
                      <?php                       
                    //  echo "<pre>".print_r($lista,true)."</pre>";                   
                      foreach ($lista as $key => $value){                          
                          ?>
                          <li class="item-menu expanded"><span><?php echo $key?></span>
                           <ul class="main-menu items-menu level-one"> 
                           <?php foreach ($value as $val) 
                            { ?>
                                 <li id ="<?php echo $val->nombre;?>" class="first item-menu">
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

