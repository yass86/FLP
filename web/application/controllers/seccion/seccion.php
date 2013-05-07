<?php 
class Seccion extends CI_Controller {
	public function index($idioma="",$seccion="",$pagina="")
	{          
            redirect();                  
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        function getSeccion($id="")
        {
            if($id!="")
            {
                $this->load->model('seccion/seccion_model','sec');
                $lista['lista']=$this->sec->get_seccion($id);
                echo $this->load->view('admin/seccion/select',$lista,true);
            }
            else
                redirect ();
        }
        function seccionNombre2($id ="")
        {
            redirect('admin/ir/editarseccion/'.$id);
        }
        function seccionNombre($id ="")
        {
            if($id!="")
            {
                $this->load->model('seccion/seccion_model','seccion');
                $lista = $this->seccion->buscarSeccion($id);
                $var=array();
                $var['idioma']="";
                $var['nombre']="";
                $var['slu']="";
                $var['id']="0";
                $var['titulo']="SECCION";
                foreach ($lista as $value) {
                    $var['idioma']=  $this->getIdiomas($value->idioma,"idioma");
                    $var['nombre']=$value->nombre;
                    $var['slu']=$value->slu_seccion;                    
                    $var['id']=$value->id_seccion;                    
                }
                echo $this->load->view('admin/seccion/nueva_seccion',$var,true);                
            }
        }
        
        function registrarSeccion()
        {
            if($this->seccionActiva())
            {
                $var = array();
                $var['id'] = $this->input->post('id',true);
                $var['slu'] = $this->input->post('slu',true);
                $var['nombre'] = $this->input->post('nombre',true);
                $var['idioma'] = $this->input->post('idioma',true);
                
                $this->load->model('seccion/seccion_model','seccion');
                $inserto = $this->seccion->nueva_seccion($var);
                if($inserto)
                    redirect ('admin');
                else
                    redirect ('admin/error');
            }
        }

        //verificar que exista una seccion activa 
        private function seccionActiva()
        {
            $activa = false;
            
            if($this->session->userdata('id')!=null)
                $activa=true;
            
            return $activa;
        }
        function getIdiomas($seleccion="")
        {
            $this->load->model('util','util');
            $lista['lista'] = $this->util->getidiomas();
            $lista['id'] =$seleccion;
            $lista['nombre'] ="idioma";            
            return $this->load->view('admin/elementos/select',$lista,true);
        }
} 
