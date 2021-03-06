<?php
class bloque_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
   function nuevobloque($var="")
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
               $att[2]=$var['contenido'];
               $att[3]=$var['txtboton'];               
               $att[4]=$var['urlboton'];               
               $att[5]=$var['archivo'];
                              
               $var = $att;
                $sql = "INSERT INTO bloque (id_seccion,titulo,contenido,txt_boton,url_boton,imagen)
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
    
    function get_seccion($id)
    {
        $sql = "select seccion.nombre,id_seccion from seccion join idioma on idioma=id_idioma where sigla = '$id'";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function get_operaciones($idioma)
    {
        if($idioma=="es")
            $idioma=1;
        else
            $idioma=2;
        
        $sql = "SELECT * FROM operaciones_pais join seccion on id_seccion = seccion where seccion.idioma = $idioma";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function getBloque($id)
    {
        $sql = "select * from bloque where id_bloque = $id";
        $lista = $this->db->query($sql)->result();
        
        $var = array();
            $var['id']="";
            $var['titulo']="";
            $var['imagen']="";
            $var['contenido']="";
            $var['url_boton']="";
            $var['txt_boton']="";
        foreach ($lista as $value) {
            $var['id']=$value->id_bloque;
            $var['titulo']=$value->titulo;
            if($value->imagen!="no destino")
                $var['imagen']=$value->imagen;
            else
                $var['imagen']=  "theme/images/default.jpg";
            $var['contenido']=$value->contenido;
            $var['url_boton']=$value->url_boton;
            $var['txt_boton']=$value->txt_boton;
        }
        
        return $var;
    }
    function buscarSeccion($id)
    {
        $sql="select * from seccion where id_seccion = $id";
        return $this->db->query($sql)->result();
    }
}