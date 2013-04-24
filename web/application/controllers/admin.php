<?php 
class Admin extends CI_Controller {
	public function index()
	{
            if($this->session->userdata('id')!=null)
            {             
              $lista['pf'] = "";
              $menu['mensaje']=  ""; 
              $menu['contenido']=  ""; 
              $menu['menu']=  $this->cargarMenu(); 
              $menu['usr']=  $this->load->view('admin/elementos/user',$menu,true);
              $cont['header']=  $this->load->view('admin/elementos/header',$menu,true);
              $cont['preface']=  $this->load->view('admin/elementos/preface',$lista,true);
              $cont['main']=  $this->load->view('admin/elementos/main',null,true);
              $cont['footer']=  $this->load->view('admin/elementos/footer',null,true);
              echo $this->load->view('admin/administrador',$cont,true);                   
            }
            else
            {
                redirect();
            }
	}
        //cargar menu administrador 
        function cargarMenu()
        {
            $this->load->model('admin/admin_model','modelo');
            $lista['lista'] = $this->modelo->getMenu();
            return $this->load->view('admin/elementos/menu',$lista,true);  
        }
        
        //parcelador de menus 
        function  ir($var="")
        {
            if($this->session->userdata('id')!=null)
            { 
                //elementos persistentes
                      $lista['pf'] ="";
                     // $menu['mensaje']=  $this->session->userdata('nombre'); 
                      $menu['contenido']=  $this->session->userdata('nombre'); 
                      $menu['menu']=  $this->cargarMenu(); 
                      $menu['usr']=  $this->load->view('admin/elementos/user',$menu,true);
                      $cont['header']=  $this->load->view('admin/elementos/header',$menu,true);
                      $cont['preface']=  $this->load->view('admin/elementos/preface',$lista,true);                     
                      $cont['footer']=  $this->load->view('admin/elementos/footer',null,true);
                       $this->load->model('usuario/usuario_model','modelo'); 
                //elementos persistentes
                
                
                if($var=="new_user")
                {
                    $elem['id']=0;
                    $elem['mail']="";
                    $elem['nombre']="";
                    $elem['pwd']=0;
                     $elem['contenido'] = $this->load->view('admin/usuario/new_user',$elem,true);
                     $cont['main']=  $this->load->view('admin/elementos/main',$elem,true);
                   
                }               
                else if($var=="update_user")
                {                        
                        $id = $this->session->userdata('id');
                        $datos = $this->modelo->getdatos_usuario($id);
                        $menu['menu']=  ""; 
                        $menu['mensaje']=  "LOGIN FLP"; 
                        $cont['header']= "update user";
                        $cont['preface']= "";
                        $cont['main']=  $this->load->view('admin/usuario/new_user',$datos,true);
                        $cont['footer']= "";                                      
                } //update_user  
                else if($var=="del_user")
                {
                        $id = $this->session->userdata('id');
                        $datos = $this->modelo->getdatos_usuario($id);
                        $menu['menu']=  ""; 
                        $menu['mensaje']=  "LOGIN FLP"; 
                        $cont['header']= "";
                        $cont['preface']= "del user";
                        $cont['main']=  "";
                        $cont['footer']= "";  
                }
               echo $this->load->view('admin/administrador',$cont,true); 
            }
            else
            {
                redirect();
            }
        }
               
} 
