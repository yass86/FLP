<?php
class archivo_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    
   function nuevofile($var="")
    {
         
        $echo = false;
        $sql="";
         
        if($var!="")
        {            
            if($var['idimagen']==0)
            { 
               $att = array();
               $att[0]=$var['id'];
               $att[1]=$var['tipo'];
               $att[2]=$var['titulo'];
               $att[3]=$var['text_alt'];
               $att[4]=$var['archivo'];
               $var = $att;
                $sql = "INSERT INTO imagen (id_galeria,tipo,titulo,text_alt,ruta)VALUES(?,?,?,?,?)";
            }
            else
            {
               
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