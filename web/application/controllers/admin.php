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
                //elementos persistentes
                
                
                if($var=="new_user")
                {
                     $elem['contenido'] = $this->load->view('admin/usuario/new_user',null,true);
                     $cont['main']=  $this->load->view('admin/elementos/main',$elem,true);
                     echo $this->load->view('admin/administrador',$cont,true); 
                }               
                else
                {
                    
                }
            }
            else
            {
                redirect();
            }
        }
               
} 
