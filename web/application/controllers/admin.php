<?php 
class Admin extends CI_Controller {
	public function index()
	{
            if($this->session->userdata('id')!=null)
            {             
              $lista['pf'] = $this->session->userdata('id');
              $menu['mensaje']=  $this->session->userdata('nombre'); 
              $menu['contenido']=  $this->session->userdata('nombre'); 
              $menu['menu']=  $this->cargarMenu(); 
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
            echo $this->load->view('admin/elementos/menu',$lista,true);  
        }
        
        //parcelador de menus 
        function  ir($var="")
        {
            if($this->session->userdata('id')!=null)
            { 
                if($var=="new_user")
                {
                    
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
