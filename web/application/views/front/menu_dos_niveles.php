 <nav id="block-main-menu" class="block block-menu">
                  <div class="content">
                      <ul class="main-menu item-list"> 
                      <?php                       
                    //  echo "<pre>".print_r($lista,true)."</pre>";                   
                      $con =1;
                      $exanded="";
                      foreach ($lista as  $value){
                          
                          $tamano = sizeof($pagina[$value->nombre]);
                          if($tamano>0)
                              $exanded = " expanded";
                          else
                              $exanded="";
                          if($value->idioma==1){                              
                              
                          ?>
                          <li id="<?php echo "menu-".$value->slu_seccion?>" class="<?php echo 'menu-item'.$exanded?>"><a href="<?php echo site_url().'flp/page/es/'.$value->slu_seccion?>" ><?php echo $value->nombre?></a>
                              <ul>
                                  <?php
                                                            foreach ($pagina[$value->nombre] as $val) {
                                                                ?> 
                                  <li id="<?php echo "menu-".$val->slu?>" class="menu-item"><a href="<?php echo site_url().'flp/page/es/'.$value->slu_seccion.'/'.$val->slu?>" ><?php echo $val->titulo?></a></li>
                                                             <?php
                                                            }
                                  ?>
                              </ul>
                          </li>  
                      <?php }else{
                          ?>
                          <li id="<?php echo "menu-".$value->slu_seccion?>" class="<?php echo 'menu-item'.$exanded?>"><a href="<?php echo site_url().'flp/page/en/'.$value->slu_seccion?>" ><?php echo $value->nombre?></a>
                               <ul>
                                  <?php
                                                            foreach ($pagina[$value->nombre] as $val) {
                                                                ?> 
                                  <li id="<?php echo "menu-".$val->slu?>" class="menu-item"><a href="<?php echo site_url().'flp/page/es/'.$value->slu_seccion.'/'.$val->slu?>" ><?php echo $val->titulo?></a></li>
                                                             <?php
                                                            }
                                  ?>
                              </ul>
                          </li>  
                          <?php
                      }
                      }
                      ?>                   
                      </ul>
                  </div> <!-- /.content -->
</nav> <!--/.block -->  