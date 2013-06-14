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
            $va['contenido']=  $this->cargar_pagina($idioma,$seccion,$pagina,$variable);
            $var['menu']=  $this->getSecciones($idioma);
            $var['ido']=  $this->load->view('front/idioma',$va,true);   
            $cont['header']=  $this->load->view('front/header',$var,true);
            $cont['preface']=  $this->load->view('front/preface',null,true);
            $cont['main']=  $this->load->view('front/main',$va,true);
            $cont['footer']=  $this->load->view('front/footer',null,true);
            
            echo $this->load->view('template',$cont,true);   
        }
        
        function cargar_pagina($idioma="",$seccion="",$pagina="",$variable="")
        {
            $contenido = "";
            $slu = "<a href=".site_url('flp/page/')."/$idioma/$seccion>$seccion</a>";
            if($pagina!=""){
                $slu.= "<a href=".site_url('flp/page/')."/$idioma/$seccion/$pagina>$pagina</a>";
                if($variable!="")
                    $slu.= "<a href=".site_url('flp/page/')."/$idioma/$seccion/$pagina/$variable>$variable</a>";
            }
            if($seccion=="inicio")
            {
                $contenido = $this->gethome($idioma, $seccion, $pagina, $variable,$slu);
            }
            else if($seccion=="flp-internacional")
            {
                $contenido = $this->getflp($idioma, $seccion, $pagina, $variable,$slu);
            }
            else if($seccion=="nuestros-servicios")
            {
                $contenido = $this->getNuestrosServicios($idioma, $seccion, $pagina, $variable,$slu);
            }
            else{
                $contenido = $seccion;
            }
            return $contenido;
        }
        
        function getflp($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            $variable['slu']=$slu;
            $lis['new_slide']=  $this->getSlide(5);
            $nave = array();
            $lis['nav']=  $nave;
            $variable['slide']=  $this->load->view('front/elemento/slide',$lis,true);
            $variable['carrucel']=  $this->load->view('front/elemento/carrucel',null,true);
            $variable['bloque1']=  $this->getBloqueleft(14);
            $variable['bloque2']=  $this->getBloqueleft(16);
            $variable['bloque3']=  $this->getBloqueleft(15);            
            $variable['bloque4']=  $this->getBloqueleft(17);                        
            $variable['bloquetexto']=  $this->getBloquetexto(12);                        
            return $this->load->view('front/page/flp_internacional',$variable,true);
        }
        function getNuestrosServicios($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            $variable['slu']=$slu;                        
            $variable['bloque1']=  $this->getBloque(7);
            $variable['bloque2']=  $this->getBloque(8);
            $variable['ubicar']=  $this->load->view('front/elemento/ubicar_oficina',null,true);            
            return $this->load->view('front/page/nuestros_servicios',$variable,true);
        }
        function gethome($idioma="",$seccion="",$pagina="",$variables="",$slu)
        {
            $variable = array();
            $variable['slu']=$slu;
            $lis['new_slide']=  $this->getSlide(5);
            $nave = array();
            $lis['nav']=  $nave;
            $variable['slide']=  $this->load->view('front/elemento/slide',$lis,true);
            $variable['carrucel']=  $this->load->view('front/elemento/carrucel',null,true);
            $variable['bloque1']=  $this->getBloque(7);
            $variable['bloque2']=  $this->getBloque(8);
            $variable['bloque3']=  $this->load->view('front/elemento/formulario',null,true);
            $variable['bloque4']=  $this->getBloque(16);
            $variable['bloque5']=  $this->getBloque(10);
            $variable['bloque6']=  $this->getBloque(11);
            return $this->load->view('front/page/home',$variable,true);
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
            if($idslide!="")
            {
                $var['titulo']="titulo";
                $var['contenido']="contenido";
                $var['url_boton']="url_boton";
                $var['txt_boton']="txt_boton";
                $var['imagen']="imagen.jpg";
                $var = $this->load->view('front/elemento/new_slide',$var,true);
            }
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
            return $this->load->view('front/menu_un_nivel',$lista,true);
        }
} 
