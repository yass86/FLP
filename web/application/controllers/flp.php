<?php 
class Flp extends CI_Controller {
	public function index()
	{          
            echo $this->load->view('admin/administrador',null,true);                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
} 
