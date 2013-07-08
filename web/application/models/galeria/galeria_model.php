<?php
class galeria_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
   function nueva_galeria($var="")
    {         
        $echo = false;
        $sql="";
        if($var!="")
        {            
            if($var['id']==0)
            {
               $att = array();
               $att[0]=$var['seccion'];                              
               $att[1]=$var['tipo'];                              
               $att[2]=$var['titulo'];                              
               $att[3]=$var['txtpregaleria'];                              
               $att[4]=$var['txtposgaleria'];                              
               $att[5]=$var['txtboton'];                              
               $att[6]=$var['urlboton'];                              
                              
               $var = $att;
                $sql = "INSERT INTO galeria (id_seccion,tipo,titulo,txtpregaleria,txtposgaleria,txtboton,urlboton)
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
    function get_galerias()
    {
        $sql = "select id_galeria as opcion,titulo as valor from galeria;";
        $lista = $this->db->query($sql)->result();
        return $lista;
    }
    function getGaleriasID($idGaleria="")
    {
        $lista = array();
        $lista['id_galeria']="";
        $lista['titulo']="";
        $lista['txt_pre']="";
        $lista['txt_pos']="";
        if($idGaleria!="")
        {
            $sql = "select * from galeria where id_galeria = $idGaleria";
            $lista = $this->db->query($sql)->result();
            
            foreach ($lista as $value) 
            {
                $lista['id_galeria']=$value->id_galeria;
                $lista['titulo']=$value->titulo;
                $lista['txt_pre']=$value->txtpregaleria;
                $lista['txt_pos']=$value->txtposgaleria;                
            }
        }
        
        //obtener imagenes
        $sql="select * from imagen where id_galeria = ".$lista['id_galeria'];
        $fotos = $this->db->query($sql)->result();
        
        $lista['lista']=$fotos;
        
        return $lista;
    }
    function buscarSeccion($id)
    {
        $sql="select * from seccion where id_seccion = $id";
        return $this->db->query($sql)->result();
    }
}