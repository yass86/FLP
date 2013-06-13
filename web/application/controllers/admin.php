<?php
class Admin extends CI_Controller {
public function index() {
        if ($this->session->userdata('id') != null) {
            $lista['pf'] = "";
            $menu['mensaje'] = "";
            $menu['contenido'] = "";
            $menu['menu'] = $this->cargarMenu();
            $menu['usr'] = $this->load->view('admin/elementos/user', $menu, true);
            $cont['header'] = $this->load->view('admin/elementos/header', $menu, true);
            $cont['preface'] = $this->load->view('admin/elementos/preface', $lista, true);
            $cont['main'] = $this->load->view('admin/elementos/main', null, true);
            $cont['footer'] = $this->load->view('admin/elementos/footer', null, true);
            echo $this->load->view('admin/administrador', $cont, true);
        } else {
            redirect();
        }
    }

    private function ck() {
        $this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1', 'basePath' => base_url() . "ckeditor/", 'outPut' => true));
        echo $this->load->view('admin/wisiwi/wisiwi', null);
    }

    //cargar menu administrador 
    function cargarMenu() {
        $this->load->model('admin/admin_model', 'modelo');
        $lista['lista'] = $this->modelo->getMenu();
        return $this->load->view('admin/elementos/menu', $lista, true);
    }

    //parcelador de menus 
    function ir($var = "",$attr1="") {
        $cont = array();
        if ($this->session->userdata('id') != null & $var != "") {
            //elementos persistentes
            $lista['pf'] = "";
            // $menu['mensaje']=  $this->session->userdata('nombre'); 
            $menu['contenido'] = $this->session->userdata('nombre');
            $menu['menu'] = $this->cargarMenu();
            $menu['usr'] = $this->load->view('admin/elementos/user', $menu, true);
            $cont['header'] = $this->load->view('admin/elementos/header', $menu, true);
            $cont['preface'] = $this->load->view('admin/elementos/preface', $lista, true);
            $cont['footer'] = $this->load->view('admin/elementos/footer', null, true);
            $this->load->model('usuario/usuario_model', 'modelo');
            //elementos persistentes  

            if ($var == "new_user") {
                $elem['id'] = 0;
                $elem['mail'] = "";
                $elem['nombre'] = "";
                $elem['pwd'] = "";
                $elem['contenido'] = $this->load->view('admin/usuario/new_user', $elem, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $elem, true);
            } else if ($var == "update_user") {
                $this->load->model('usuario/usuario_model', 'mode');
                $id = $this->session->userdata('id');
                $datos = $this->mode->getdatos_usuario($id);
                $up['contenido'] = $this->load->view('admin/usuario/update_user', $datos, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $up, true);
            } //update_user  
            else if ($var == "del_user") {
                $del['contenido'] = $this->load->view('admin/usuario/error', null, true);
                ;
                $cont['main'] = $this->load->view('admin/elementos/main', $del, true);
            }//del_user    
            else if ($var == "nueva-seccion") {
                $var = array();
                $var['idioma'] = $this->getIdiomas(0,"idioma");
                $var['nombre'] = "";
                $var['slu'] = "";
                $var['id'] = "0";
                $var['titulo'] = "NUEVA SECCION";
                $sec['contenido'] = $this->load->view('admin/seccion/nueva_seccion', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }
            //nueva pagina  
            else if ($var == "nueva-pagina") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"edit-idioma");
                $sec['contenido'] = $this->load->view('admin/pagina/nueva_pagina', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//nueva pagina
            //bloque nuevo  
            else if ($var == "bloque-nuevo") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"edit-idioma");
                $sec['contenido'] = $this->load->view('admin/bloque/bloque',$var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//bloque nuevo
            //slide nuevo  
            else if ($var == "nuevo-slide") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"edit-idioma");
                $sec['contenido'] = $this->load->view('admin/slide/slide',$var, true);                
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//slide nuevo
            //slide contenido
            else if ($var == "nuevo-cotenido-slide") {
                $var = array();
               
                $var['slide'] = $this->getslide();
                $var['id_img'] = "";
                $var['titulo'] = "";
                $var['contenido'] = "";
                $var['txtboton'] = "";
                $var['urlboton'] = "";
                $sec['contenido'] = $this->load->view('admin/slide/nuevo_contenido_slide',$var, true);                
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//slide contenido
            //galeria nuevo  
            else if ($var == "nueva-galeria") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"edit-idioma");
                $sec['contenido'] = $this->load->view('admin/galeria/galeria',$var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//galeria nuevo
            else if ($var == "editar-seccion") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"edit-idioma");
                $sec['contenido'] = $this->load->view('admin/seccion/editar_seccion', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//editar seccion
            else if ($var == "eliminar-seccion") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"eliminar-idioma");
                $sec['contenido'] = $this->load->view('admin/seccion/editar_seccion', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//eliminar seccion             
            else if ($var == "subir-imagen") {
                $var = array();
                $var['idioma'] = $this->getIdiomasSigla(0,"eliminar-idioma");
                $var['galeria'] = $this->getGalerias();
                $var['id'] ="0";
                $var['idimagen'] ="0";
                $var['titulo'] ="";
                $var['text_alt'] = "";
                $var['files'] = "";
                $var['file'] = "";
               // $var['upload'] = $this->load->view('admin/elementos/ajaxfileupload',null,true);
                $var['upload'] = "";
                $sec['contenido'] = $this->load->view('admin/archivo/subir_archivo', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//subir-imagen  
            //subir imagen sola
            else if ($var == "subir-imagen-sola") {
                $var = array();
               
                $var['id'] ="0";               
                $var['titulo'] ="";
                $var['text_alt'] = "";
                
                
               // $var['upload'] = $this->load->view('admin/elementos/ajaxfileupload',null,true);
                $var['upload'] = "";
                $sec['contenido'] = $this->load->view('admin/archivo/subir_img_sola', $var, true);
                $cont['main'] = $this->load->view('admin/elementos/main', $sec, true);
            }//subir imagen sola
            else if ($var == "tiny") {
                $del['contenido'] = $this->load->view('admin/wisiwi/tiny',null,true);
                $cont['main'] = $this->load->view('admin/elementos/main', $del, true);
            }
            echo $this->load->view('admin/administrador', $cont, true);
            //impresion el template
        } else {
            redirect();
        }
    }

    
    
    function getGalerias()
    {        
            $this->load->model('galeria/galeria_model','gal');
            $lista = $this->gal->get_galerias(); 
            return $this->crea_select($lista, "select-galeria", "wrapper-select", "", "galeria");
    }
    function getslide()
    {        
            $this->load->model('slide/slide_model','gal');
            $lista = $this->gal->getslide(); 
            return $this->crea_select($lista, "select-slide", "wrapper-select", "", "slide");
    }
    
    
    function error() {
        $lista['pf'] = "";
        $menu['mensaje'] = "";
        $menu['contenido'] = "";
        $menu['menu'] = "";
        $menu['usr'] = $this->load->view('admin/elementos/user', $menu, true);
        $cont['header'] = $this->load->view('admin/elementos/header', $menu, true);
        $cont['preface'] = $this->load->view('admin/elementos/preface', $lista, true);
        $err['contenido'] = $this->load->view('error');
        $cont['main'] = $this->load->view('admin/elementos/main', $err, true);
        $cont['footer'] = $this->load->view('admin/elementos/footer', null, true);
        echo $this->load->view('admin/administrador', $cont, true);
    }

    function getIdiomas($seleccion = "",$nombre) {
        $this->load->model('util', 'util');
        $lista['lista'] = $this->util->getidiomas();
        $lista['id'] = $seleccion;
        $lista['nombre'] = $nombre;
        return $this->load->view('admin/elementos/select', $lista, true);
    }

    function getIdiomasSigla($seleccion = "",$nombre) {
        $this->load->model('util', 'util');
        $lista['lista'] = $this->util->getidiomas();
        $lista['id'] = $seleccion;
        $lista['nombre'] = $nombre;
        return $this->load->view('admin/elementos/select_sigla', $lista, true);
    }
    private function crea_select($lista,$id,$clase,$opcion,$nombre)
    {
        $dat['lista']=$lista;
        $dat['id']=$id;
        $dat['clase']=$clase;
        $dat['opcion']=$opcion;
        $dat['nombre']=$nombre;
        return $this->load->view('admin/elementos/crear_select',$dat,true);
    }
    
}

