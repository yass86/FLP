<?php 
class Flp extends CI_Controller {
public function index($idioma="",$seccion="",$pagina="")
	{       
           /* $var = array();
            if($idioma=="")
                $idioma='es';
            $var['menu']=  $this->getSecciones($idioma);
            
            
            $cont['header']=  $this->load->view('front/header',$var,true);
            $cont['preface']=  $this->load->view('front/preface',null,true);
            $cont['main']=  $this->load->view('front/main',null,true);
            $cont['footer']=  $this->load->view('front/footer',null,true);
            
            echo $this->load->view('template',$cont,true);       */
    echo $this->page();
	}
        
       function page($idioma="",$seccion="",$pagina="",$variable="")
        {
             $var = array();
             $va = array();             
            if($idioma=="es"|$idioma==""){
                $idioma='es';
                $va['idioma']=$idioma;
                         
            }
            else{
                 $va['idioma']="en";
            }
            $tmp =$this->cargar_pagina($idioma,$seccion,$pagina,$variable);
            $va['contenido']= $tmp['pagina'] ;
            $var['menu']=  $this->getSecciones($idioma);
            $var['ido']=  $this->load->view('front/idioma',$va,true);   
            $cont['header']=  $this->load->view('front/header',$var,true);
            $cont['preface']=  $this->load->view('front/preface',null,true);
            $cont['main']=  $this->load->view('front/main',$va,true);
            $cont['footer']=  $this->load->view('front/footer',null,true);
            $cont['clase']=$tmp['clase'];
            echo $this->load->view('template',$cont,true);   
        }
        function crearSlu($idioma="",$seccion="",$pagina="",$variable="")
        {
             $contenido = array();
            $slu = "<a href=".site_url('flp/page/')."/$idioma/$seccion>$seccion</a>";
            if($pagina!=""){
                $slu.= "<span class='separator'> ›› </span><a href=".site_url('flp/page/')."/$idioma/$seccion/$pagina>$pagina</a>";
                if($variable!="")
                    $slu.= "<span class='separator'> ›› </span><a href=".site_url('flp/page/')."/$idioma/$seccion/$pagina/$variable>$variable</a>";
            }   
                return $slu;
        }
        function cargar_pagina($idioma="",$seccion="",$pagina="",$variable="")
        {
           
            $slu = $this->crearSlu($idioma, $seccion, $pagina, $variable);
            if($seccion=="inicio")
            {
                $tmp= $this->gethome($idioma, $seccion, $pagina, $variable,$slu);
                $contenido['pagina'] = $tmp['pagina'];
                $contenido['clase']=$tmp['clase'];
            }
            else if($seccion=="flp-internacional")
            {
                $tmp = $this->getflp($idioma, $seccion, $pagina, $variable,$slu);
                $contenido['pagina'] = $tmp['pagina'];
                $contenido['clase']=$tmp['clase'];
            }
            else if($seccion=="nuestros-servicios")
            {
                $tmp = $this->getNuestrosServicios($idioma, $seccion, $pagina, $variable,$slu);
                $contenido['pagina'] = $tmp['pagina'];
                $contenido['clase']=$tmp['clase'];
            }
            else if($seccion=="productos")
            {
                $tmp = $this->getProductos($idioma, $seccion, $pagina, $variable,$slu);
                $contenido['pagina'] = $tmp['pagina'];
                $contenido['clase']=$tmp['clase'];
            }
            else{
                $contenido['pagina'] = $seccion;
                $contenido['clase']="front no-sidebars";
            }
            return $contenido;
        }
        
        function getflp($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $vista =array();
            $variable = array();
            $variable['slu']=$slu;
            $lis['new_slide']=  $this->getSlide(3);
            $nave = array();
            $lis['nav']= $this->getListaSlide(3);
            $variable['slide']=  $this->load->view('front/elemento/slide',$lis,true);
            $variable['carrucel']=  $this->load->view('front/elemento/carrucel',null,true);
            $variable['bloque1']=  $this->getBloqueleft(14);
            $variable['bloque2']=  $this->getBloqueleft(16);
            $variable['bloque3']=  $this->getBloqueleft(15);            
            $variable['bloque4']=  $this->getBloqueleft(17);                        
            $variable['bloquetexto']=  $this->getBloquetexto(12);                        
            $vista['clase']="front no-sidebars";
            if($pagina=="")
                $vista['pagina']=$this->load->view('front/page/flp_internacional',$variable,true);
            else
            {
                if($pagina=="nuestras-operaciones")
                {
                    $variable['pagina']=  $this->getContenidoPagina(13);
                    $variable['bloque1']=  $this->getBloquetexto(19);
                     $vista['pagina']=$this->load->view('front/page/nuestras_operaciones',$variable,true);
                     $vista['clase']="not-front sidebarlast";
                }
                else if($pagina=="compromiso-social")
                {
                    $variable['pagina']=  $this->getContenidoPagina(14);
                     $variable['galeria1']=  $this->getGaleria(1);
                     $variable['galeria2']=  $this->getGaleria(3);
                     $variable['galeria3']=  $this->getGaleria(5);
                     $variable['galeria4']=  $this->getGaleria(6);
                     $variable['bloque1']=  $this->getBloque_siderbar_last(16);
                     $variable['bloque2']=  $this->getBloque_siderbar_last(7);
                     $variable['bloque3']=  $this->getBloque_siderbar_last(8);
                    
                     $vista['pagina']=$this->load->view('front/page/compromiso',$variable,true);
                      $vista['clase']="not-front sidebarlast";
                }
                else if($pagina=="politica-de-calidad")
                {
                    $variable['pagina']=  $this->getContenidoPagina(15);
                     $variable['bloque1']=  $this->getBloque(16);
                     $variable['bloque2']=  $this->getBloque(7);
                     $variable['bloque3']=  $this->getBloque(8);
                    
                     $vista['pagina']=$this->load->view('front/page/compromiso',$variable,true);
                      $vista['clase']="not-front sidebarlast";
                }
                else if($pagina=="flp-internacional")
                {                                        
                      $vista['pagina']=$this->load->view('front/page/flp_internacional',$variable,true);
                }
                else
                {
                    $vista['pagina']=$seccion."/".$pagina;
                    
                }
                
            }
            return $vista;
            
        }
        function getNuestrosServicios($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            $variable['slu']=$slu;                        
            $variable['bloque1']=  $this->getBloque(7);
            $variable['bloque2']=  $this->getBloque(8);
            $variable['ubicar']=  $this->load->view('front/elemento/ubicar_oficina',null,true);    
            $vista=array();
            $vista['pagina']=$this->load->view('front/page/nuestros_servicios',$variable,true);
            $vista['clase']="front no-sidebars";
            return $vista;
        }
        function getProductos($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            
            $this->load->model('producto/producto_model','producto');
            $variable['producto'] = $this->producto->get_producto($pagina);
             $variable['slu']=  $this->crearSlu($idioma, $seccion,  $variable['producto']['tipo'], $variable['producto']['nombre']);
            $nutricion['nutricion']=$this->producto->getNutricion($pagina);
            $nutricion['consumo']=$this->producto->getConsumo($pagina);
            $nutricion['disponibilidad']=$this->producto->getDisponibilidad($pagina);
            $variable['disponibilidad'] = $this->load->view('front/elemento/disponibilidad',$nutricion,true);
            $variable['consumo'] = $this->load->view('front/elemento/consumo',$nutricion,true);
            $variable['nutricion'] = $this->load->view('front/elemento/nutricion',$nutricion,true);
           
            $vista=array();
            $vista['pagina']=$this->load->view('front/page/producto',$variable,true);
            $vista['clase']="not-front sidebarlast";
            return $vista;
        }
        function gethome($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            $variable['slu']=$slu;
            $lis['new_slide']=  $this->getSlide(3);
            $nave = array();
            $lis['nav']= $this->getListaSlide(3);
            $variable['slide']=  $this->load->view('front/elemento/slide',$lis,true);
            $variable['carrucel']=  $this->load->view('front/elemento/carrucel',null,true);
            $variable['bloque1']=  $this->getBloque(7);
            $variable['bloque2']=  $this->getBloque(8);
            $variable['bloque3']=  $this->load->view('front/elemento/formulario',null,true);
            $variable['bloque4']=  $this->getBloque(16);
            $variable['bloque5']=  $this->getBloque(10);
            $variable['bloque6']=  $this->getBloque(11);
             $vista=array();
            $vista['pagina']=$this->load->view('front/page/home',$variable,true);
            $vista['clase']="front no-sidebars";
            return $vista;
        }
        //funcion para cargar contenidos de tipo pagina
        function getContenidoPagina($idpage="")
        {
            $this->load->model('pagina/pagina_model','pagina');
            $lista = $this->pagina->get_pagina($idpage);
            return $this->load->view('front/elemento/pagina',$lista,true);
        }
        function getGaleria($id_galeria="")
        {
            $view="";
            if($id_galeria!="")
            {
                 $this->load->model('galeria/galeria_model','galeria');
                 $lista = $this->galeria->getGaleriasID($id_galeria);                
                 $view = $this->load->view('front/elemento/galeria',$lista,true);
            }
            return $view;
        }
        function getBloque($idbloque="")
        {                   
            $vista = "";
            if($idbloque!="")
            {
                $this->load->model('bloque/bloque_model','bloque');
                $var = $this->bloque->getBloque($idbloque);             
                $vista = $this->load->view('front/elemento/bloque',$var,true);                
            }            
            return $vista;
        }
        function getBloque_siderbar_last($idbloque="")
        {                   
            $vista = "";
            if($idbloque!="")
            {
                $this->load->model('bloque/bloque_model','bloque');
                $var = $this->bloque->getBloque($idbloque);             
                $vista = $this->load->view('front/elemento/bloque_sidebar_last',$var,true);                
            }            
            return $vista;
        }
        function getBloqueleft($idbloque="")
        {                   
            $vista = "";
            if($idbloque!="")
            {
                $this->load->model('bloque/bloque_model','bloque');
                $var = $this->bloque->getBloque($idbloque);             
                $vista = $this->load->view('front/elemento/bloque_left',$var,true);                
            }            
            return $vista;
        }
        function getBloquetexto($idbloque="")
        {                   
            $vista = "";
            if($idbloque!="")
            {
                $this->load->model('bloque/bloque_model','bloque');
                $var = $this->bloque->getBloque($idbloque);             
                $vista = $this->load->view('front/elemento/bloque_text',$var,true);                
            }            
            return $vista;
        }
        function getSlide($idslide="")
        {
            $var = array();
            $this->load->model('slide/slide_model','slide');
            $lista = $this->slide->getSlideid($idslide);
             $var = array();
             $slide = array();
             $cont=1;
            foreach ($lista as $value) {
                $var['id']=$cont;
                $var['titulo']=$value->titulo;
                $var['contenido']=$value->contenido;
                $var['url_boton']=$value->urlboton;
                $var['txt_boton']=$value->txtboton;
                $var['imagen']=$value->imagen;
                $slide[$cont] = $this->load->view('front/elemento/new_slide',$var,true);            
                $cont++;
            }                            
                
            return $slide;
        }
        function getListaSlide($idslide="")
        {
             $this->load->model('slide/slide_model','slide');
            $var = $this->slide->getListaSlideid($idslide);
            return $var;
        }
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        function getSecciones($idoma="")
        {
            $this->load->model('seccion/seccion_model','seccion');
            $lista['lista']=$this->seccion->get_secciones($idoma);
            $lista['pagina']=$this->getsegundoNivelSecciones($lista['lista']);
            return $this->load->view('front/menu_dos_niveles',$lista,true);
        }
        function getsegundoNivelSecciones($lista)
        {
            $paginas = array();
             $this->load->model('seccion/seccion_model','seccion');
            
            foreach ($lista as $value) {
                            
                $paginas[$value->nombre]=  $this->seccion->get_subsecciones($value->id_seccion);
                
            }
          //  echo "<pre>".print_r($paginas,true)."</pre>";
            //exit;
            return $paginas;
        }
} 
