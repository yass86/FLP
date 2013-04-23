<?php
class admin_model extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    //obtenr menu de la base de datos 
    function getMenu()
    {
        $sql="SELECT tipo FROM menu GROUP BY tipo";        
        $resultado = $this->db->query($sql)->result();
        $lista =  array();        
        foreach ($resultado as $value) {
            $lista[$value->tipo] = $this->construirSubmenu($value->tipo);
        }
        return $lista;
    }
    function construirSubmenu($tipo="")
    {
        $resultado = null;
        if($tipo!="")
        {
            $sql="SELECT * FROM menu where tipo = '$tipo' order by orden asc";        
            $resultado = $this->db->query($sql)->result();
        }
        return $resultado;
    }
    //validacin de usuarios 
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
    //obtener datos del usuario 
    function getDatosUsuario($mail)
    {
        $sql="SELECT * FROM usuario WHERE mail ='$mail'";
        $resultado = $this->db->query($sql);
        $tmp= $resultado->result();
        return $tmp;
    }
}