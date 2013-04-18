<?php
class util extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    
  
    function buscarTerceroID($cc="")
    {
         $sql="select * from eduaccounts_table where IDAccount =$cc";
         $retorno = $this->db->query($sql)->result();            
         return $retorno;     
    }
    function buscarTerceroany($txt="")
    {
         $sql="select * from eduaccounts_table where Surname like '$txt%' or Name like '$txt%' or Nit like '$txt%'";
         $retorno = $this->db->query($sql)->result();            
         return $retorno;     
    }
    function buscarTercero($cc="")
    {
         $sql="select * from eduaccounts_table where nit =$cc";
         $retorno = $this->db->query($sql)->result();            
         return $retorno;     
    }
    function getTopMenu()
    {       
         $sql="select tipo from menu group by tipo order by orden asc";
         $retorno = $this->db->query($sql)->result();            
         return $retorno;       
    }
    function getSubMenu($tipo)
    {
         $sql="select * from menu where tipo = '$tipo' order by id_menu asc";
         $retorno = $this->db->query($sql)->result();            
         return $retorno;  
    }
     function armarSelectoresLevel($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDLevel' id='IDLevel'>";
            foreach ($lista as $key => $value) {
                if($key==$id)
                    $reto.="<option  value='$value->IDLevel' selected='selected'>$value->Name</option>";
                else
                    $reto.="<option value='$value->IDLevel' >$value->Name</option>";
            }
            $reto.=" </select>";
            return $reto;
        }
        function armarSelectoresEstablishment($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDEstablishment' id='IDEstablishment'>";
             foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option  value='$value->IDEstablishment'  selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDEstablishment'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresIDSchedule($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDSchedule' id='IDSchedule'>";
            foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$value->IDSchedule' selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDSchedule'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresEstado($id="",$comp="")
        {
            $lista[0]="POR APROBAR";
            $lista[1]="LEGALIZADO";
            $lista[2]="CIERRE TEMPORAL";
            $lista[3]="CIERRE TOTAL";
            
            $reto=" <select $comp name='State' id='State'>";
             foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$key' selected='selected'>$value</option>";
                else
                $reto.="<option value='$key'>$value</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresGenero($id="",$comp="")
        {
            $lista[0]="MASCULINO";
            $lista[1]="FEMENINO";
            $lista[2]="MIXTO";

            $reto=" <select $comp name='Gender' id='Gender'>";
             foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$key' selected='selected'>$value</option>";
                else
                $reto.="<option value='$key'>$value</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresPeriodos($id="",$comp="")
        {
            $lista[0]="1";
            $lista[1]="2";
            $lista[2]="3";
            $lista[3]="4";

            $reto=" <select $comp name='Periods' id='Periods'>";
            foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$key' selected='selected'>$value</option>";
                else
                $reto.="<option value='$key'>$value</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
}
?>