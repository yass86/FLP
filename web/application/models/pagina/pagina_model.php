<?php
class pagina_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
   function nuevapagina($var="")
    {
         
        $echo = false;
        $sql="";
        if($var!="")
        {            
            if($var['id']==0)
            {
               $att = array();
               $att[0]=$var['seccion'];
               $att[1]=$var['slu'];
               $att[2]=$var['titulo'];
               $att[3]=$var['txt_destacado'];               
               $att[4]=$var['archivo'];
               $att[5]=$var['contenido'];
               
               $var = $att;
                $sql = "INSERT INTO pagina (id_seccion,slu,titulo,texto_destacado,imagen,contenido_body_wisi)
                VALUES 
                (?,?,?,?,?,?)";
            }
            else
            {
                /*
                $in[0]=$var['nombre'];
                $in[1]=$var['idioma'];
                $in[2]=$var['slu'];                
                $sql = "Update seccion 
                    set nombre = ?,
                    idioma = ?,
                    slu_seccion = ? where id_seccion = ".$var['id'];
                $var=$in;*/
            }         
             if($this->db->query($sql,$var))
             {
                 $echo = true;
             }
        }
        return $echo;
    } 
    function get_pagina($id_pagina="")
    {
        $atributos = array();
        if($id_pagina!="")
        {
            $sql = "select * from pagina where id_pagina  = $id_pagina";
            $lista = $this->db->query($sql)->result();
            foreach ($lista as $value) 
            {
                $atributos['id']= $value->id_pagina;
                $atributos['titulo']= $value->titulo;
                $atributos['destacado']= $value->texto_destacado;
                $atributos['contenido']= $value->contenido_body_wisi;
                $atributos['imagen']= $value->imagen;
            }
            
        }
        return $atributos;
    }
    function get_seccion($id)
    {
        $sql = "select seccion.nombre,id_seccion from seccion join idioma on idioma=id_idioma where sigla = '$id'";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function buscarSeccion($id)
    {
        $sql="select * from seccion where id_seccion = $id";
        return $this->db->query($sql)->result();
    }
}