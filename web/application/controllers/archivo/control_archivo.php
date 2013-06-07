<?php

class Control_archivo extends CI_Controller {

    public function index($idioma = "", $seccion = "", $pagina = "") {
        redirect();
    }

    function precarga() {
        echo $this->load->view("preload", null, true);
    }

    function cargar_archivo($seccion = "") {
        $pagina = "";
        if ($seccion != "") {
            $dat = array();
            $dat['id'] = 0;
            $dat['seccion'] = $seccion;
            $dat['slu'] = "";
            $dat['titulo'] = "";
            $dat['txt_destacado'] = "";
            $dat['imagen'] = "";
            
            
            $pagina = $this->load->view('admin/pagina/pagina', $dat, true);
        }
        echo $pagina;
    }
    
    function subirarchivo() 
    {
        if ($this->seccionActiva()) {
            $var = array();
            $var['idimagen'] = $this->input->post('idimagen', true);
            $var['id'] = $this->input->post('idgaleria', true);
            $var['tipo'] = '1';
            $var['titulo'] = $this->input->post('titulo', true);
            $var['text_alt'] = $this->input->post('text_alt', true);           
            $var['archivo'] = $this->almacenarFoto();           
            $this->load->model('archivo/archivo_model', 'archivo');
            $inserto = $this->archivo->nuevofile($var);
            if ($inserto)
                redirect('admin/ir/subir-imagen');
            else
                redirect('admin/error');
        }
        else 
            {
            redirect('login');
        }
    }
    function subirarchivo_img() 
    {
        if ($this->seccionActiva()) {
            $var = array();
           
            $var['id'] = $this->input->post('idimagen', true);
            $var['tipo'] = '1';
            $var['titulo'] = $this->input->post('titulo', true);
            $var['text_alt'] = $this->input->post('text_alt', true);           
            $var['archivo'] = $this->almacenarFoto();           
            $this->load->model('archivo/archivo_model', 'archivo');
            $inserto = $this->archivo->nuevofile_img($var);
            if ($inserto)
                redirect('admin/ir/subir-imagen-sola');
            else
                redirect('admin/error');
        }
        else 
            {
            redirect('login');
        }
    }

   function almacenarFoto() 
   {       
        $tamano = $_FILES["archivo"]['size'];
        $tipo = $_FILES["archivo"]['type'];
        $archivo = $_FILES["archivo"]['name'];
        $prefijo = substr(md5(uniqid(rand())), 0, 6);
        $destino = "no destino";       

        if ($archivo != "") {
            // guardamos el archivo a la carpeta files
            $destino = "files/" . $prefijo . "_" . $archivo;   
         
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destino)) {
                $save = $prefijo . "_" . $archivo;              
                //$this->redimensionar_imagen_hw($_FILES['archivo']['tmp_name'], $save, 200, 200);
            } else {
               
            }
        }
        return $destino;
    }
    
    function redimensionar_imagen_hw($imagen, $nombre_imagen_asociada,$widh,$heigt)
     {
       //indicamos el directorio donde se van a colgar las imÃ¡genes
       $directorio = 'minifiles/' ;
       //establecemos los lÃ­mites de ancho y alto
       $nuevo_ancho = $widh ;
       $nuevo_alto = $heigt ;
 
       //Recojo informaciÃ³n de la imÃ¡gen
       $info_imagen = getimagesize($imagen);
       $alto = $info_imagen[1];
       $ancho = $info_imagen[0];
       $tipo_imagen = $info_imagen[2];
 
       //Determino las nuevas medidas en funciÃ³n de los lÃ­mites
       if($ancho > $nuevo_ancho OR $alto > $nuevo_alto)
       {
         if(($alto - $nuevo_alto) > ($ancho - $nuevo_ancho))
         {
           $nuevo_ancho = round($ancho * $nuevo_alto / $alto,0) ;    
         }
         else
         {
           $nuevo_alto = round($alto * $nuevo_ancho / $ancho,0);  
         }
       }
       else //si la imagen es mÃ¡s pequeÃ±a que los lÃ­mites la dejo igual.
       {
         $nuevo_alto = $alto;
         $nuevo_ancho = $ancho;
       }
 
       // dependiendo del tipo de imagen tengo que usar diferentes funciones
       switch ($tipo_imagen) {
         case 1: //si es gif â€¦
           $imagen_nueva = imagecreate($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefromgif($imagen);
           //cambio de tamaÃ±oâ€¦
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagegif($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
         break;
 
         case 2: //si es jpeg â€¦
           $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefromjpeg($imagen);
           //cambio de tamaÃ±oâ€¦
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagejpeg($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
         break;
 
         case 3: //si es png â€¦
           $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
           $imagen_vieja = imagecreatefrompng($imagen);
           //cambio de tamaÃ±oâ€¦
           imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
           if (!imagepng($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
 
         break;
       }
       return true; //si todo ha ido bien devuelve true
 
     }
    //verificar que exista una seccion activa 
    private function seccionActiva() {
        $activa = false;
        if ($this->session->userdata('id') != null)
            $activa = true;
        return $activa;
    }

    function getIdiomas($seleccion = "") {
        $this->load->model('util', 'util');
        $lista['lista'] = $this->util->getidiomas();
        $lista['id'] = $seleccion;
        $lista['nombre'] = "idioma";
        return $this->load->view('admin/elementos/select', $lista, true);
    }

}

