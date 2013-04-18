<?php 
class Module1 extends CI_Controller {
	public function index()
	{
            
           
	}
        function editInstitute(){
           $dat["code"] = $this->input->post("dane",true);
           $dat["name"] = $this->input->post("nombre",true);
           $dat["IDInstitute"] = $this->input->post("id",true);
           $dat["type"] = $this->input->post("id",true);
           $dat["idaccount"] = $this->input->post("idaccount",true);
           $dat["year"] = $this->input->post("Year",true);
           $dat["period"] = $this->input->post("Period",true);
           $this->load->model("institute","ins");
           $this->ins->updateInstitute($dat);
           $result["mensaje"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function updateInstituteField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateInstituteField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function insertEstablishment()
        {
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["Type"]=$this->input->post("Type");
            $dat["City"]=$this->input->post("City");
            $dat["Address"]=$this->input->post("Address");
            $dat["Telephone"]=$this->input->post("Telephone");
            $dat["Director"]=$this->input->post("Director");
            $dat["IDEstablishment"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateEstablishment($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateEstablishmentField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateEstablishmentField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteEstablishment($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteEstablishment($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getEstablishmentCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getEstablishmentCatalog($dat);
           return $result;
        }
        
        function insertSchedule()
        {
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["InitHour"]=$this->input->post("InitHour");
            $dat["EndingHour"]=$this->input->post("EndingHour");
            $dat["Type"]=$this->input->post("Type");
            $dat["DailyHours"]=$this->input->post("DailyHours");
            $day = $this->input->post("Day1");
            $dat["Day1"]='0';
            if($this->input->post("Day1")=='on')
              {
                $dat["Day1"]='1';
                }
            $dat["Day2"]='0';
            if($this->input->post("Day2")=='on')
              {
                $dat["Day2"]='1';
                }
            $dat["Day3"]='0';
            if($this->input->post("Day3")=='on')
              {
                $dat["Day3"]='1';
                }
            $dat["Day4"]='0';
            if($this->input->post("Day4")=='on')
              {
                $dat["Day4"]='1';
                }
            $dat["Day5"]='0';
            if($this->input->post("Day5")=='on')
              {
                $dat["Day5"]='1';
                }
            $dat["Day6"]='0';
            if($this->input->post("Day6")=='on')
              {
                $dat["Day6"]='1';
                }
            $dat["Day7"]='0';
            if($this->input->post("Day7")=='on')
              {
                $dat["Day7"]='1';
                }
            $dat["IDSchedule"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateSchedule($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateScheduleField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            //echo "FieldValue=>".$fieldValue;
            //exit();
            $result["mensaje"] = $this->ins->updateScheduleField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteSchedule($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteSchedule($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getScheduleCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getScheduleCatalog($dat);
           return $result;
        }  
        
        function insertLevel()
        {
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["Type"]=$this->input->post("Type");
            $dat["IDLevel"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateLevel($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateLevelField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            //echo "FieldValue=>".$fieldValue;
            //exit();
            $result["mensaje"] = $this->ins->updateLevelField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteLevel($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteLevel($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getLevelCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getLevelCatalog($dat);
           return $result;
        }
        
        function insertAcademicArea()
        {
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDAcademicArea"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAcademicArea($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateAcademicAreaField($fieldName="", $fieldValue="", $key="")
        {
            $this->load->model("institute","ins");
            //echo "FieldValue=>".$fieldValue;
            //exit();
            $result["mensaje"] = $this->ins->updateAcademicAreaField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteAcademicArea($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteAcademicArea($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getAcademicAreaCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getAcademicAreaCatalog($dat);
           return $result;
        }
        function redimensionar_imagen_hw($imagen, $nombre_imagen_asociada,$widh,$heigt)
        {
        //indicamos el directorio donde se van a colgar las imÃƒÂ¡genes
        $directorio = 'minifiles/' ;
        //establecemos los lÃƒÂ­mites de ancho y alto
        $nuevo_ancho = $widh ;
        $nuevo_alto = $heigt ;

        //Recojo informaciÃƒÂ³n de la imÃƒÂ¡gen
        $info_imagen = getimagesize($imagen);
        $alto = $info_imagen[1];
        $ancho = $info_imagen[0];
        $tipo_imagen = $info_imagen[2];

        //Determino las nuevas medidas en funciÃƒÂ³n de los lÃƒÂ­mites
        if($ancho > $nuevo_ancho OR $alto > $nuevo_alto)
        {
            if(($alto - $nuevo_alto) > ($ancho - $nuevo_ancho))
            {
            $nuevo_ancho = round($ancho * $nuevo_alto / $alto,0) ;    
            }
            else
            {
            $nuevo_alto = round($alto * $nuevo_ancho / $ancho,0);  
            }
        }
        else //si la imagen es mÃƒÂ¡s pequeÃƒÂ±a que los lÃƒÂ­mites la dejo igual.
        {
            $nuevo_alto = $alto;
            $nuevo_ancho = $ancho;
        }

        // dependiendo del tipo de imagen tengo que usar diferentes funciones
        switch ($tipo_imagen) {
            case 1: //si es gif Ã¢â‚¬Â¦
            $imagen_nueva = imagecreate($nuevo_ancho, $nuevo_alto);
            $imagen_vieja = imagecreatefromgif($imagen);
            //cambio de tamaÃƒÂ±oÃ¢â‚¬Â¦
            imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            if (!imagegif($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
            break;

            case 2: //si es jpeg Ã¢â‚¬Â¦
            $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            $imagen_vieja = imagecreatefromjpeg($imagen);
            //cambio de tamaÃƒÂ±oÃ¢â‚¬Â¦
            imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            if (!imagejpeg($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;
            break;

            case 3: //si es png Ã¢â‚¬Â¦
            $imagen_nueva = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            $imagen_vieja = imagecreatefrompng($imagen);
            //cambio de tamaÃƒÂ±oÃ¢â‚¬Â¦
            imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            if (!imagepng($imagen_nueva, $directorio . $nombre_imagen_asociada)) return false;

            break;
        }
        return true; //si todo ha ido bien devuelve true

        }
        function almacenarFoto($archivo,$tmp_name)
        {
            //archivo = name
            //tmp_name = tmp_name
                $prefijo = substr(md5(uniqid(rand())),0,6);
                $nom_archivo = $prefijo."_".$archivo;

            if ($archivo != "") {
                // guardamos el archivo a la carpeta files
                $destino = "files/".$prefijo."_".$archivo;
                $nom_archivo = $destino;
               
                if (copy($tmp_name,$destino)) 
                {
                    $save=$prefijo."_".$archivo;
                    $status = "Archivo subido: <b>".$archivo."</b>";
                    $this->redimensionar_imagen_hw($tmp_name, $save,100,100);
                } 
                else 
                    {
                    $status = "Error al subir el archivo";
                }
            } 

           return $nom_archivo;

        }
        function getNormalizedFILES() 
        { 
            $newfiles = array(); 
            foreach($_FILES as $fieldname => $fieldvalue) 
                foreach($fieldvalue as $paramname => $paramvalue) 
                    foreach((array)$paramvalue as $index => $value) 
                        $newfiles[$fieldname][$index][$paramname] = $value; 

            return $newfiles; 
        } 
        function insertValuationScale()
        {
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["Since"]=$this->input->post("Since");
            $dat["Type"]=$this->input->post("Type");
            $dat["TopScale"]=$this->input->post("TopScale");
            $dat["HighScale"]=$this->input->post("HighScale");
            $dat["BasicScale"]=$this->input->post("BasicScale");
            $dat["LowScale"]=$this->input->post("LowScale");
            $dat["TopLetter"]=$this->input->post("TopLetter");
            $dat["HighLetter"]=$this->input->post("HighLetter");
            $dat["BasicLetter"]=$this->input->post("BasicLetter");
            $dat["LowLetter"]=$this->input->post("LowLetter");
           /* $dat["TopImage"]=$this->input->post("TopImage");
            $dat["HighImage"]=$this->input->post("HighImage");
            $dat["BasicImage"]=$this->input->post("BasicImage");
            $dat["LowImage"]=$this->input->post("LowImage");*/
            $dat["IDValuationScale"]=null;
            $fotos = $this->getNormalizedFILES();
            
            $name="";
            $tmp_name="";
            $cont=0;
            
            $lista_fotos=array();
            
            foreach ($fotos as $value) {
                foreach ($value as $value2) {
                    
                   // echo $value2['name']." ".$value2['tmp_name']."</br>";
                    $lista_fotos[$cont]["name"]=$value2["name"];
                    $lista_fotos[$cont]["tmp"]=$value2["tmp_name"];
                    $cont++;                    
                }               
            }            
         
            
            $ar['IDInstitute'] = $this->session->userdata('IDInstitute');
            $result = $this->getValuationScaleCatalog($ar);
            
            
            if(isset($result))
            {
                if($lista_fotos[0]['name']!="")
                    $dat["TopImage"]=  $this->almacenarFoto($lista_fotos[0]['name'], $lista_fotos[0]['tmp']);
                else {
                     $dat["TopImage"]=$result[0]->TopImage;
                }
                if($lista_fotos[1]['name']!="")
                    $dat["HighImage"]=  $this->almacenarFoto($lista_fotos[1]['name'], $lista_fotos[1]['tmp']);
                else {
                     $dat["HighImage"]=$result[1]->HighImage;
                }
                if($lista_fotos[2]['name']!="")
                    $dat["BasicImage"]=  $this->almacenarFoto($lista_fotos[2]['name'], $lista_fotos[2]['tmp']);
                else {
                     $dat["BasicImage"]=$result[2]->BasicImage;
                }
                if($lista_fotos[3]['name']!="")
                    $dat["LowImage"]=  $this->almacenarFoto($lista_fotos[3]['name'], $lista_fotos[3]['tmp']);
                else {
                     $dat["LowImage"]=$result[3]->LowImage;
                }
             /*  echo $dat["TopImage"]."</br>";
               echo $dat["HighImage"]."</br>";
               echo $dat["BasicImage"]."</br>";
               echo $dat["LowImage"]."</br>";*/
            }
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateValuationScaleValues($dat);
            redirect("inicio");
            //echo $this->load->view("mensaje",$result,true);
        }
        
        function updateValuationScaleField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            //echo "FieldValue=>".$fieldValue;
            //exit();
            $result["mensaje"] = $this->ins->updateValuationScaleField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteValuationScale($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteValuationScale($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getValuationScaleCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getValuationScaleCatalog($dat);
           return $result;
        }
        
        function insertProgram()
        {
            $dat["Year"]=$this->input->post("Year");
            $dat["Code"]=$this->input->post("Code");
            $dat["Name"]=$this->input->post("Name");
            $dat["Periods"]=$this->input->post("Periods");
            $dat["Gender"]=$this->input->post("Gender");
            $dat["State"]=$this->input->post("State");
            $dat["IDLevel"]=$this->input->post("IDLevel");
            $dat["IDEstablishment"]=$this->input->post("IDEstablishment");
            $dat["IDSchedule"]=$this->input->post("IDSchedule");
            $dat["IDProgram"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateProgram($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateProgramField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateProgramField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteProgram($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteProgram($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getProgramCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getProgramCatalog($dat);
           return $result;
        }
        
        function insertGrade()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["Color"]=$this->input->post("Color");
            $dat["EvaluationType"]=$this->input->post("EvaluationType");
            $dat["IDGrade"]=null;
            $dat["IDLevel"]=$this->input->post("IDLevel");
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateGrade($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateGradeField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateGradeField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteGrade($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteGrade($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getGradeCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getGradeCatalog($dat);
           return $result;
        }
        
        function insertMatter()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["IDAcademicArea"]=$this->input->post("IDAcademicArea");
            $dat["Achievements"]=$this->input->post("Achievements");
            $dat["WeekHours"]=$this->input->post("WeekHours");
            $dat["Average"]=$this->input->post("Average");
            $dat["IDMatter"]=null;
            $dat["IDGrade"]=$this->input->post("IDGrade");
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateMatter($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateMatterField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateMatterField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteMatter($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteMatter($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getMatterByID($IDMatter)
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getMatterByID($IDMatter);
           $ret ="-1";
           foreach ($result as $value) {
               $ret = $value->Achievements;
           }
           echo $ret;
        }
        
        function getMatterCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getMatterCatalog($dat);
           return $result;
        }
        
        function insertAchievement()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDAchievement"]=null;
            $dat["IDMatter"]=$this->input->post("IDMatter");
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAchievement($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateAchievementField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAchievementField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteAchievement($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteAchievement($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getAchievementCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getAchievementCatalog($dat);
           return $result;
        }
        
        function getAchievementCatalogByIDMatter($IDMatter)
        {
           $dat["IDMatter"] = $IDMatter;
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result['lista'] = $this->ins->getAchievementCatalog($dat);
           $retorno = $this->load->view('module3/select_subasignatura',$result,true);
           echo $retorno;
        }
        
        function insertTeacher()
        {
            $dat["IDAccount"]=$this->input->post("IDAccount");
            $dat["Name"]=$this->input->post("Name");
            $dat["Surname"]=$this->input->post("Surname");
            $dat["Nit"]=$this->input->post("Nit");
            $dat["Resolution"]=$this->input->post("Resolution");
            $dat["NominationType"]=$this->input->post("NominationType");
            $dat["Title"]=$this->input->post("Title");
            $dat["Scale"]=$this->input->post("Scale");
            $dat["State"]=$this->input->post("State");
            $dat["IDTeacher"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateTeacher($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateTeacherField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateTeacherField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteTeacher($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteTeacher($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getTeacherCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getTeacherCatalog($dat);
           return $result;
        }
        
        function insertGroup()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDProgram"]=$this->input->post("IDProgram");
            $dat["IDGrade"]=$this->input->post("IDGrade");
            $dat["IDGroup"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateGroup($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateGroupField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateGroupField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteGroup($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteGroup($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getGroupCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getGroupCatalog($dat);
           return $result;
        }
        
        function getGroupCatalogByProgram()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getGroupCatalogByProgram($dat);
           return $result;  
        }
        
        function insertCourse()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDMatter"]=$this->input->post("IDMatter");
            $dat["IDTeacher"]=$this->input->post("IDTeacher");
            $dat["IDGroup"]=$this->input->post("IDGroup");
            $dat["IDCourse"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateCourse($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateCourseField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateCourseField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteCourse($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteCourse($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getCourseCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getCourseCatalog($dat);
           return $result;
        }
        
        function insertHorary()
        {
            $dat["Day"]=$this->input->post("Day");
            $dat["Hour"]=$this->input->post("Hour");
            $dat["IDMatter"]=$this->input->post("IDMatter");
            $dat["IDTeacher"]=$this->input->post("IDTeacher");
            $dat["IDGroup"]=$this->input->post("IDGroup");
            $dat["IDHorary"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateHorary($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateHoraryField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateHoraryField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteHorary($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteHorary($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getHoraryByGroup()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getHoraryByGroup($dat);
           return $result; 
        }
        
        function getHoraryByTeacher()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getHoraryByTeacher($dat);
           return $result; 
        }
        
        function getHoraryCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getHoraryCatalog($dat);
           return $result;
        }
        
        function getHoraryByCell($hour, $day, $IDGroup)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->getHoraryByCell($hour, $day, $IDGroup);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function insertAccount()
        {
            $result="";
            $dat["Name"]=$this->input->post("Name");
            $dat["Surname"]=$this->input->post("Surname");
            $dat["NitType"]=$this->input->post("NitType");
            $dat["Nit"]=$this->input->post("Nit");
            $dat["Telephone"]=$this->input->post("Telephone");
            $dat["Address"]=$this->input->post("Address");
            $dat["Mail"]=$this->input->post("Mail");
            $dat["Username"]=$this->input->post("Username");
            $dat["Password"]=$this->input->post("Password");
            $dat["Photo"]=$this->input->post("Photo");
            $dat["IDAccount"]=null;
            $dat["Photo"]="foto";
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            
            //fotos
            
            $fotos = $this->getNormalizedFILES();
            
           
            $name="";
            $tmp_name="";
            $cont=0;
            
            $lista_fotos=array();
            
            foreach ($fotos as $value) {
                foreach ($value as $value2) {
                    
                   // echo $value2['name']." ".$value2['tmp_name']."</br>";
                    $lista_fotos[$cont]["name"]=$value2["name"];
                    $lista_fotos[$cont]["tmp"]=$value2["tmp_name"];
                    $cont++;                    
                }               
            }  
            foreach ($lista_fotos as $value) {
               $dat["Photo"] = $this->almacenarFoto($value['name'], $value['tmp']);
              
            }
           
            //fotos            
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAccount($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateAccountField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAccountField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteAccount($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteAccount($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getAccountCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getAccountCatalog($dat);
           return $result;
        }
        
        function insertStudent($IDAccount, $IDAccountParent, $IDAccountParent2)
        {
            $dat["IDAccount"]=$IDAccount;
            $dat["IDAccountParent"]=$IDAccountParent;
            $dat["IDAccountParent2"]=$IDAccountParent2;
            $dat["IDStudent"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateStudent($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateStudentField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateStudentField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteStudent($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteStudent($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getStudentByNit($Nit, $IDInstitute)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentByNit($Nit, $IDInstitute);
           return $result;
        }
        
        function getStudentCatalogByInstitute($dat)
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByInstitute($dat);
           return $result;
        }
        
        function getStudentCatalogByLevel($dat)
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByLevel($dat);
           return $result;
        }
        
        function getStudentCatalogByProgram($dat)
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByProgram($dat);
           return $result;
        }
        
        function getStudentCatalogByGroup($IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
           $dat['lista']=$result;
           $tabla =  $this->load->view('module3/lista_estudiantes_asistencia',$dat,true);
           echo $tabla;
        }
        
        function getStudentNoteCatalogByGroup($Year, $Period, $IDRecordValue, $IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
          
           $val[0]['IDAccount']="";
           $val[0]['Nit']="";
           $val[0]['Surname']="";
           $val[0]['Name']="";
           $val[0]['Nota']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['IDAccount']=$value->IDAccount;
                $val[$cont]['Nit']=$value->Nit;
                $val[$cont]['Surname']=$value->Surname;
                $val[$cont]['Name']=$value->Name;
                $val[$cont]['Nota']=$this->notaPorEstudiane($Year, $Period, $IDRecordValue, $value->IDAccount);
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_estudiantes',$dat,true);
           
           //$notes = $this->ins->getNoteByGroup($Year, $Period, $IDRecordValue);
           echo $tabla;
        }
        function notaPorEstudiane($Year, $Period, $IDRecordValue, $IDAccount)
        {
            $note = $this->getNoteByGroup($Year, $Period, $IDRecordValue, $IDAccount);
            return $note;
        }
        
        function insertEnrollment($IDAccount, $Year, $IDProgram, $IDGroup)
        {
            $dat["IDAccount"]=$IDAccount;
            $dat["Year"]=$Year;
            $dat["IDProgram"]=$IDProgram;
            $dat["IDGroup"]=$IDGroup;
            $dat["IDEnrollment"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateEnrollment($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateEnrollmentField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateEnrollmentField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteEnrollment($IDAccount, $Year)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteEnrollment($IDAccount, $Year);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getEnrollmentByNit($Nit, $IDInstitute, $Year)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getEnrollmentByNit($Nit, $IDInstitute, $Year);
           return $result;
        }
        
        function insertRecordValue()
        {
            $dat["IDMatter"]=$this->input->post("IDMatter");
            $dat["IDAchievement"]=$this->input->post("IDAchievement");
            $dat["IDGroup"]=$this->input->post("IDGroup");
            $dat["Year"]=$this->input->post("Year");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDRecordValue"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateRecordValue($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateRecordValueField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateRecordValueField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteRecordValue($IDRecordValue)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteRecordValue($IDRecordValue);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getRecordValueByGroup($Year, $IDMatter, $IDAchievement, $IDGroup)
        {
           $this->load->model("institute","ins");
           $result['lista'] = $this->ins->getRecordValueByGroup($Year, $IDMatter, $IDAchievement, $IDGroup);
           $retorno = $this->load->view('module3/listaParciales',$result,true);
           echo $retorno;
        }
        
        function insertNote($IDRecordValue, $IDAccount, $NoteValue, $Year, $Period)
        {
            $dat["IDRecordValue"]=$IDRecordValue;
            $dat["IDAccount"]=$IDAccount;
            $dat["NoteValue"]=$NoteValue;
            $dat["Year"]=$Year;
            $dat["Period"]=$Period;
            $dat["IDNote"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateNote($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateNoteField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateNoteField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteNote($IDNote)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteNote($IDNote);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getNoteByGroup($Year, $Period, $IDRecordValue, $IDAccount)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getNoteByGroup($Year, $Period, $IDRecordValue, $IDAccount);
           $nota=0;
           foreach ($result as $value) {
               $nota = $value->NoteValue;
           }
           return $nota;
        }
        
        function getGroupsByTeacher($IDInstitute, $Year, $IDTeacher)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->getGroupsByTeacher($IDInstitute, $Year, $IDTeacher);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function insertAssistance($IDMatter, $IDGroup, $IDAccount, $Description, $AbsentDate)
        {
            $dat["IDMatter"]=$IDMatter;
            $dat["IDGroup"]=$IDGroup;
            $dat["IDAccount"]=$IDAccount;
            $dat["Description"]=$Description;
            $dat["AbsentDate"]=$AbsentDate;
            $dat["IDAssistance"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAssistance($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateAssistanceField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateAssistanceField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteAssistance($IDAssistance)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteAssistance($IDAssistance);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getStudentAssistanceCatalogByGroup($RecordDate, $IDMatter, $IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
          
           $val[0]['IDAccount']="";
           $val[0]['Nit']="";
           $val[0]['Surname']="";
           $val[0]['Name']="";
           $val[0]['IDAssistance']="";
           $val[0]['Description']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['IDAccount']=$value->IDAccount;
                $val[$cont]['Nit']=$value->Nit;
                $val[$cont]['Surname']=$value->Surname;
                $val[$cont]['Name']=$value->Name;
                $ret = $this->absentByStudent($RecordDate, $IDMatter, $IDGroup, $value->IDAccount);
                $val[$cont]["IDAssistance"]=$ret["IDAssistance"];
                $val[$cont]["Description"]=$ret["Description"];
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_estudiantes_asistencia',$dat,true);
           echo $tabla;
        }
        
        function getAssistanceByGroupByCell($RecordDate, $IDMatter, $IDGroup, $IDAccount)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getAssistanceByGroupByCell($RecordDate, $IDMatter, $IDGroup, $IDAccount);
           $IDAssistance=0;
           $Description="";
           if(isset($result))
           {
                    foreach ($result as $value) {
                        $IDAssistance = $value->IDAssistance;
                        $Description = $value->Description;
                    }
           }
           $dat["IDAssistance"]=$IDAssistance;
           $dat["Description"]=$Description;
           return $dat;
        }
        
        function absentByStudent($RecordDate, $IDMatter, $IDGroup, $IDAccount)
        {
            $note = $this->getAssistanceByGroupByCell($RecordDate, $IDMatter, $IDGroup, $IDAccount);
            return $note;
        }
        
        function calculateDefByGroup($Year, $Period, $IDMatter, $IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
           
           $val[0]['IDAccount']="";
           $val[0]['Nit']="";
           $val[0]['Surname']="";
           $val[0]['Name']="";
           $val[0]['Def']="";
           $val[0]['Absents']="";
           $val[0]['FailedObjectives']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['IDAccount']=$value->IDAccount;
                $val[$cont]['Nit']=$value->Nit;
                $val[$cont]['Surname']=$value->Surname;
                $val[$cont]['Name']=$value->Name;
                $ret = $this->calculateDefByStudent($Year, $Period, $IDMatter, $IDGroup, $value->IDAccount);
                $val[$cont]["Def"]=$ret["Def"];
                $val[$cont]["Absents"]=$ret["Absents"];
                $val[$cont]["FailedObjectives"]=$ret["FailedObjectives"];
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_definitivas',$dat,true);
           echo $tabla;
        }
        
        function calculateDefByStudent($Year, $Period, $IDMatter, $IDGroup, $IDAccount)
        {
            $result = $this->ins->getDefByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount);
            $Def = 0;
            if(isset($result))
                    {
                    foreach ($result as $value) 
                        {
                        $Def = $value->Def;
                        }
                    }
            
            $result = $this->ins->getAbsentsByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount);
            $Absents = 0;
            if(isset($result))
                    {
                    foreach ($result as $value) 
                        {
                        $Absents = $value->Absents;
                        }
                    }
                    
            $FailedObjectives = 0;
            $result = $this->ins->getFailedObjectivesByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount);
            if(isset($result))
                    {
                    foreach ($result as $value) 
                        {
                        $FailedObjectives = $value->FailedObjectives;
                        }
                    }
            
            $this->updateYearNoteForPeriod($Year, $Period, $IDMatter, $IDGroup, $IDAccount, $Def, $Absents, $FailedObjectives);
            $dat["Def"]=$Def;
            $dat["Absents"]=$Absents;
            $dat["FailedObjectives"]=$FailedObjectives;
            return $dat;
        }
        
        function updateYearNoteForPeriod($Year, $Period, $IDMatter, $IDGroup, $IDAccount, $Def, $Absents, $FailedObjectives)
        {
            $result = $this->ins->getYearNoteByIDAccount($Year, $IDMatter, $IDGroup, $IDAccount);
            $IDYearNote=0;
           if(isset($result))
                    {
                    foreach ($result as $value) 
                        {
                        $IDYearNote = $value->IDYearNote;
                        }
                    }
        if($IDYearNote==0)
                {
            	$IDYearNote = $this->ins->insertYearNoteForPeriod($Year, $IDMatter, $IDGroup, $IDAccount);
                }
        $result["mensaje"] = $this->ins->updateYearNoteForPeriod($IDYearNote, $Period, $Def, $Absents, $FailedObjectives);
        }
        
        function ping()
        {
            $msg = "ClassForName@=common.ConsecutiveNumberFactory&
                    MethodName@=isAlive&
                    SessionID@=0&
                    ArgumentList@=";
            $server = "192.168.0.15";
            $port = "3307";
            $url = "http://".$server.":".$port."/".$msg;
            echo $url;
            
            $content = file_get_contents($url);   
           
           /* $r = new HttpRequest($url, HttpRequest::METH_GET);
            try {
                $r->send();
                if ($r->getResponseCode() == 200) 
                    {
                    echo $r->getResponseBody();
                    }
                }
            catch (HttpException $ex)
                {
                echo $ex;
                }*/
        }
        
        function insertConductNote($IDGroup, $IDAccount, $Year, $Period, $NoteValue)
        {
            $dat["IDGroup"]=$IDGroup;
            $dat["IDAccount"]=$IDAccount;
            $dat["Year"]=$Year;
            $dat["Period"]=$Period;
            $dat["NoteValue"]=$NoteValue;
            $dat["IDConductNote"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateConductNote($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateConductNoteField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateConductNoteField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteConductNote($IDConductNote)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteConductNote($IDConductNote);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getStudentConductNoteCatalogByGroup($Year, $Period, $IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
          
           $val[0]['IDAccount']="";
           $val[0]['Nit']="";
           $val[0]['Surname']="";
           $val[0]['Name']="";
           $val[0]['IDConductNote']="";
           $val[0]['NoteValue']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['IDAccount']=$value->IDAccount;
                $val[$cont]['Nit']=$value->Nit;
                $val[$cont]['Surname']=$value->Surname;
                $val[$cont]['Name']=$value->Name;
                $ret = $this->conductNoteByStudent($Year, $Period, $IDGroup, $value->IDAccount);
                $val[$cont]["IDConductNote"]=$ret["IDConductNote"];
                $val[$cont]["NoteValue"]=$ret["NoteValue"];
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_estudiantes_conducta',$dat,true);
           echo $tabla;
        }
        
        function getConductNoteByGroupByCell($Year, $Period, $IDGroup, $IDAccount)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getConductNoteByGroupByCell($Year, $Period, $IDGroup, $IDAccount);
           $IDConductNote=0;
           $NoteValue="";
           if(isset($result))
           {
                    foreach ($result as $value) {
                        $IDConductNote = $value->IDConductNote;
                        $NoteValue = $value->NoteValue;
                    }
           }
           $dat["IDConductNote"]=$IDConductNote;
           $dat["NoteValue"]=$NoteValue;
           return $dat;
        }
        
        function conductNoteByStudent($Year, $Period, $IDGroup, $IDAccount)
        {
            $note = $this->getConductNoteByGroupByCell($Year, $Period, $IDGroup, $IDAccount);
            return $note;
        }
        
        function insertObjective()
        {
            $dat["Name"]=$this->input->post("Name");
            $dat["Description"]=$this->input->post("Description");
            $dat["IDObjective"]=null;
            $dat["IDMatter"]=$this->input->post("IDMatter");
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateObjective($dat);
            echo $this->load->view("mensaje",$result,true);
        }
        
        function updateObjectiveField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateObjectiveField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteObjective($dat)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteObjective($dat);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getObjectiveCatalog()
        {
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getObjectiveCatalog($dat);
           return $result;
        }
        
        function getObjectiveCatalogByIDMatter($IDMatter)
        {
           $dat["IDMatter"] = $IDMatter;
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result['lista'] = $this->ins->getObjectiveCatalog($dat);
           $retorno = $this->load->view('module3/select_logros',$result,true);
           echo $retorno;
        }
        
        function insertObjectiveNote($IDObjective, $IDAccount, $ObjectiveValue, $Year, $Period, $IDGroup)
        {
            $dat["IDObjective"]=$IDObjective;
            $dat["IDAccount"]=$IDAccount;
            $dat["IDGroup"]=$IDGroup;
            $dat["ObjectiveValue"]=$ObjectiveValue;
            $dat["Year"]=$Year;
            $dat["Period"]=$Period;
            $dat["IDObjectiveNote"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateObjectiveNote($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateObjectiveNoteField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateObjectiveNoteField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteObjectiveNote($IDObjectiveNote)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteObjectiveNote($IDObjectiveNote);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getObjectiveNoteCatalogByGroup($Year, $Period, $IDObjective, $IDGroup)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getStudentCatalogByGroup($IDGroup);
          
           $val[0]['IDAccount']="";
           $val[0]['Nit']="";
           $val[0]['Surname']="";
           $val[0]['Name']="";
           $val[0]['IDObjectiveNote']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['IDAccount']=$value->IDAccount;
                $val[$cont]['Nit']=$value->Nit;
                $val[$cont]['Surname']=$value->Surname;
                $val[$cont]['Name']=$value->Name;
                $ret = $this->defeatedByStudent($Year, $Period, $IDObjective, $IDGroup, $value->IDAccount);
                $val[$cont]["IDObjectiveNote"]=$ret["IDObjectiveNote"];
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_estudiantes_logros',$dat,true);
           echo $tabla;
        }
        
        function getObjectiveNoteByGroupByCell($Year, $Period, $IDObjective, $IDGroup, $IDAccount)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getObjectiveNoteByGroupByCell($Year, $Period, $IDObjective, $IDGroup, $IDAccount);
           $IDObjectiveNote=0;
           if(isset($result))
           {
                    foreach ($result as $value) {
                        $IDObjectiveNote = $value->IDObjectiveNote;
                    }
           }
           $dat["IDObjectiveNote"]=$IDObjectiveNote;
           return $dat;
        }
        
        function defeatedByStudent($Year, $Period, $IDObjective, $IDGroup, $IDAccount)
        {
            $note = $this->getObjectiveNoteByGroupByCell($Year, $Period, $IDObjective, $IDGroup, $IDAccount);
            return $note;
        }
        
        function insertRecoverObjective($IDGroup, $IDAccount, $IDObjectiveNote, $RecoverDate, $NoteValue)
        {
            $dat["IDGroup"]=$IDGroup;
            $dat["IDAccount"]=$IDAccount;
            $dat["IDObjectiveNote"]=$IDObjectiveNote;
            $dat["RecoverDate"]=$RecoverDate;
            $dat["NoteValue"]=$NoteValue;
            $dat["IDRecoverObjective"]=null;
            $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateRecoverObjective($dat);
            echo $this->load->view("mensaje",$result,true);   
        }
        
        function updateRecoverObjectiveField($fieldName, $fieldValue, $key)
        {
            $this->load->model("institute","ins");
            $result["mensaje"] = $this->ins->updateRecoverObjectiveField($fieldName, $fieldValue, $key);
            echo $this->load->view("mensaje",$result,true);  
        }
        
        function deleteRecoverObjective($IDRecoverObjective)
        {
           $this->load->model("institute","ins");
           $this->ins->deleteRecoverObjective($IDRecoverObjective);
           $result["val"] = "OK";
           return $this->load->view("mensaje",$result,true);
        }
        
        function getRecoverObjectiveCatalogByStudent($Year, $Period, $IDAccount)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getFailedObjectivesByGroup($Year, $Period, $IDAccount);
          
           $val[0]['GroupName']="";
           $val[0]['MatterName']="";
           $val[0]['ObjectiveName']="";
           $val[0]['IDObjectiveNote']="";
           $val[0]['IDRecoverObjective']="";
           $val[0]['RecoverDate']="";
           $val[0]['NoteValue']="";
           $val[0]['IDGroup']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['GroupName']=$value->GroupName;
                $val[$cont]['MatterName']=$value->MatterName;
                $val[$cont]['ObjectiveName']=$value->ObjectiveName;
                $val[$cont]['IDObjectiveNote']=$value->IDObjectiveNote;
                $val[$cont]["IDGroup"]=$value->IDGroup;
                $ret = $this->getRecoverObjectiveByAccount($value->IDObjectiveNote, $IDAccount);
                $val[$cont]["IDRecoverObjective"]=$ret["IDRecoverObjective"];
                $val[$cont]["RecoverDate"]=$ret["RecoverDate"];
                $val[$cont]["NoteValue"]=$ret["NoteValue"];
                $cont++;
           }
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_estudiantes_recuperaciones',$dat,true);
           echo $tabla;
        }
        
        function getRecoverObjectiveByAccount($IDObjectiveNote, $IDAccount)
        {
           $this->load->model("institute","ins");
           $result = $this->ins->getRecoverObjectiveByAccount($IDObjectiveNote, $IDAccount);
           $IDRecoverObjective=0;
           $RecoverDate="";
           $NoteValue="";
           if(isset($result))
           {
                    foreach ($result as $value) {
                        $IDRecoverObjective = $value->IDRecoverObjective;
                        $RecoverDate = $value->RecoverDate;
                        $NoteValue = $value->NoteValue;
                    }
           }
           $dat["IDRecoverObjective"]=$IDRecoverObjective;
           $dat["RecoverDate"]=$RecoverDate;
           $dat["NoteValue"]=$NoteValue;
           return $dat;
        }
       
        function doNotesReportByAccount($Year, $Period, $IDAccount)
        {
            $tabla =  array();
           $dat["IDInstitute"] = $this->session->userdata('IDInstitute');
           $this->load->model("institute","ins");
           $result = $this->ins->getNotesCatalogByAccount($Year, $Period, $IDAccount);
           
           $val[0]['MatterName']="";
           $val[0]['Def']="";
           $val[0]['Absents']="";
           $val[0]['FailedObjectives']="";
           $cont=0;
           foreach ($result as $value) {
                $val[$cont]['MatterName']=$value->MatterName;
                $val[$cont]['Def']=$value->Def;
                $val[$cont]['Absents']=$value->Absents;
                $val[$cont]["FailedObjectives"]=$value->FailedObjectives;
                $cont++;
           }
           
           $result = $this->ins->getConductNoteByAccount($Year, $Period, $IDAccount);
           $ConductNote=0;
           if(isset($result))
                    {
                    foreach ($result as $value) 
                        {
                        $ConductNote = $value->NoteValue;
                        }
                    }
           $cont++;
           $val[$cont]['MatterName']="CONDUCTA Y CONVIVENCIA";
           $val[$cont]['Def']=$ConductNote;
           $val[$cont]['Absents']=0;
           $val[$cont]['FailedObjectives']=0;
                    
           $dat['lista']=$val;
           
           $tabla =  $this->load->view('module3/lista_definitivas_estudiante',$dat,true);
           echo $tabla;
        }

}

