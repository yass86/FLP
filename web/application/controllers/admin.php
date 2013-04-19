<?php 
class Admin extends CI_Controller {
	public function index()
	{
                $lista['lista'] = $this->valoresMenu();
              $menu['menu']=  $this->load->view('admin/elementos/menu',$lista,true);
              $menu['otro']=  "otra cosas";
              
              $cont['header']=  $this->load->view('admin/elementos/header',$menu,true);
              $cont['preface']=  $this->load->view('admin/elementos/preface',null,true);
              $cont['main']=  $this->load->view('admin/elementos/main',null,true);
              $cont['footer']=  $this->load->view('admin/elementos/footer',null,true);
              echo $this->load->view('admin/administrador',$cont,true);                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        function valoresMenu()
        {
            $var[0]="usuario";
            $var[1]="productos";
            $var[2]="servicios";
            $var[3]="flp";
            
            return $var;
        }
} 
