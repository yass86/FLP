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
                      <h1><?php echo $producto['nombre']?></h1> 
                        <h2><?php echo $producto['nombre_alternativo']?></h2>
                        <div class="contenido-producto">
                          <div id="block-slide-product" class="block">
                            <a class="buttons prev" href="#">left</a>
                            <div id="slideshow" class="pics">
                              <div id="slide-1" class="item-slide">
                                  <img src="<?php echo site_url().'files/slide.jpg'?>" width="485" height="245">      
                              </div> <!-- item-slide -->
                              <div id="slide-2" class="item-slide">
                                  <img src="<?php echo site_url().'files/slide.jpg'?>" width="485" height="245">      
                              </div> <!-- item-slide -->
                              <div id="slide-3" class="item-slide">
                                  <img src="<?php echo site_url().'files/slide.jpg'?>" width="485" height="245">     
                              </div> <!-- item-slide -->
                            </div> 
                            <a class="buttons next" href="#">next</a>
                            <div id="nav-slide">
                              <a href="#" class="">1</a>
                              <a href="#" class="">2</a>
                              <a href="#" class="">3</a>
                            </div>     
                           </div> <!-- block-slide -->
                          <div class="detalle-product block">
                            <div class="tamaÃ±o-producto description-product">
                              <h3>Tamaño</h3>
                              <img src="images/fresas.png" width="130" height="90">
                              <p><label>Largo</label><span><?php echo $producto['largo']." CM"?></span></p>
                              <p><label>Grosor</label><span><?php echo $producto['grosor']." CM"?></span></p>
                              <p><label>Peso</label><span><?php echo $producto['peso']." Gr"?></span></p>
                            </div>
                            <div class="sabor-producto description-product">
                              <h3>Sabor</h3>
                              <p><label>Dulce</label><span><?php echo $producto['dulce']?></span></p>
                              <p><label>Acido</label><span><?php echo $producto['acido']?></span></p>
                              <p><label>Amargo</label><span><?php echo $producto['amargo']?></span></p>
                              <p><?php echo $producto['txt_sabor']?></p>
                            </div>
                            <div class="cultivos-producto description-product">
                              <h3>Cultivos Actuales</h3>
                              <img src="<?php echo site_url().'files/fresas.png'?>" width="130" height="90">
                              <p><?php echo $producto['txt_cultivo']?></p>
                            </div>
                          </div> <!-- detalle-product block -->
                        </div>
              <div class="info-disponibilidad-producto">
                <h3>Disponibilidad</h3>
                <div class="content">
                  <table>
                      <thead>
                        <tr class="">
                          <th><span>ENE</span></th>
                          <th><span>FEB</span></th>
                          <th><span>MAR</span></th>
                          <th><span>ABR</span></th>
                          <th><span>MAY</span></th>
                          <th><span>JUN</span></th>
                          <th><span>JUL</span></th>
                          <th><span>AGO</span></th>
                          <th><span>SEP</span></th>
                          <th><span>OCT</span></th>
                          <th><span>NOV</span></th>
                          <th><span>DIC</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd">
                          <td><span class="disp-orange disp-color"></span></td>
                          <td><span class="disp-green disp-color"></span></td>
                          <td><span class="disp-green disp-color"></span></td>
                          <td><span class="disp-green disp-color"></span></td>
                          <td><span class="disp-red disp-color"></span></td>
                          <td><span class="disp-red disp-color"></span></td>
                          <td><span class="disp-red disp-color"></span></td>
                          <td><span class="disp-gray disp-color"></span></td>
                          <td><span class="disp-gray disp-color"></span></td>
                          <td><span class="disp-green disp-color"></span></td>
                          <td><span class="disp-red disp-color"></span></td>
                          <td><span class="disp-orange disp-color"></span></td>
                        </tr>
                        </tr>
                      </tbody>
                    </table> 
                    <div class="descrip-disponibilidad">
                            <div class="item-disp"><span class="disp-green disp-color"></span><span>ALTA Disponibilidad</span></div>
                            <div class="item-disp"><span class="disp-orange disp-color"></span><span>MEDIA Disponibilidad</span></div>
                            <div class="item-disp"><span class="disp-gray disp-color"></span><span>BAJA Disponibilidad</span></div>
                            <div class="item-disp"><span class="disp-red disp-color"></span><span>NO Disponible</span></div>
                   </div>                               
                </div>
              </div> <!-- info-disponibilidad-producto -->
              <div class="info-consumo-producto">
                <h3>Consumo del Producto</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales dui non felis scelerisque in lobortis</p>
                <ul>
                  <li><a href="">Fruta fresca</a></li>
                  <li><a href="">Jugo-bebida</a></li>
                  <li><a href="">Helado</a></li>
                  <li><a href="">Congelada</a></li>
                  <li><a href="">Ensalada</a></li>
                  <li><a href="">Mezclada con otras</a></li>
                </ul>
              </div> <!-- info-consumo-producto -->
              <div class="info-presentaciones-producto">
                <h3>Presentaciones</h3>
                <div class="items-tabs">
                    <ul class="item-list"> 
                      <li class="first tab-item"><a class="active" href="/">A granel x3 kg</a></li> 
                      <li class="last tab-item"><a href="/">Bolsa x 250gr</a></li>
                    </ul>  
              </div> <!--/.items-tabs -->
              <div class="content-tabs block-caractersiticas">
                <img src="images/slide.jpg" width="275" height="215">    
                <div class="caracteristicas-product">
                  <h4>BAnanito Freskita</h4>
                  <h5>Bananito a Granel x3kg</h5>
                  <label>Peso Neto</label><span>3kg</span>
                  <label>Peso Bruto</label><span>3kg</span>
                  <table>
                    <tr class="odd">
                      <td>Cajas por pallet</td>
                      <td>220</td>
                      
                    </tr>
                    <tr class="even">
                      <td>pallets x contenedor</td>
                      <td>400</td>
                    </tr>
                     <tr class="odd">
                      <td>Cajas x contenedor 40 fit</td>                      
                      <td>20</td>
                    </tr>
                     <tr class="even">
                      <td>pallets x contenedor</td>
                      <td>400</td>
                    </tr>
                  </table>
                  <label>MÃ­nima cantidad por pedido</label><span>200cajas</span>
                </div>
                <div>
                  
                </div>
              </div>
              </div> <!-- info-presentaciones-producto -->
            </section><!-- /.content-->
                <section id="sidebar-last">
                    <a class="btn-orange" href="<?php echo site_url('inicio')?>">Realizar un pedido ahora</a> 
                  <div class="info-nombre-producto">
                    <h3><?php echo $producto['nombre_botanico']?></h3>
                    <p><?php echo $producto['descripcion']?></p>     
                  </div>
                  <div class="info-origen-producto">
                    <h3>Origen</h3>
                    <span><?php echo $producto['txt_origen']?></span>
                  </div>
                  <div class="info-tiempo-roducto">
                    <span><em><?php echo $producto['tiempo_vida']?></em><p>Semanas</p></span>
                    <p><?php echo $producto['obs_tiempo_vida']?></p>
                  </div>
                  <div class="info-tiempo-producto">
                    <h2>Color interior y exterior</h2>
                    <h3>Estado Inmaduro</h3>
                    <img src="images/slide.jpg" width="140" height="95"> 
                    <img src="images/slide.jpg" width="140" height="95"> 
                    <p>Color verde</p>
                    <h3>Listo para Consumir</h3>
                    <div class="images-consumir">
                      <img src="images/slide.jpg" width="140" height="95"> 
                      <img src="images/slide.jpg" width="140" height="95">
                    </div> 
                    <p>Rosadas</p>
                  </div>
                  <div class="info-tabla-producto">
                    <h2>Tabla Nutricional</h2>
                    <h3>Aspecto nutricional por cada 100gr</h3>
                    <p>(1 mano de 4 a 5 deditos aprox 450gr)</p>
                    <table>
                    <tr class="odd">
                      <td>Calorias</td>
                      <td>gr</td>
                      <td>220</td>
                      
                    </tr>
                    <tr class="even">
                      <td>Agua</td>
                      <td>gr</td>
                      <td>400</td>
                    </tr>
                     <tr class="odd">
                      <td>Ptroteinas</td>                      
                      <td>20</td>
                    </tr>
                     <tr class="even">
                      <td>Calcio</td>
                      <td>gr</td>
                      <td>400</td>
                    </tr>
                  </table>
                  </div>
                </section> <!-- sidebar-last -->
              </div> <!-- /.section-inner-->
            </div> <!--/.section --> 
          </div> <!-- /.section-wrapper-->
        </div> <!--/.main -->