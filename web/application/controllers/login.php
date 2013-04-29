<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {             
              $this->session->sess_destroy();
              $menu['menu']=  ""; 
              $menu['mensaje']=  "LOGIN FLP"; 
              $cont['header']=  "";
              $cont['preface']= "";
              $cont['main']=  $this->load->view('admin/usuario/login',null,true);
              $cont['footer']= "";
              echo $this->load->view('admin/administrador',$cont,true);   
    }
    //reestablecer contraseña
        function olvido_contrasena()
        {
              $menu['menu']=  ""; 
              $menu['mensaje']=  "LOGIN FLP"; 
              $cont['header']= "";
              $cont['preface']= "";
              $cont['main']=  $this->load->view('admin/usuario/new_pwd',null,true);
              $cont['footer']= "";
              echo $this->load->view('admin/administrador',$cont,true); 
        }
        function actualizar_usuario()
        {
            $id = $this->session->userdata('id');
            
            if($id!=null)
            {
                $this->load->model('usuario/usuario_model','modelo');            
                $datos = $this->modelo->getdatos_usuario($id);
                $menu['menu']=  ""; 
                $menu['mensaje']=  "LOGIN FLP"; 
                $cont['header']= "";
                $cont['preface']= "";
                $cont['main']=  $this->load->view('admin/usuario/new_user',$datos,true);
                $cont['footer']= "";
                echo $this->load->view('admin/administrador',$cont,true); 
            }
            else
            {
                redirect();
            }
        }
        //validar si existe un correo 
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
    function reset()
    {
       $us = $this->input->post('mail', true);      
       $this->load->model('login/login_model','valido');
       
      
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
         $_SESSION['KCFINDER'] = array();
          $_SESSION['KCFINDER']['disabled'] = false;
       $this->session->set_userdata($usuario);
    }
    function cerrar()
    {
        $_SESSION['KCFINDER']['disabled'] = true;
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
