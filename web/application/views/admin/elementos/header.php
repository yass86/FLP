<header id="header">
     <div id="header-first" class="section-wrapper">
            <div class="section">
              <div class="section-inner clearfix">                   
                <div class="block" id="block-logo">
                    <div class="content">
                        <a id="logo" rel="home" title="Inicio" href="<?php echo site_url()?>">
                            <img alt="" src="<?php echo site_url('theme/images/logo.png')?>"/>
                        </a>  
                    </div> <!-- /.content -->
              </div>         
              </div> <!-- /.section-inner-->
          </div> <!--/.section --> 
        </div> <!-- /.section-wrapper-->
          <div id="header-second" class="section-wrapper">
            <div class="section">
              <div class="section-inner clearfix">                   
               <?php echo $usr;?>              
               <?php echo $menu;?>              
              </div> <!-- /.section-inner-->
          </div> <!--/.section --> 
        </div> <!-- /.section-wrapper-->
</header> <!-- /#header -->  