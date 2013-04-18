<?php 
class Complemento extends CI_Controller {
	public function index()
	{            
           
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        
        function getFormularioTercero()
        {
            echo $this->load->view("module4/new_account",null,true);
        }
        
        
        function buscarTercero($cc="")
        {
            $ret = "-1";
            if($cc!="")
            {
                 $this->load->model("util","util");
                $lista = $this->util->buscarTercero($cc);
                
                foreach ($lista as $value) {
                    $ret = $value->Name." ".$value->Surname."_".$value->IDAccount;
                }
            }
            echo $ret;
        }
        function getAccountByID($id="")
        {
                   $dat["IDInstitute"] = $this->session->userdata('IDInstitute');                   
                   $dat["Year"] = $this->session->userdata('anolectivo');                   
                   $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram"); 
                   $dat["tipodoc"] = $this->armarSelectoresTipoDocumento("", "name=NitType");                   
                   $dat["estudiante"] = "";                   
                   $dat["IDAccount"] = "";                   
                   $dat["NitType"] = "";                   
                   $dat["Nit"] = "";                   
                   $dat["Name"] = "";                   
                   $dat["Surname"] = "";                   
                   $dat["Telephone"] = "";                   
                   $dat["Address"] = "";                   
                   $dat["Mail"] = "";  
                   $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                   $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");
                   $contenido = $this->load->view("module4/newEstudiante",$dat,true); 
        }
        function buscarTerceroID($cc="")
        {
            $ret = "-1";
            if($cc!="")
            {
                 $this->load->model("util","util");
                $lista = $this->util->buscarTerceroID($cc);
                
                foreach ($lista as $value) {
                    $ret = $value->Name." ".$value->Surname."_".$value->IDAccount;
                }
            }
            echo $ret;
        }
        function buscarTerceroAny($txt="")
        {
            $ret = array();
            $view="";
            if($txt!="")
            {
                 $this->load->model("util","util");
                $lista = $this->util->buscarTerceroany($txt);
                $cont=0;
                foreach ($lista as $value) {
                    $ret[$cont]['cc']= $value->Nit;
                    $ret[$cont]['nombre']= $value->Name." ".$value->Surname;
                    $ret[$cont]['id']= $value->IDAccount;
                    $cont++;
                }
                $lista['lista'] = $ret;
                $view = $this->load->view('module4/lista_busqueda_account',$lista,true);
            }
            echo $view;
        }
        
        function getCursos($idGrade="",$idProgram="",$titulo="")
        {
            $dat['IDGrade']=$idGrade;
            $dat['IDProgram']=$idProgram;
            if($idGrade!=""&$idProgram!="")
            {
                 $this->load->model("institute","ins");
                 $dat['lista'] = $this->ins->getGroupCatalog($dat);
                 $dat['grado'] = $idGrade;
                 $dat['titulo'] = $titulo;
                 $dat['programa'] = $idProgram;                
                echo $this->load->view('module4/cursos',$dat,true);
            }            
        }
        function getGradosLIsta($nivel="",$titulo="")
        {
            $dat['IDLevel']=$nivel;
            if($nivel!="")
            {
                 $this->load->model("institute","ins");
                 $dat['grados'] = $this->ins->getGradeCatalog($dat);
                 $dat['nivel'] = $nivel;
                 $dat['titulo'] = $titulo;                
                echo $this->load->view('module4/view_gradoslista',$dat,true);
            }            
        }
        function getGrados($nivel="",$titulo="")
        {
            $dat['IDLevel']=$nivel;
            if($nivel!="")
            {
                 $this->load->model("institute","ins");
                 $dat['grados'] = $this->ins->getGradeCatalog($dat);
                 
                 $dat['grados'] = $this->traduciorCalificacion($dat['grados']);
                 $dat['nivel'] = $nivel;
                 $dat['titulo'] = $titulo;
                echo $this->load->view('module4/view_grados',$dat,true);
            }            
        }
        function traduciorCalificacion($lista)
        {
            foreach ($lista as $value) {
                $value->EvaluationType = $this->armarSelectoresTipoCalificacion($value->EvaluationType, "name=EvaluationType id=EvaluationType class=edit lang=".$value->IDGrade."");
            }
            return $lista;
        }
        function getSubAsignaturas($asignatura="",$titulo="")
        {
            $dat['IDMatter']=$asignatura;
            if($asignatura!="")
            {
                 $this->load->model("institute","ins");
                 $dat['grados'] = $this->ins->getAchievementCatalog($dat);
                 $dat['nivel'] = $asignatura;
                 $dat['titulo'] = str_replace("%20", " ", $titulo);
                 $dat['titulo'] = str_replace("%C3%91", "Ñ",  $dat['titulo']);
                echo $this->load->view('module4/view_subasignatura',$dat,true);
            }            
        }
        function getLogros($asignatura="",$titulo="")
        {
            $dat['IDMatter']=$asignatura;
            if($asignatura!="")
            {
                 $this->load->model("institute","ins");
                 $dat['grados'] = $this->ins->getObjectiveCatalog($dat);
                 $dat['nivel'] = $asignatura;
                 $dat['titulo'] = str_replace("%20", " ", $titulo);
                 $dat['titulo'] = str_replace("%C3%91", "Ñ",  $dat['titulo']);
                echo $this->load->view('module4/view_logro',$dat,true);
            }            
        }
        function getAsignatura($nivel="",$titulo="")
        {
            $dat['IDGrade']=$nivel;
            if($nivel!="")
            {
                 $this->load->model("institute","ins");
                 $dat['grados'] = $this->ins->getMatterCatalog($dat);
                 
                 $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                 $lista = $dat['grados'];
                 
             foreach ($lista as $key => $value) {
                 
                $value->IDAcademicArea=$this->armarSelectoresAcademicArea($this->ins->getAcademicAreaCatalog($dat),$value->IDAcademicArea,"lang ='$value->IDMatter' class='edit'");                                 
            }
                  $dat['grados'] = $lista;
                  $dat['areas'] = $this->armarSelectoresAcademicArea($this->ins->getAcademicAreaCatalog($dat));
                 
                 $dat['nivel'] = $nivel;
                 $dat['titulo'] = $titulo;
                echo $this->load->view('module4/view_asignatura',$dat,true);
            }            
        }
        function armarSelectoresAcademicArea($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDAcademicArea' id='IDAcademicArea'>";
            foreach ($lista as $key => $value) {
                if($value->IDAcademicArea==$id)
                $reto.="<option value='$value->IDAcademicArea' selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDAcademicArea'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresTipoCalificacion($id="",$comp="")
        {
            $lista = array();
            $lista[1]="NUMERICO";
            $lista[2]="TEXTO";
            $lista[3]="GRAFICO";
            $reto=" <select $comp >";
            foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$key' selected='selected'>$value</option>";
                else
                $reto.="<option  value='$key'>$value</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function cargarExcel()
        {
             $this->load->library('excel/reader');
             $data = new Spreadsheet_Excel_Reader();
             $data->setOutputEncoding('CP1251');
             $data->read('../files/prueba.xls');
             echo $data->sheets[0]['cells'][1][1];
             echo $data->sheets[0]['cells'][1][2];
        }
}

