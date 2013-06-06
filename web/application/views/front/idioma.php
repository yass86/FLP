<nav id="block-idioma-menu" class="block block-menu">
                  <div class="content">
                    <ul class="item-list"> 
                        <?php if($idioma == "en"){?>
                        <li id ="menu-eng" class="first menu-item"><a  class="active" href="<?php echo site_url('flp/page/en')?>">ENG</a></li> 
                        <li id ="menu-esp" class="last menu-item"><a  href="<?php echo site_url('flp/page/es')?>">ESP</a></li>
                        <?php } else{?>
                        <li id ="menu-eng" class="first menu-item"><a   href="<?php echo site_url('flp/page/en')?>">ENG</a></li> 
                        <li id ="menu-esp" class="last menu-item"><a  class="active" href="<?php echo site_url('flp/page/es')?>">ESP</a></li>
                        <?php }?>
                    </ul>  
                   </div> <!-- /.content -->
                </nav> <!--/.block -->