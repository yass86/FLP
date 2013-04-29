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
    
    function actualizar_usuario($var="")
    {
        $echo = false;
        if($var!="")
        {
            $sql = "UPDATE usuario 
                set nombre = ?,
                set mail = ?,
                set pass = ?,
                set tipo = ? WHERE id_usuario = ".$var['id']."";
                
             if($this->db->query($sql,$var))
             {
                 $echo = true;
             }
        }
        return $echo;
    }  
    function validarEmail($mail="")
    {
        $existe = "-1";
        if($mail!="")
        {
            $sql = "SELECT id_usuario from usuario where mail = '$mail'";
             $lista = $this->db->query($sql)->result();             
             foreach ($lista as $value) {
                 $existe = $value->mail;                 
             }
        }
        echo $existe;
    }
    function getdatos_usuario($id="")
    {
       $existe=null;
        if($id!=null)
        {
            $sql = "SELECT * from usuario where id_usuario = '$id'";
             $lista = $this->db->query($sql)->result();             
             foreach ($lista as $value) {
                 $existe['id']= $value->id_usuario;
                 $existe['nombre']= $value->nombre;
                 $existe['mail']= $value->mail;
                 $existe['pwd']= $value->pass;                 
             }
        }
        return $existe;
    }
}
?>