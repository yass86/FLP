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
            $var['id'] = $this->input->post('id',true);
            
            if(strlen($var['mail'])>5)
            {
                $this->load->model('usuario/usuario_model','modelo');
                
                if($var['id']==0){
                    $realizo =  $this->modelo->crear_usuario($var);
                }
                else{
                    $realizo =  $this->modelo->actualizar_usuario($var);
                }
               
               if($realizo)
               {
                   $this->envioMail($var);                
                   redirect('admin');
               }
            }                        
        }
        
        function validarmail()
        {
            $var=  $this->input->post('mail',true);
          //  echo $var;
           // exit();
            $rea=false;
           
                 $this->load->model('usuario/usuario_model','modelo');
                 $rea =  $this->modelo->validarEmail($var);
          
            return $rea;
            
        }
        function validarEmail2($var="")
        {
            
            $rea=false;
            if($var!="")
            {
                $var = str_replace($var, "_", "@");
                $this->load->model('usuario/usuario_model','modelo');
            $rea =  $this->modelo->validarEmail($var);
            }
            echo $rea;
            
        }
        function envioMail($var="")
        {
            if($var!="")
            {
                $this->load->library('email');
                $this->email->from('flp@aguayoapps.com', 'Registro FLP');
                $this->email->to($var['mail']); 
                //$this->email->cc('another@another-example.com'); 
                //$this->email->bcc('them@their-example.com'); 
                $this->email->subject('Registro FLP');
                $this->email->message('SU CUENTA FUE CREADA !!! 
                    USUARIO '.$var['mail'].' ');	
                $this->email->send();
               // echo $this->email->print_debugger();
               // exit();
            }
            
        }
} 
