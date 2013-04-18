<?php 
class Inicio extends CI_Controller {
	public function index()
	{
          
            echo $this->load->view('template',null,true);
                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
} 
