 <div id="preface">
          <div id="preface-first" class="section-wrapper">
            <div class="section">
              <div class="section-inner clearfix">
                <div id="block-breadcrumbs" class="block">
                  <?php echo $slu;?>
                </div>
              </div> <!-- /.section-inner-->
          </div> <!--/.section --> 
        </div> <!-- /.preface-first-->
      </div> <!-- /#preface -->  
      
       <div id="main">
        <div id="main-inner" class="section-wrapper">
            <div class="section">
              <div class="section-inner clearfix">
                <section id="content">
                  <div class="section-inner clearfix">
                    <h1>Frutas y vegetales</h1> 
                      <section class="view-productos">   
                          <div class="view-content">
                            <table>
                              <tbody>
                                  <?php 
                                  $cont = 0;
                                  $clase = 0;
                                  foreach ($lista as $value) {
                                      if($cont=0){
                                          if(($clase%2)==0)
                                          {
                                            echo "<tr class='odd'>";                                                                                      
                                          }
                                            else
                                                echo "<tr class='event'>";                                            
                                          }
                                          echo "<td><img src='images/fresas.png' width='190' height='130'><span>Fresa</span></td>";
                                          if($cont=2)
                                          {
                                            echo " </tr>"; $cont=0; 
                                            $clase++;
                                          }
                                           $cont++;
                                  
                                  }?>
                              
                              </tbody>
                            </table>
                           </div>
                        </section>
                     </div> 
                 </section><!-- /.content-->
                <section id="sidebar-first">
                  <div id="type-product" class="block">
                    <h2>Tipo</h2>
                    <div class="content">
                      <ul>
                          <?php
                          foreach ($frutas as $value) {
                              ?>
                          <li><a href=""><?php echo $value[0]." ".$value[1]?></a><input type="checkbox" name="" value=""></li>
                          <?php
                          }
                          ?>                        
                      </ul>
                    </div>
                  </div>
                  <div id="country-product" class="block">
                    <h2>PaÃ­s de Origen</h2>
                    <div class="content">
                      <ul>
                        <li><a href="">Colombia (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Ecuador (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">PerÃº (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Gautemela (10)</a><input type="checkbox" name="" value=""></li>
                      </ul>
                    </div>
                  </div>
                  <div id="sabor-product" class="block">
                    <h2>Sabor</h2>
                    <div class="content">
                      <ul>
                        <li><a href="">Dulce (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Ã�cido (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Jugoso (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Picante (10)</a><input type="checkbox" name="" value=""></li>
                      </ul>
                    </div>
                  </div>
                  <div id="consumo-product" class="block">
                    <h2>Consumo</h2>
                    <div class="content">
                      <ul>
                        <li><a href="">Fruta Fresca (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">SÃ­n cascara (10)</a><input type="checkbox" name="" value=""></li>
                        <li><a href="">Jugos (10)</a><input type="checkbox" name="" value=""></li>
                      </ul>
                    </div>
                  </div>
                  <div id="time-product" class="block">
                    <h2>Tiempo de vida</h2>
                    <div class="content">
                      <p>
                        <label for="amount">Price range:</label>
                        <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
                      </p>
                      <div id="slider-range"></div>
                    </div>
                  </div>
                </section> <!-- sidebar-first -->
              </div> <!-- /.section-inner-->
            </div> <!--/.section --> 
          </div> <!-- /.section-wrapper-->
        </div> <!--/.main -->