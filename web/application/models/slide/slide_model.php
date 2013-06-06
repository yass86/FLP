<?php
class slide_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
    
    
    function getslide()
    {
        $sql="SELECT id_slide as opcion,nombre as valor from slide";
        return $this->db->query($sql)->result();
    }
    
   function nuevoslide($var="")
    {
         
        $echo = false;
        $sql="";
        if($var!="")
        {            
            if($var['id']==0)
            {
               $att = array();
               $att[0]=$var['seccion'];               
               $att[1]=$var['titulo'];        
               $var = $att;
                $sql = "INSERT INTO slide (id_seccion,nombre)
                VALUES 
                (?,?)";
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
   function nuevo_contenido_slide($var="")
    {
         
        $echo = false;
        $sql="";
        if($var!="")
        {            
            if($var['id']==0)
            {
               $att = array();
               $att[0]=$var['id_slide'];               
               $att[1]=$var['titulo'];               
               $att[2]=$var['contenido'];               
               $att[3]=$var['imagen'];               
               $att[4]=$var['orden'];               
               $att[5]=$var['txtboton'];               
               $att[6]=$var['urlboton'];               
               
               $var = $att;
                $sql = "INSERT INTO img_slide (id_slide,titulo,contenido,imagen,orden,txtboton,urlboton)
                VALUES 
                (?,?,?,?,?,?,?)";
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