<?php 
class Pagina extends CI_Controller {
	public function index($idioma="",$seccion="",$pagina="")
	{          
            redirect();                  
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        function pagina_nueva($id_seccion="")
        {
            $pagina ="";
            if($id_seccion!="")
            {
                $dat = array();
                $dat['id']=0;
                $dat['seccion']=$id_seccion;
                $dat['slu']="";
                $dat['titulo']="";
                $dat['txt_destacado']="";
                $dat['imagen']="";
                $pagina = $this->load->view('admin/pagina/pagina',$dat,true);
            }
            echo $pagina;
        }
        
        function registrarPagina()
        {
            if($this->seccionActiva())
            {
                $var = array();
                $var['id'] = $this->input->post('id',true);
                $var['seccion'] = $this->input->post('seccion',true);
                $var['slu'] = $this->input->post('slu',true);
                $var['titulo'] = $this->input->post('titulo',true);
                $var['txt_destacado'] = $this->input->post('txt_destacado',true);
                $var['contenido'] = $this->input->post('contenido',true);
                $var['file_upload'] = $this->input->post('file_upload',true);
                
                $this->load->model('pagina/pagina_model','pagina');
                $inserto = $this->pagina->nueva_pagina($var);
                if($inserto)
                    redirect ('admin');
                else
                    redirect ('admin/error');
            }
            else {
              redirect ('login');    
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
