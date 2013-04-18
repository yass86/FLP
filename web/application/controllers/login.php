<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {
     echo $this->load->view("login/registro",null,true);
    }
    function Validar()
    {
       $us = $this->input->post('mail', true);
       $pw = $this->input->post('pass', true);
       $this->load->model('login/login_model','valido');
       $isUser = $this->valido->validarUsuario($us,$pw);
      if($isUser == "true"){
          $this->iniciarSesion($us);
           redirect('inicio');
      }
      else{
            $this->session->sess_destroy();//destruir session
           redirect('login/error');
      }
    }
    function iniciarSesion($us)
    {
        $this->load->model('login/login_model','valido');
       $isUser = $this->valido->getDatosUsuario($us); 
        $usuario = Array();
       foreach ($isUser as $value) {
            $usuario['id']=$value->id_usuario;
            $usuario['cc']=$value->cedula;
            $usuario['nombre']=$value->nombre." ".$value->apellido;
            $usuario['tipo']=$value->tipo;
            $usuario['caja_principal']="52927462";
            $usuario['caja_principal_id']="9";
       }
       $this->session->set_userdata($usuario);
    }
    function cerrar()
    {
        $this->session->sess_destroy();//destruir session
        redirect();
    }
    function error()
    {
       echo $this->load->view('login/error',null,true);
    }
}
