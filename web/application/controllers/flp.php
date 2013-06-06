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
            return $seccion;
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
