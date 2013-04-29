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
        private function ck()
        {
             $this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true));
             echo $this->load->view('admin/wisiwi/wisiwi', null);
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
            if($this->session->userdata('id')!=null&$var!="")
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
                    $elem['pwd']="";
                     $elem['contenido'] = $this->load->view('admin/usuario/new_user',$elem,true);
                     $cont['main']=  $this->load->view('admin/elementos/main',$elem,true);
                  
                }                                           
                else if($var=="update_user")
                {       
                        $this->load->model('usuario/usuario_model','mode');
                        $id = $this->session->userdata('id');
                        $datos = $this->mode->getdatos_usuario($id);                        
                        $up['contenido'] = $this->load->view('admin/usuario/update_user',$datos,true);                                                                    
                        $cont['main']=  $this->load->view('admin/elementos/main',$up,true);                     
                } //update_user  
                else if($var=="del_user")
                {                               
                        $del['contenido'] = $this->load->view('admin/usuario/error',null,true);                                                                    ;                                                                    
                        $cont['main']=  $this->load->view('admin/elementos/main',$del,true);                    
                }//del_user    
                else if($var=="ck")
                {      $del['contenido'] =  $this->ck();                                                                                     ;                                                                    
                        $cont['main']=  $this->load->view('admin/elementos/main',$del,true);                           
                       
                }//prueba_ck    
                
                //impresion el template
              ///  echo "<pre>".print_r($cont,true)."</pre>";
             //   exit();
                 echo $this->load->view('admin/administrador',$cont,true);                
                 //impresion el template
            }
            else
            {
                redirect();
            }            
        }
               
} 
