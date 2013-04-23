<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {             
              $menu['menu']=  "";             
              $cont['header']= "";
              $cont['preface']= "";
              $cont['main']=  $this->load->view('admin/usuario/login',null,true);
              $cont['footer']= "";
              echo $this->load->view('admin/administrador',$cont,true);   
    }
    function Validar()
    {
       $us = $this->input->post('mail', true);
       $pw = $this->input->post('pwd', true);
       $this->load->model('login/login_model','valido');
       $isUser = $this->valido->validarUsuario($us,$pw);
      if($isUser == "true"){
          $this->iniciarSesion($us);
          redirect('admin');
      }
      else{
            $this->session->sess_destroy();//destruir session
           redirect('admin/usuario/error');
      }
    }
    function iniciarSesion($us)
    {
        $this->load->model('login/login_model','valido');
       $isUser = $this->valido->getDatosUsuario($us); 
        $usuario = Array();
       foreach ($isUser as $value) {
            $usuario['id']=$value->id_usuario;           
            $usuario['nombre']=$value->nombre;
            $usuario['tipo']=$value->tipo;            
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
