<?php 
class Admin extends CI_Controller {
	public function index()
	{
              $cont['header']=  $this->load->view('admin/elementos/header',null,true);
              $cont['preface']=  $this->load->view('admin/elementos/preface',null,true);
              $cont['main']=  $this->load->view('admin/elementos/main',null,true);
              $cont['footer']=  $this->load->view('admin/elementos/footer',null,true);
              echo $this->load->view('admin/administrador',$cont,true);                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
} 
