 <nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                      <ul class="main-menu item-list"> 
                      <?php                       
                    //  echo "<pre>".print_r($lista,true)."</pre>";                   
                      $con =1;
                      foreach ($lista as  $value){ 
                          if($value->idioma==1){
                          ?>
                          <li id="<?php echo "menu-".$value->slu_seccion?>" class="menu-item"><a href="<?php echo site_url().'flp/page/es/'.$value->slu_seccion?>" ><?php echo $value->nombre?></a></li>  
                      <?php }else{
                          ?>
                          <li id="<?php echo "menu-".$value->slu_seccion?>" class="menu-item"><a href="<?php echo site_url().'flp/page/en/'.$value->slu_seccion?>" ><?php echo $value->nombre?></a></li>  
                          <?php
                      }
                      }
                      ?>                   
                      </ul>
                  </div> <!-- /.content -->
</nav> <!--/.block -->  