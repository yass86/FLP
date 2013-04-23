<?php
class usuario_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
   
    function crear_usuario($var="")
    {
        $echo = false;
        if($var!="")
        {
            $sql = "INSERT INTO usuario (nombre,mail,pass,tipo)
                VALUES 
                (?,?,?,?)";
             if($this->db->query($sql,$var))
             {
                 $echo = true;
             }
        }
        return $echo;
    }  
    function validarEmail($mail="")
    {
        $existe = false;
        if($mail!="")
        {
            $sql = "SELECT id_usuario from usuario where mail = '$mail'";
             $lista = $this->db->query($sql)->result();             
             foreach ($lista as $value) {
                 $existe = true;                 
             }
        }
        return $existe;
    }
}
?>