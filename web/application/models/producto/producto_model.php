<?php
class producto_model extends CI_Model 
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
    
    function getListaProductos($idioma)
    {
        $sql="SELECT * FROM producto where idioma = '$idioma'";                
        $lista = $this->db->query($sql)->result(); 
        
        $var = array();
        
        
        
    }
    
    function getNutricion($idproducto="")
    {       
            $producto = $this->get_producto($idproducto);
            $sql="select * from tabla_nutricional where id_producto = ".$producto['id_producto'];
        
        $lista = $this->db->query($sql)->result();    
        $lis=array();
        $lis['calorias']="";
        $lis['grace_crude']="";
        $lis['agua']="";
        $lis['proteinas']="";
        $lis['fibra_cruda']="";
        $lis['carbohidatros']="";
        $lis['minerales']="";
        $lis['calcio']="";
        $lis['niacina']="";
        $lis['vitaminac']="";
        $lis['potacio']="";
        $lis['hierro']="";
        $lis['propiedades']="";
        foreach ($lista as $value) {
            $lis['calorias']=$value->calorias;
            $lis['grace_crude']=$value->grace_crude;
            $lis['agua']=$value->agua;
            $lis['proteinas']=$value->proteinas;
            $lis['fibra_cruda']=$value->fibra_cruda;
            $lis['carbohidatros']=$value->carbohidatros;
            $lis['minerales']=$value->minerales;
            $lis['calcio']=$value->calcio;
            $lis['niacina']=$value->niacina;
            $lis['vitaminac']=$value->vitaminac;
            $lis['potacio']=$value->potacio;
            $lis['hierro']=$value->hierro;
            $lis['propiedades']=$value->propiedades;
        }
        return $lis;
    }
    function getConsumo($idproducto="")
    {       
            $producto = $this->get_producto($idproducto);
            $sql="select * from producto_consumo where id_producto = ".$producto['id_producto'];
        
        $lista = $this->db->query($sql)->result();    
        $lis=array();
        $lis['titulo']="";
        $lis['furta_fresca']="";
        $lis['jugo_bebida']="";
        $lis['helado']="";
        $lis['congelada']="";
        $lis['ensalada']="";
        $lis['mezcla']="";
      
        foreach ($lista as $value) {
            $lis['titulo']=$value->texto;
            $lis['furta_fresca']=$value->furta_fresca;
            $lis['jugo_bebida']=$value->jugo_bebida;
            $lis['helado']=$value->helado;
            $lis['congelada']=$value->congelada;
            $lis['ensalada']=$value->ensalada;
            $lis['mezcla']=$value->mezcla;
        }
        return $lis;
    }
    function getDisponibilidad($idproducto="")
    {       
            $producto = $this->get_producto($idproducto);
            $sql="select * from producto_disponibilidad where id_producto = ".$producto['id_producto'];
        
        $lista = $this->db->query($sql)->result();    
        $lis=array();
        $lis['enero']="";
        $lis['febrero']="";
        $lis['marzo']="";
        $lis['abril']="";
        $lis['mayo']="";
        $lis['junio']="";
        $lis['julio']="";
        $lis['agosto']="";
        $lis['septiembre']="";
        $lis['octubre']="";
        $lis['noviembre']="";
        $lis['diciembre']="";
      
        foreach ($lista as $value) {
            $lis['enero']=$value->enero;
            $lis['febrero']=$value->febrero;
            $lis['marzo']=$value->marzo;
            $lis['abril']=$value->abril;
            $lis['mayo']=$value->mayo;
            $lis['junio']=$value->junio;
            $lis['julio']=$value->julio;
            $lis['agosto']=$value->agosto;
            $lis['septiembre']=$value->septiembre;
            $lis['octubre']=$value->octubre;
            $lis['noviembre']=$value->noviembre;
            $lis['diciembre']=$value->diciembre;
        }
        
        foreach ($lis as $key => $value) {
            if($value==0)
                $lis[$key]="disp-red disp-color";
            else if($value==1)
                $lis[$key]="disp-gray disp-color";
            else if($value==2)
                $lis[$key]="disp-orange disp-color";
            else if($value==3)
                $lis[$key]="disp-green disp-color";
        }
            

        return $lis;
    }
    
    function get_producto($nombre="")
    {
        if($nombre!="")
            $sql = "select * from producto where nombre = '$nombre'";
        else
            $sql = "select * from producto limit 1";
        $lista = $this->db->query($sql)->result();        
        $producto = array();
        $producto['id_producto']="";
        $producto['tipo']="";
        $producto['icono']="";
        $producto['nombre']="";
        $producto['nombre_alternativo']="";
        $producto['nombre_botanico']="";
        $producto['descripcion']="";
        $producto['largo']="";
        $producto['grosor']="";
        $producto['peso']="";
        $producto['dulce']="";
        $producto['acido']="";
        $producto['amargo']="";
        $producto['salado']="";
        $producto['txt_sabor']="";
        $producto['img_cultivo']="";
        $producto['txt_cultivo']="";
        $producto['tiempo_vida']="";
        $producto['obs_tiempo_vida']="";
        $producto['img_int_inamduro']="";
        $producto['img_ext_inmaduro']="";
        $producto['txt_inamduro']="";
        $producto['img_int_maduro']="";
        $producto['img_ext_maduro']="";
        $producto['txt_maduro']="";
        $producto['img_origen']="";
        $producto['txt_origen']="";
        foreach ($lista as $key => $value) 
        {
            $producto['id_producto']=$value->id_producto;
            if($value->tipo==1)
                $producto['tipo']="fruta";
            else
                $producto['tipo']="vegetal";
            $producto['icono']=$value->icono;
            $producto['nombre']=$value->nombre;
            $producto['nombre_alternativo']=$value->nombre_alternativo;
            $producto['nombre_botanico']=$value->nombre_botanico;
            $producto['descripcion']=$value->descripcion;
            $producto['largo']=$value->largo;
            $producto['grosor']=$value->grosor;
            $producto['peso']=$value->peso;
            $producto['dulce']=$value->dulce;
            $producto['acido']=$value->acido;
            $producto['amargo']=$value->amargo;
            $producto['salado']=$value->salado;
            $producto['txt_sabor']=$value->txt_sabor;
            $producto['img_cultivo']=$value->img_cultivo;
            $producto['txt_cultivo']=$value->txt_cultivo;
            $producto['tiempo_vida']=$value->tiempo_vida;
            $producto['obs_tiempo_vida']=$value->obs_tiempo_vida;
            $producto['img_int_inamduro']=$value->img_int_inamduro;
            $producto['img_ext_inmaduro']=$value->img_ext_inmaduro;
            $producto['txt_inamduro']=$value->txt_inamduro;
            $producto['img_int_maduro']=$value->img_int_maduro;
            $producto['img_ext_maduro']=$value->img_ext_maduro;
            $producto['txt_maduro']=$value->txt_maduro;
            $producto['img_origen']=$value->img_origen;
            $producto['txt_origen']=$value->txt_origen;
        }     
        
        if($producto['id_producto']!="")
            return $producto;
        else
            return $this->get_producto ();
    }
   
}