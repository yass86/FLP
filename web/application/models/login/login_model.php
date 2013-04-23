<?php
class login_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    function validarUsuario($usuario,$password)//obtener el listado de productos
    {
        $sql="SELECT mail,pass FROM usuario WHERE mail ='$usuario'";
        $resultado = $this->db->query($sql);
        $tmp= $resultado->result();
        $retorno = "false";
        foreach ($tmp as $value) {
            if($value->mail==$usuario & $value->pass == $password){
                $retorno = "true";
            }    
        }
        return $retorno;
    }
    function getDatosUsuario($mail)
    {
        $sql="SELECT * FROM usuario WHERE mail ='$mail'";
        $resultado = $this->db->query($sql);
        $tmp= $resultado->result();
        return $tmp;
    }
}