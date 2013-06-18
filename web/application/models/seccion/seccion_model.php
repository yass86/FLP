<?php
class seccion_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
   function nueva_seccion($var="")
    {
        $echo = false;
        $sql="";
        if($var!="")
        {            
            if($var['id']==0)
            {
                $in[0]=$var['nombre'];
                $in[1]=$var['idioma'];
                $in[2]=$var['slu'];
                $var=$in;
                $sql = "INSERT INTO seccion (nombre,idioma,slu_seccion)
                VALUES 
                (?,?,?)";
            }
            else
            {
                $in[0]=$var['nombre'];
                $in[1]=$var['idioma'];
                $in[2]=$var['slu'];                
                $sql = "Update seccion 
                    set nombre = ?,
                    idioma = ?,
                    slu_seccion = ? where id_seccion = ".$var['id'];
                $var=$in;
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
    function get_secciones($idioma)
    {
        if($idioma=='es')
            $idioma=1;
        else {
                $idioma=2;
        }
        
        $sql = "select * from seccion where idioma = $idioma";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function get_subsecciones($idseccion)
    {
                
        $sql = "SELECT nombre,slu_seccion,slu,titulo FROM seccion join pagina on
            seccion.id_seccion = pagina.id_seccion where seccion.id_seccion = $idseccion";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function buscarSeccion($id)
    {
        $sql="select * from seccion where id_seccion = $id";
        return $this->db->query($sql)->result();
    }
}