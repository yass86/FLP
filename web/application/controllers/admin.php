<?php 
class Admin extends CI_Controller {
	public function index()
	{
          $cont['menu']=  $this->load->view('admin/elementos/menu',null,true);
          $cont['contenido']=  $this->load->view('admin/elementos/contenido',null,true);
          $cont['pie']=  $this->load->view('admin/elementos/pie',null,true);
            echo $this->load->view('admin/administrador',$cont,true);
                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
} 
