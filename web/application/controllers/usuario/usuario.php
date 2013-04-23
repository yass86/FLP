<?php 
class Usuario extends CI_Controller {
	public function index()
	{          
            redirect();
	}
        function crearUsuario()
        {
            $var = array();
            $var['nombre'] = $this->input->post('nombre',true);
            $var['mail'] = $this->input->post('mail',true);
            $var['pass'] = $this->input->post('pwd',true);
            $var['tipo'] = 1;            
        }
} 
