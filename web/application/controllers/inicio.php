<?php 
class Inicio extends CI_Controller {
	public function index()
	{
           /* $sesion = array();
            $sesion["IDInstitute"]=1;
            $sesion["anolectivo"]=2012;
            $sesion["amc"]="ADVANTAGE MICROSYSTEMS";
            $this->session->set_userdata($sesion);
            $dat["lista"]=  $this->getMenusTop();
            $cont["menu"] = $this->load->view("menu",$dat,true);
                    echo $this->load->view('template',$cont,true);
           */
            echo $this->load->view('template',null,true);
                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
        function ir($url="",$var="")
        {
             $this->load->model("institute","ins");
            $contenido="";
           if($url!="")
           {
               if($url=="perfil")
               {
                 
                  $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                   $val = $this->ins->getInstituteByID($dat);
                   $datos["id"] ="0";
                   $datos["dane"] ="";
                   $datos["nombre"] ="";
                   $datos["tercero"] ="";
                   $datos["ano"] ="";
                   $datos["periodo"] =  $this->armarSelectoresPeriodos("","name='Period'");
                  
                  
                   foreach ($val as $value) {
                        $datos["id"] =$value->IDInstitute;
                        $datos["dane"] =$value->Code;
                        $datos["nombre"] =$value->Name;
                        $datos["tercero"] ="";
                        $datos["ano"] =$value->Year;;
                        $datos["periodo"] =  $this->armarSelectoresPeriodos($value->Period, "name='Period'");
                   }
                          $contenido = $this->load->view("module5/crear_perfil",$datos,true);            
               }
               else if($url=="sedes")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                    $val["lista"] = $this->ins->getEstablishmentCatalog($dat);
                    $contenido = $this->load->view("module5/sedes",$val,true);  
               }
               else if($url=="jornadas")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                    $val["lista"] = $this->ins->getScheduleCatalog($dat);                                      
                    $contenido = $this->load->view("module5/jornadas",$val,true);  
               }
               else if($url=="niveles")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                    $val["lista"] = $this->ins->getLevelCatalog($dat);                                      
                    $contenido = $this->load->view("module5/niveles",$val,true);  
               }
               else if($url=="areas")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                    $val["lista"] = $this->ins->getAcademicAreaCatalog($dat);                                      
                    $contenido = $this->load->view("module5/areas",$val,true);  
               }
               else if($url=="valoracion")
               {
                    
                   $contenido = $this->valoracion();
               }
               else if($url=="programa")
               {
                   $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                   $dat["IDLevel"]=$this->armarSelectoresLevel($this->ins->getLevelCatalog($dat));
                   $dat["IDEstablishment"]=$this->armarSelectoresEstablishment($this->ins->getEstablishmentCatalog($dat));
                   $dat["IDSchedule"]=$this->armarSelectoresIDSchedule($this->ins->getScheduleCatalog($dat));
                   $dat["State"]=$this->armarSelectoresEstado();
                   $dat["Gender"]=$this->armarSelectoresGenero();
                   $dat["Periods"]=$this->armarSelectoresPeriodos();
                   $dat["lista"] = $this->ins->getProgramCatalog($dat);   
                   
                   $dat["lista"]=  $this->traducirListadoPrograma($dat["lista"]);
                   $contenido = $this->load->view("module5/programa",$dat,true);  
               }
               else if($url=="grados_nivel")
               {
                   $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                   $dat['niveles'] = $this->ins->getLevelCatalog($dat);
                   $contenido = $this->load->view("module4/grados_nivel",$dat,true);  
               }
               else if($url=="profesores")
               {
                   $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                   $dat['lista'] = $this->ins->getTeacherCatalog($dat);
                   $dat['lista'] = $this->traducirProfesores($dat['lista']);
                   $dat['nominacion'] = $this->armarSelectoresTipoNombramiento("","name=NominationType");
                   $dat['escala'] = $this->armarSelectoresNumericos("", "name=Scale");
                   $contenido = $this->load->view("module4/profesores",$dat,true);  
               }
               else if($url=="crear_estudiante")
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
                   $result = $this->load->model('util','util');
                   $lista = $this->util->buscarTerceroID($var);
                   foreach ($lista as $value) {
                        $dat["IDAccount"] = $value->IDAccount;                   
                        $dat["NitType"] = $this->armarSelectoresTipoDocumento($value->NitType, "name=NitType");;                   
                        $dat["Nit"] = $value->Nit;                   
                        $dat["Name"] = $value->Name;                   
                        $dat["Surname"] = $value->Surname;                   
                        $dat["Telephone"] = $value->Telephone;                   
                        $dat["Address"] = $value->Address;                   
                        $dat["Mail"] = $value->Mail;  
                   }
                   
                   $contenido = $this->load->view("module4/edit_account",$dat,true);  
               }
               else if($url=="edicion_cuenta")
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
                   $contenido = $this->load->view("module4/edit_cuenta",$dat,true);  
               }
               else if($url=="get_Account")
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
                   $contenido = $this->load->view("module4/edit_cuenta",$dat,true);  
               }
                else if($url=="getFormTercero")
               {
                     $dat["IDInstitute"] = $this->session->userdata('IDInstitute');                   
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
                    $contenido  = $this->load->view("module4/new_account",$dat,true);
               }
                else if($url=="horario")
               {
                     $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                    
                    $dat["materias"] = "";
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module4/horario",$dat,true);
               }
                else if($url=="evaluacion")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module3/evaluacion",$dat,true);
               }
                else if($url=="recuperacion")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module4/recuperacion",$dat,true);
               }
                else if($url=="boletin_estudiante")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module4/boletin_academico",$dat,true);
               }
                else if($url=="registro_logros")
               {
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module3/registro_logros",$dat,true);
               }
                else if($url=="asistencia")
               {
                  
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module3/asistencia",$dat,true);
               }
                else if($url=="calculoNotas")
               {
                   
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module3/estudiantes_definitivas",$dat,true);
               }
                else if($url=="nota_comportamiento")
               {
                   
                    $dat["IDInstitute"] = $this->session->userdata('IDInstitute');    
                    $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), "", "id=IDProgram");                                        
                    $dat["profesores"] = $this->armarSelectoresProfesores($this->ins->getTeacherCatalog($dat), "", "id=profesor");
                    $contenido  = $this->load->view("module3/nota_comportamiento",$dat,true);
               }
           }
           echo $contenido;            
        }
        function getProgramaById($id="")
        {
             $this->load->model("institute","ins");
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');                                      
            $dat["programas"] = $this->armarSelectoresProgram($this->ins->getProgramCatalog($dat), $id, "id=IDProgram"); 
            echo $dat["programas"];
        }
        
        function traducirProfesores($lista)
        {
            foreach ($lista as $value) {
                $value->NominationType = $this->armarSelectoresTipoNombramiento($value->NominationType,
                        "lang = '$value->IDTeacher' class=edit id=NominationType");
                $value->Scale = $this->armarSelectoresNumericos($value->Scale,
                        "lang = '$value->IDTeacher' class=edit id=Scale");
            }
            return $lista;
        }
        function traducirListadoPrograma($lista)
        {          
             $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
         
             foreach ($lista as $key => $value) {
                 $nivel[0]=$value->IDLevel;
                 $nivel[1]=$this->armarSelectoresLevel($this->ins->getLevelCatalog($dat),$value->IDLevel,"lang ='$value->IDProgram' class='edit'");
                $value->IDLevel=$nivel;
                $value->IDEstablishment=$this->armarSelectoresEstablishment($this->ins->getEstablishmentCatalog($dat),$value->IDEstablishment,"lang ='$value->IDProgram' class='edit'");   
                $value->IDSchedule=$this->armarSelectoresIDSchedule($this->ins->getScheduleCatalog($dat),$value->IDSchedule,"lang ='$value->IDProgram' class='edit'");   
                $value->State=$this->armarSelectoresEstado($value->State,"lang ='$value->IDProgram' class='edit'");   
                $value->Gender=$this->armarSelectoresGenero($value->Gender,"lang ='$value->IDProgram' class='edit'");   
                $value->Periods=$this->armarSelectoresPeriodos($value->Periods,"lang ='$value->IDProgram' class='edit'");   
               
            }
            return $lista;
        }
        function getGruposAcademicos($idProgram="")
        {
             $this->load->model("institute","ins");
            $cont ="";
            if($idProgram!="")
            {
                $cont = $this->armarSelectoresGroup($this->ins->getGroupCatalogByProgram($idProgram), "", "id=idgroupa");
            }
            echo $cont;
        }
        function getGruposAcademicosid($idProgram="",$id="")
        {
             $this->load->model("institute","ins");
            $cont ="";
            if($idProgram!="")
            {
                $cont = $this->armarSelectoresGroup($this->ins->getGroupCatalogByProgram($idProgram), $id, "id=idgroupa");
            }
            echo $cont;
        }
        function armarSelectoresProfesores($lista,$id="",$comp="")
        {
            $reto=" <select $comp ><option value=0>N/A</option>";
            foreach ($lista as $key => $value) { 
                 $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDTeacher==$id)
                    $reto.="<option  value='$value->IDTeacher' selected='selected'>$value->Name  $value->Surname</option>";
                else
                    $reto.="<option value='$value->IDTeacher' >$value->Name  $value->Surname</option>";
            }            
            $reto.=" </select>";
            return $reto;
        }
        function armarSelectoresLevel($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDLevel' id='IDLevel'>";
            foreach ($lista as $key => $value) { 
                 $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDLevel==$id)
                    $reto.="<option  value='$value->IDLevel' selected='selected'>$value->Name</option>";
                else
                    $reto.="<option value='$value->IDLevel' >$value->Name</option>";
            }            
            $reto.=" </select>";
            return $reto;
        }             
        function armarSelectoresMateria($IDLevel=0,$id="",$comp="")
        {
              $this->load->model("institute","ins");
            $lista = $this->ins->getMatterCatalog($IDLevel);
            $reto=" <select $comp name='IDMatter' id='IDMatter'><option value=0>N/A</option>";
            foreach ($lista as $key => $value) { 
                 $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDMatter==$id)
                    $reto.="<option  value='$value->IDMatter' selected='selected'>$value->Name</option>";
                else
                    $reto.="<option value='$value->IDMatter' >$value->Name</option>";
            }            
            $reto.=" </select>";
            echo $reto;
        }             
        function armarSelectoresProgramHorario($lista,$id="",$comp="")
        {
            $class="";
           
            $reto="";
             foreach ($lista as $key => $value) {
                 $class ="class = $value->IDLevel";
                  $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDProgram==$id)
                $reto.="<option  value='$value->IDProgram"."_"."$value->IDLevel'  selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDProgram"."_"."$value->IDLevel'>$value->Name</option>";
            }
             $reto1=" <select $comp $class ><option value=0>N/A</option>";
            $reto.=" </select>";
            $reto = $reto1.$reto;
             return $reto;
        }
        function armarSelectoresProgram($lista,$id="",$comp="")
        {
            $reto=" <select $comp ><option value=0>N/A</option>";
             foreach ($lista as $key => $value) {
                  $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDProgram==$id)
                $reto.="<option  value='$value->IDProgram'  selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDProgram'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresGroup($lista,$id="",$comp="")
        {
            $reto=" <select $comp ><option value=0>N/A</option>";
             foreach ($lista as $key => $value) {
                  $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDGroup==$id)
                $reto.="<option  value='$value->IDGroup'  selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDGroup'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresEstablishment($lista,$id="",$comp="")
        {
            $reto=" <select $comp name='IDEstablishment' id='IDEstablishment'>";
             foreach ($lista as $key => $value) {
                  $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDEstablishment==$id)
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
                 $value->Name = str_replace("%20", " ", $value->Name);
                if($value->IDSchedule==$id)
                $reto.="<option value='$value->IDSchedule' selected='selected'>$value->Name</option>";
                else
                $reto.="<option  value='$value->IDSchedule'>$value->Name</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresTipoDocumento($id="",$comp="")
        {
            $lista[0]="TI";
            $lista[1]="CC";
            $lista[2]="Pasaporte";
            $lista[3]="NIT";
            $lista[4]="Registro Civil";
            
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
        function armarSelectoresTipoNombramiento($id="",$comp="")
        {
            $lista[1]="PSICORIENTADOR";
            $lista[2]="COORDINADOR";
            $lista[3]="DOCENTE";
            $lista[4]="RECTOR";

            $reto=" <select $comp >";
             foreach ($lista as $key => $value) {
                if($key==$id)
                $reto.="<option value='$key' selected='selected'>$value</option>";
                else
                $reto.="<option value='$key'>$value</option>";
            }
            $reto.=" </select>";
             return $reto;
        }
        function armarSelectoresNumericos($id="",$comp="")
        {
            $lista[1]="1";
            $lista[2]="2";
            $lista[3]="3";
            $lista[4]="4";
            $lista[5]="5";
            $lista[6]="6";
            $lista[7]="7";
            $lista[8]="8";
            $lista[9]="9";
            $lista[10]="10";
            $lista[11]="11";
            $lista[12]="12";
            $lista[13]="13";
            $lista[14]="14";

            $reto=" <select $comp >";
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
        function getMenusTop()
        {
            $this->load->model("util","util");
            return $this->util->getTopMenu();
        }
        function getMenuInterno($tipo)
        {
            $tipo = str_replace("_", " ", $tipo);
            $this->load->model("util","util");
            $dat["lista"] = $this->util->getSubMenu($tipo);
            echo $this->load->view("menu_interno",$dat,true);
        }
        function valoracion()
        {
             $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
                    $val = $this->ins->getValuationScaleCatalog($dat);
                       
                    if(isset($val)){
                            $dat["TopScale"]=$val[0]->TopScale;
                            $dat["HighScale"]=$val[0]->HighScale;
                            $dat["BasicScale"]=$val[0]->BasicScale;
                            $dat["LowScale"]=$val[0]->LowScale;
                            $dat["TopLetter"]=$val[0]->TopLetter;
                            $dat["HighLetter"]=$val[0]->HighLetter;
                            $dat["BasicLetter"]=$val[0]->BasicLetter;
                            $dat["LowLetter"]=$val[0]->LowLetter;
                            $dat["TopImage"]=$val[0]->TopImage;
                            $dat["HighImage"]=$val[0]->HighImage;
                            $dat["BasicImage"]=$val[0]->BasicImage;
                            $dat["LowImage"]=$val[0]->LowImage;
                    }
                    else{
                            $dat["TopScale"]="";
                            $dat["HighScale"]="";
                            $dat["BasicScale"]="";
                            $dat["LowScale"]="";
                            $dat["TopLetter"]="";
                            $dat["HighLetter"]="";
                            $dat["BasicLetter"]="";
                            $dat["LowLetter"]="";
                            $dat["TopImage"]="";
                            $dat["HighImage"]="";
                            $dat["BasicImage"]="";
                            $dat["LowImage"]="";
                    }
                    
                    
                    
                    
                    $contenido = $this->load->view("module5/valoracion",$dat,true);  
                    return $contenido;
        }
}

