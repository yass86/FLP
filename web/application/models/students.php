<?php
class module1 extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    
    function agregarUsuario($dat="")
    {
        if($dat!="")
         {
             $sql="INSERT INTO usuario (cedula,apellido,nombre,mail,telefono,tipo,pass) VALUES (?,?,?,?,?,?,?);";
            $this->db->query($sql,$dat);
           
        }
    }
    function getUsuario($dat="")
    {
        if($dat!="")
         {
             $sql="Select from usuario where cedula = '$dat'";
            $retorno = $this->db->query($sql)->result();
            
           return $retorno;
           
        }
    }
    
}
?>