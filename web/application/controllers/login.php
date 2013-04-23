<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {             
              $menu['menu']=  ""; 
              $menu['mensaje']=  "LOGIN FLP"; 
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
        
              $menu['mensaje']= ""; 
              $menu['contenido']=  "ERROR INICIANDO SESION";  
              $menu['menu']=  ""; 
              $cont['header']= "";
              $cont['preface']= "";
              $cont['main']=  $this->load->view('admin/elementos/main',$menu,true);
              $cont['footer']= "";            
         echo $this->load->view('admin/administrador',$cont,true);                   
    }
}
