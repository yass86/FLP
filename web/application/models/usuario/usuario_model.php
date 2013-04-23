<?php
class usuario_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
   
    function crear_usuario($var="")
    {
        if($var!="")
        {
            $sql = "INSERT INTO usuario (nombre,mail,pass,tipo)
                VALUES 
                (?,?,?,?)";
             $this->db->query($sql,$var);
        }
    }  
}
?>