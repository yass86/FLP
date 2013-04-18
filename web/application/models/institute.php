<?php
class institute extends CI_Model 
{
    function _construct()
    {
         parent::_construct();
    }
    
    function updateInstitute($dat="")
    {
        $fecha=date("Y-m-d H:i:s");
        if($dat["IDInstitute"]==0)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('Code',  $dat["Code"]);
            $this->db->set('Name',   $dat["Name"]);
            $this->db->set('Type',  $dat["Type"]);
            $this->db->set('Year',   $dat["Year"]);
            $this->db->set('Period',  $dat["Period"]);
            $this->db->set('Since',  $fecha);
            $this->db->insert('EduInstitute_Table');
             $id = $this->db->insert_id();
             $dat["IDInstitute"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduInstitute_Table SET
                 idaccount='".$dat["idaccount"]."', 
                 code='".$dat["code"]."', 
                     name='".$dat["name"]."', 
                         type=".$dat["type"]."
                             WHERE IDInstitute=".$dat["IDInstitute"];
            $this->db->query($sql);
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
        return $dat;
    }
    
    function updateInstituteField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduInstitute_Table SET
                 ".$fieldName."='".fieldValue."' 
                             WHERE IDInstitute=".$key;
             $this->db->query($sql);
             }
    }   
    
    function deleteInstitute($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="DELETE FROM EduInstitute_Table WHERE IDInstitute=".$dat["IDInstitute"];
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getInstituteCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDInstitute, IDAccount, Code, Name, Since, Type, Year, Period  FROM EduInstitute_Table WHERE IDInstitute=".$dat["IDInstitute"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();   
            return $result;
            }      
    }
    
    function getInstituteByID($dat="")
    {
       if($dat["IDInstitute"]!=0)
         {
             $sql="SELECT IDInstitute, IDAccount, Code, Name, Since, Type, Year, Period  FROM EduInstitute_Table WHERE IDInstitute=".$dat["IDInstitute"]."";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateEstablishment($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDEstablishment"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Code',  $dat["Code"]);
            $this->db->set('Name',   $dat["Name"]);
            $this->db->set('Type',  $dat["Type"]);
            $this->db->set('City',   $dat["City"]);
            $this->db->set('Address',  $dat["Address"]);
            $this->db->set('Telephone',  $dat["Telephone"]);
            $this->db->set('Director',  $dat["Director"]);
            $this->db->set('Since',  $fecha);
            $this->db->set('IDInstitute',  $dat["IDInstitute"]);
            $this->db->insert('EduEstablishments_Table');
             $id = $this->db->insert_id();
             $dat["IDEstablishment"]=$id;
             return $id;
             //echo "<pre>".print_r($id,true)."</pre>";
        }
        else
        {
             $sql="UPDATE EduEstablishments_Table SET
                 code='".$dat["Code"]."', 
                     name='".$dat["Name"]."', 
                         type=".$dat["Type"].", 
                         city='".$dat["City"]."', 
                         address='".$dat["Address"]."', 
                         telephone='".$dat["Telephone"]."', 
                         director=".$dat["Director"]."
                             WHERE IDEstablishment=".$dat["IDEstablishment"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateEstablishmentField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduEstablishments_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDEstablishment=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteEstablishment($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduEstablishments_Table WHERE IDEstablishment=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getEstablishmentCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDEstablishment, Code, Name, Type, City, Address, Telephone, Director FROM EduEstablishments_Table WHERE IDInstitute=".$dat["IDInstitute"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getEstablishmentByID($dat="")
    {
       if($dat["IDEstablishment"]!=null)
         {
             $sql="SELECT IDEstablishment, Code, Name, Type, City, Address, Telephone, Director  FROM EduEstablishments_Table WHERE IDEstablishment=".$dat["IDEstablishment"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
      function updateSchedule($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDSchedule"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Code',  $dat["Code"]);
            $this->db->set('Name',   $dat["Name"]);
            $this->db->set('InitHour',   $dat["InitHour"]);
            $this->db->set('EndingHour',   $dat["EndingHour"]);
            $this->db->set('Since',  $fecha);
            $this->db->set('Type',  $dat["Type"]);
            $this->db->set('Day1',  $dat["Day1"]);
            $this->db->set('Day2',  $dat["Day2"]);
            $this->db->set('Day3',  $dat["Day3"]);
            $this->db->set('Day4',  $dat["Day4"]);
            $this->db->set('Day5',  $dat["Day5"]);
            $this->db->set('Day6',  $dat["Day6"]);
            $this->db->set('Day7',  $dat["Day7"]);
            $this->db->set('DailyHours',  $dat["DailyHours"]);
            echo $dat["Day1"].",".$dat["Day2"];
            //exit();
            $this->db->set('IDInstitute',  $dat["IDInstitute"]);
            $this->db->insert('EduSchedules_Table');
             $id = $this->db->insert_id();
             $dat["IDSchedule"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduSchedules_Table SET
                 code='".$dat["Code"]."', 
                 name='".$dat["Name"]."', 
                 inithour='".$dat["InitHour"]."', 
                 endinghour='".$dat["EndingHour"]."', 
                 day1='".$dat["Day1"]."', 
                 day2='".$dat["Day2"]."',
                 day3='".$dat["Day3"]."',
                 day4='".$dat["Day4"]."',
                 day5='".$dat["Day5"]."',
                 day6='".$dat["Day6"]."',
                 day7='".$dat["Day7"]."',
                 dailyHours='".$dat["DailyHours"]."',
                 since='".$dat["Since"]."', 
                 type=".$dat["Type"]."
                             WHERE IDSchedule=".$dat["IDSchedule"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateScheduleField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduSchedules_Table SET
                 ".$fieldName."='".$fieldValue."'
                             WHERE IDSchedule=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteSchedule($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduSchedules_Table WHERE IDSchedule=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    function getScheduleCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDSchedule, Code, Name, InitHour, EndingHour, Type, 
                 Day1, Day2, Day3, Day4, Day5, Day6, Day7, DailyHours FROM EduSchedules_Table WHERE IDInstitute=".$dat["IDInstitute"]." ORDER BY IDSchedule";;
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getScheduleByID($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDSchedule, Code, Name, InitHour, EndingHour, Type, 
                 Day1, Day2, Day3, Day4, Day5, Day6, Day7, DailyHours  FROM EduSchedules_Table WHERE IDInstitute=".$dat["IDInstitute"]; 
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    } 
    
        function updateLevel($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDLevel"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Code',  $dat["Code"]);
            $this->db->set('Name',   $dat["Name"]);
            $this->db->set('Since',  $fecha);
            $this->db->set('Type',  $dat["Type"]);
            $this->db->set('IDInstitute',  $dat["IDInstitute"]);
            $this->db->insert('EduLevel_Table');
             $id = $this->db->insert_id();
             $dat["IDLevel"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduLevel_Table SET
                 code='".$dat["IDLevel"]."', 
                 name='".$dat["Code"]."', 
                 since='".$dat["Since"]."', 
                 type=".$dat["Type"]."
                 WHERE IDLevel=".$dat["IDLevel"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateLevelField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduLevel_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDLevel=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteLevel($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduLevel_Table WHERE IDLevel=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getLevelCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDLevel, Code, Name, Since, Type  FROM EduLevel_Table WHERE IDInstitute=".$dat["IDInstitute"]." ORDER BY IDLevel";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getLevelByID($dat="")
    {
       if($dat["IDLevel"]!=null)
         {
             $sql="SELECT IDLevel, Code, Name, Since, Type  FROM EduLevel_Table WHERE IDLevel=".$dat["IDLevel"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
        function updateAcademicArea($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDAcademicArea"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Code',  $dat["Code"]);
            $this->db->set('Name',   $dat["Name"]);
            $this->db->set('Description',   $dat["Description"]);
            $this->db->set('Since',  $fecha);
	$this->db->set('IDInstitute',  $dat["IDInstitute"]);
            $this->db->insert('EduAcademicArea_Table');
             $id = $this->db->insert_id();
             $dat["IDAcademicArea"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduAcademicArea_Table SET
                 code='".$dat["IDAcademicArea"]."', 
                 name='".$dat["Code"]."', 
                 description='".$dat["Description"]."', 
                 since='".$dat["Since"]."' 
                 WHERE IDAcademicArea=".$dat["IDAcademicArea"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateAcademicAreaField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduAcademicArea_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDAcademicArea=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteAcademicArea($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduAcademicArea_Table WHERE IDAcademicArea=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getAcademicAreaCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDAcademicArea, Code, Name, Description, Since  FROM EduAcademicArea_Table WHERE IDInstitute=".$dat["IDInstitute"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getAcademicAreaByID($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDAcademicArea, Code, Name, Description, Since  FROM EduAcademicArea_Table WHERE IDInstitute=".$dat["IDInstitute"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
        function updateValuationScale($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDInstitute"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('TopScale',  $dat["TopScale"]);
            $this->db->set('HighScale',  $dat["HighScale"]);
            $this->db->set('BasicScale',  $dat["BasicScale"]);
            $this->db->set('LowScale',  $dat["LowScale"]);
            $this->db->set('TopLetter',  $dat["TopLetter"]);
            $this->db->set('HighLetter',  $dat["HighLetter"]);
            $this->db->set('BasicLetter',  $dat["BasicLetter"]);
            $this->db->set('LowLetter',  $dat["LowLetter"]);
            $this->db->set('TopImage',  $dat["TopImage"]);
            $this->db->set('HighImage',  $dat["HighImage"]);
            $this->db->set('BasicImage',  $dat["BasicImage"]);
            $this->db->set('LowImage',  $dat["LowImage"]);
            $this->db->insert('EduInstitution_Table');
             $id = $this->db->insert_id();
             $dat["IDInstitute"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduInstitution_Table SET
                 code='".$dat["IDValuationScale"]."', 
                 name='".$dat["Code"]."', 
                 since='".$dat["Since"]."', 
                 type=".$dat["Type"]."', 
                 topScale=".$dat["TopScale"]."', 
                 highScale=".$dat["HighScale"]."', 
                 basicScale=".$dat["BasicScale"]."', 
                 lowScale=".$dat["LowScale"]."', 
                 topLetter=".$dat["TopLetter"]."', 
                 highLetter=".$dat["HighLetter"]."', 
                 basicLetter=".$dat["BasicLetter"]."', 
                 lowLetter=".$dat["LowLetter"]."', 
                 topImage=".$dat["TopImage"]."', 
                 highImage=".$dat["HighImage"]."', 
                 basicImage=".$dat["BasicImage"]."', 
                 lowImage=".$dat["LowImage"]."' 
	    WHERE IDInstitute=".$dat["IDInstitute"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
        function updateValuationScaleValues($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDInstitute"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('TopScale',  $dat["TopScale"]);
            $this->db->set('HighScale',  $dat["HighScale"]);
            $this->db->set('BasicScale',  $dat["BasicScale"]);
            $this->db->set('LowScale',  $dat["LowScale"]);
            $this->db->set('TopLetter',  $dat["TopLetter"]);
            $this->db->set('HighLetter',  $dat["HighLetter"]);
            $this->db->set('BasicLetter',  $dat["BasicLetter"]);
            $this->db->set('LowLetter',  $dat["LowLetter"]);
            $this->db->set('TopImage',  $dat["TopImage"]);
            $this->db->set('HighImage',  $dat["HighImage"]);
            $this->db->set('BasicImage',  $dat["BasicImage"]);
            $this->db->set('LowImage',  $dat["LowImage"]);
            $this->db->insert('EduInstitution_Table');
             $id = $this->db->insert_id();
             $dat["IDInstitute"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE eduinstitute_table SET                 
                 topScale=".$dat["TopScale"].", 
                 highScale=".$dat["HighScale"].", 
                 basicScale=".$dat["BasicScale"].", 
                 lowScale=".$dat["LowScale"].", 
                 topLetter='".$dat["TopLetter"]."', 
                 HighLetter='".$dat["HighLetter"]."', 
                 basicLetter='".$dat["BasicLetter"]."', 
                 lowLetter='".$dat["LowLetter"]."', 
                 topImage='".$dat["TopImage"]."', 
                 highImage='".$dat["HighImage"]."', 
                 basicImage='".$dat["BasicImage"]."', 
                 lowImage='".$dat["LowImage"]."' 
	    WHERE IDInstitute=".$dat["IDInstitute"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateValuationScaleField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduInstitution_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDInstitution=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteValuationScale($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduInstitution_Table WHERE IDInstitution=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getValuationScaleCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT *  FROM eduinstitute_table WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getValuationScaleByID($dat="")
    {
       if($dat["IDValuationScale"]!=null)
         {
             $sql="SELECT code,name,since,type,highScale,basicScale,lowScale,topLetter,highLetter,basicLetter,lowLetter,topImage,highImage,basicImagelowImage  FROM EduInstitution_Table WHERE IDInstitute=".$dat["IDInstitute"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
        function updateProgram($dat="")
    {
            $fecha=date("Y-m-d H:i:s");
        if($dat["IDProgram"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
	$this->db->set('Year',  $dat["Year"]);
	$this->db->set('IDLevel',  $dat["IDLevel"]);
	$this->db->set('IDEstablishment',  $dat["IDEstablishment"]);
	$this->db->set('IDSchedule',  $dat["IDSchedule"]);
	$this->db->set('Code',  $dat["Code"]);
	$this->db->set('Name',  $dat["Name"]);
	$this->db->set('Periods',  $dat["Periods"]);
	$this->db->set('Gender',  $dat["Gender"]);
	$this->db->set('State',  $dat["State"]);
	$this->db->set('Since',  $fecha);
	$this->db->set('IDInstitute',  $dat["IDInstitute"]);
            $this->db->insert('EduProgram_Table');
             $id = $this->db->insert_id();
             $dat["IDProgram"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduProgram_Table SET
		year=".$dat["Year"].", 
		iDLevel=".$dat["IDLevel"].", 
		iDEstablishment=".$dat["IDEstablishment"].", 
		iDSchedule=".$dat["IDSchedule"].", 
		code=".$dat["Code"].", 
		name=".$dat["Name"].", 
		periods=".$dat["Periods"].", 
		gender=".$dat["Gender"].", 
		state=".$dat["State"].", 
		since=".$dat["Since"]." 
	    WHERE IDProgram=".$dat["IDProgram"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateProgramField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduProgram_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDProgram=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteProgram($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduProgram_Table WHERE IDProgram=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getProgramCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT * FROM EduProgram_Table WHERE IDInstitute=".$dat["IDInstitute"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getProgramByID($dat="")
    {
       if($dat["IDProgram"]!=null)
         {
             $sql="SELECT * FROM EduProgram_Table WHERE IDProgram=".$dat["IDProgram"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }

    function updateGrade($dat="")
    {
        $fecha=date("Y-m-d H:i:s");
        if($dat["IDGrade"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
	$this->db->set('Name',  $dat["Name"]);
	$this->db->set('Color',  $dat["Color"]);
        $this->db->set('EvaluationType',  $dat["EvaluationType"]);
	$this->db->set('Since',  $fecha);
	$this->db->set('IDLevel',  $dat["IDLevel"]);
            $this->db->insert('EduGrade_Table');
             $id = $this->db->insert_id();
             $dat["IDGrade"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduGrade_Table SET
		name=".$dat["Name"].", 
		color=".$dat["Color"].", 
                evaluationType=".$dat["EvaluationType"].", 
		since=".$dat["Since"]." 
	    WHERE IDGrade=".$dat["IDGrade"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateGradeField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduGrade_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDGrade=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteGrade($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduGrade_Table WHERE IDGrade=".$dat; 
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getGradeCatalog($dat="")
    {
       if($dat["IDLevel"]!=null)
         {
             $sql="SELECT *  FROM EduGrade_Table WHERE IDLevel=".$dat["IDLevel"]." ORDER BY IDGrade ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getGradeByID($dat="")
    {
       if($dat["IDGrade"]!=null)
         {
             $sql="SELECT *  FROM EduGrade_Table WHERE IDGrade=".$dat["IDGrade"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }

    function updateMatter($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDMatter"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Name',  $dat["Name"]);
            $this->db->set('IDAcademicArea',  $dat["IDAcademicArea"]);
            $this->db->set('Achievements',  $dat["Achievements"]);
            $this->db->set('WeekHours',  $dat["WeekHours"]);
            $this->db->set('Average',  $dat["Average"]);
            $this->db->set('IDGrade',  $dat["IDGrade"]);
            $this->db->insert('EduMatters_Table');
             $id = $this->db->insert_id();
             $dat["IDMatter"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduMatters_Table SET
		name=".$dat["Name"].",
		iIDAcademicArea=".$dat["IDAcademicArea"].",
		achievements=".$dat["Achievements"].",
	    WHERE IDMatter=".$dat["IDMatter"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateMatterField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduMatters_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDMatter=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteMatter($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduMatters_Table WHERE IDMatter=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getMatterCatalog($dat="")
    {
       if($dat["IDGrade"]!=null)
         {
             $sql="SELECT * FROM EduMatters_Table WHERE IDGrade=".$dat["IDGrade"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getMatterByID($IDMatter)
    {
       if($IDMatter!=null)
         {
             $sql="SELECT * FROM EduMatters_Table WHERE IDMatter=".$IDMatter." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }

  function updateAchievement($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDAchievement"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Name',  $dat["Name"]);
            $this->db->set('Description',  $dat["Description"]);
            $this->db->set('IDMatter',  $dat["IDMatter"]);
            $this->db->insert('EduAchievements_Table');
             $id = $this->db->insert_id();
             $dat["IDAchievement"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduAchievements_Table SET
		name=".$dat["Name"].",
		description=".$dat["Description"]." 
	    WHERE IDAchievement=".$dat["IDAchievement"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateAchievementField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduAchievements_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDAchievement=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteAchievement($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduAchievements_Table WHERE IDAchievement=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getAchievementCatalog($dat="")
    {
       if($dat["IDMatter"]!=null)
         {
             $sql="SELECT * FROM EduAchievements_Table WHERE IDMatter=".$dat["IDMatter"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getAchievementByID($dat="")
    {
       if($dat["IDAchievement"]!=null)
         {
             $sql="SELECT * FROM EduAchievements_Table WHERE IDAchievement=".$dat["IDAchievement"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
  function updateTeacher($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDTeacher"]==null)
         {
             $fecha=date("Y-m-d H:i:s");
             $this->db->set('Name',  $dat["Name"]);
             $this->db->set('Surname',  $dat["Surname"]);
             $this->db->set('Nit',  $dat["Nit"]);
             $this->db->set('IDAccount',  $dat["IDAccount"]);
             $this->db->set('Resolution',  $dat["Resolution"]);
             $this->db->set('NominationType',  $dat["NominationType"]);
             $this->db->set('Title',  $dat["Title"]);
             $this->db->set('Scale',  $dat["Scale"]);
             //$this->db->set('State',  $dat["State"]);
             $this->db->set('Since',  $fecha);
             $this->db->set('IDInstitute',  $dat["IDInstitute"]);
             $this->db->insert('EduTeachers_Table');
             $id = $this->db->insert_id();
             $dat["IDTeacher"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduTeachers_Table SET
                name=".$dat["Name"].",
                surname=".$dat["Surname"].",
                nit=".$dat["Nit"].",
 		iDAccount=".$dat["IDAccount"].",
		resolution=".$dat["Resolution"].", 
		nominationType=".$dat["NominationType"].", 
		title=".$dat["Title"].", 
		scale=".$dat["Scale"].",
                state=".$dat["State"].",
		since=".$dat["Since"]." 
	    WHERE IDTeacher=".$dat["IDTeacher"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateTeacherField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduTeachers_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDTeacher=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteTeacher($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduTeachers_Table WHERE IDTeacher=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getTeacherCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT * FROM EduTeachers_Table WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getTeacherByID($dat="")
    {
       if($dat["IDTeacher"]!=null)
         {
             $sql="SELECT * FROM EduTeachers_Table WHERE IDTeacher=".$dat["IDTeacher"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }

      function updateGroup($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDGroup"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
	$this->db->set('Name',  $dat["Name"]);
	$this->db->set('Description',  $dat["Description"]);
	$this->db->set('Since',  $fecha);
        $this->db->set('IDGrade',  $dat["IDGrade"]);
	$this->db->set('IDProgram',  $dat["IDProgram"]);
            $this->db->insert('EduGroups_Table');
             $id = $this->db->insert_id();
             $dat["IDGroup"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduGroups_Table SET
		name=".$dat["Name"].", 
		description=".$dat["Description"].", 
		since=".$dat["Since"]." 
	    WHERE IDGroup=".$dat["IDGroup"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateGroupField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduGroups_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDGroup=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteGroup($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduGroups_Table WHERE IDGroup=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getGroupCatalog($dat="")
    {
       if($dat["IDProgram"]!=null)
         {
             $sql="SELECT * FROM EduGroups_Table WHERE IDProgram=".$dat["IDProgram"]." 
                 AND IDGrade=".$dat["IDGrade"]." ORDER BY Name";
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getGroupCatalogByProgram($dat="")
    {
       if($dat["IDProgram"]!=null)
         {
             $sql="SELECT * FROM EduGroups_Table WHERE IDProgram=".$dat["IDProgram"]."
                  ORDER BY Name";
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getGroupByID($dat="")
    {
       if($dat["IDGroup"]!=null)
         {
             $sql="SELECT * FROM EduGroups_Table WHERE IDGroup=".$dat["IDGroup"]." 
                 WHERE IDGroup=".$dat["IDGroup"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }

    function updateCourse($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDCourse"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
	$this->db->set('Name',  $dat["Name"]);
	$this->db->set('Description',  $dat["Description"]);
        $this->db->set('IDMatter',  $dat["IDMatter"]);
        $this->db->set('IDTeacher',  $dat["IDTeacher"]);
	$this->db->set('Since',  $fecha);
	$this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->insert('EduCourses_Table');
             $id = $this->db->insert_id();
             $dat["IDCourse"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduCourses_Table SET
		name=".$dat["Name"].", 
		description=".$dat["Description"].", 
		iDMatter=".$dat["IDMatter"].", 
		iDTeacher=".$dat["IDTeacher"].", 
		since=".$dat["Since"]." 
	    WHERE IDCourse=".$dat["IDCourse"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateCourseField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduCourses_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDCourse=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteCourse($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduCourses_Table WHERE IDCourse=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getCourseCatalog($dat="")
    {
       if($dat["IDGroup"]!=null)
         {
             $sql="SELECT * WHERE IDGroup=".$dat["IDGroup"]." ORDER BY Name";
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getCourseByID($dat="")
    {
       if($dat["IDCourse"]!=null)
         {
             $sql="SELECT * FROM EduCourses_Table WHERE IDCourse=".$dat["IDCourse"]." 
                 WHERE IDCourse=".$dat["IDCourse"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }
    
    function updateHorary($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDHorary"]==null)
         {
             $fecha=date("Y-m-d H:i:s");
             $this->db->set('Day',  $dat["Day"]);
             $this->db->set('Hour',  $dat["Hour"]);
             $this->db->set('IDMatter',  $dat["IDMatter"]);
             $this->db->set('IDTeacher',  $dat["IDTeacher"]);
             $this->db->set('Since',  $fecha);
             $this->db->set('IDGroup',  $dat["IDGroup"]);
             $this->db->insert('EduHorary_Table');
             $id = $this->db->insert_id();
             $dat["IDHorary"]=$id;
             $result=$this->getHoraryDescription($dat); 
             $linea="";
             foreach ($result as $value) 
                {
                $linea = $value->IDHorary."_".$value->Name." ".$value->Surname."_".$value->Matter; 
                }
            echo $linea;
        }
        else
        {
             $sql="UPDATE EduHorary_Table SET
		day=".$dat["Day"].", 
		hour=".$dat["Hour"].", 
		idMatter=".$dat["IDMatter"].",
                idTeacher=".$dat["IDTeacher"].",
                idGroup=".$dat["IDGroup"].",
		since=".$dat["Since"]." 
	    WHERE IDHorary=".$dat["IDHorary"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateHoraryField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduHorary_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDHorary=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteHorary($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduHorary_Table WHERE IDHorary=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getHoraryByGroup($dat="")
    {
       if($dat["IDGroup"]!=null)
         {
             $sql="SELECT 
                    EduHorary_Table.IDHorary, EduHorary_Table.IDTeacher, 
                    EduHorary_Table.IDGroup, EduHorary_Table.IDMatter,
                    EduHorary_Table.Day, EduHorary_Table.Hour,
                    EduMatters_Table.Name 
                    FROM EduHorary_Table 
                    INNER JOIN EduMatters_Table 
                        ON EduHorary_Table.IDMatter=EduMatters_Table.IDMatter 
                    WHERE EduHorary_Table.IDGroup=".$dat["IDGroup"]."";
            $result=$this->db->query($sql)->result();             
            }      
        return $result;
    }
    
    function getHoraryByCell($hour, $day, $IDGroup)
    {
       if($IDGroup!=null & $hour!=null & $day!=null)
         {
             $sql="SELECT 
                    EduHorary_Table.IDHorary AS 'IDHorary',  
                    EduHorary_Table.IDTeacher AS 'IDTeacher',
                    EduTeachers_Table.Name AS 'Name',
                    EduTeachers_Table.Surname AS 'Surname',
                    EduHorary_Table.IDMatter AS 'IDMatter',
                    EduMatters_Table.Name AS 'Matter'
                    FROM EduMatters_Table INNER JOIN
                            (EduHorary_Table INNER JOIN EduTeachers_Table  
                                    ON EduHorary_Table.IDTeacher=EduTeachers_Table.IDTeacher
                             )
                        ON EduMatters_Table.IDMatter=EduHorary_Table.IDMatter 
                    WHERE EduHorary_Table.IDGroup=".$IDGroup." 
                    AND EduHorary_Table.Day=".$day." 
                    AND EduHorary_Table.Hour=".$hour;
             $result=$this->db->query($sql)->result(); 
             $linea="";
             foreach ($result as $value) 
                {
                $linea = $value->IDHorary."_".$value->IDTeacher."_ 
                    ".$value->Name." ".$value->Surname."_".$value->IDMatter."_".$value->Matter; 
                }
            echo $linea;        
            }
    }
    
    function getHoraryByTeacher($dat="")
    {
       if($dat["IDTeacher"]!=null & $dat["Year"]!=null & $dat["IDInstitute"]!=null)
         {
             $sql="SELECT
                    EduEstablishment_Table.Name AS 'Sede',
                    EduGroups_Table.Name AS 'Grupo' 
                    EduHorary_Table.Day AS 'Dia',
                    EduHorary_Table.Hour AS 'Hora',
                    EduMatters_Table.Name AS 'Materia'
                    FROM EduMatters_Table INNER JOIN
                            (EduHorary_Table INNER JOIN 
                                (EduGroups_Table INNER JOIN 
                                    (EduPrograms_Table INNER JOIN EduEstablishment_Table
                                    ON EduPrograms_Table.IDEstablishment=EduEstablishments_Table.IDEstablishment
                                    )
                                ON EduGroups_Table.IDProgram=EduPrograms_Table.IDProgram
                                )
                            ON EduHorary_Table.IDGroup=EduGroups_Table.IDGroup
                            )
                        ON EduMatters_Table.IDMatter=EduHorary_Table.IDMatter 
                    WHERE EduHorary_Table.IDTeacher=".$dat["IDTeacher"]. "
                    AND EduPrograms_Table.Year=".$dat["Year"]. "
                    AND EduPrograms_Table.IDInstitute=".$dat["IDInstitute"];
            $result=$this->db->query($sql)->result();            
            }      
        return $result;
    }
    
    function getGroupsByTeacher($IDInstitute, $Year, $IDTeacher)
    {
       if($IDTeacher!=null)
         {
             $sql="SELECT
                    EduPrograms_Table.IDProgram,
                    EduGroups_Table.IDGroup,
                    EduMatters_Table.IDMatter'
                    FROM EduMatters_Table INNER JOIN
                            (EduHorary_Table INNER JOIN 
                                (EduGroups_Table INNER JOIN 
                                    (EduPrograms_Table INNER JOIN EduEstablishment_Table
                                    ON EduPrograms_Table.IDEstablishment=EduEstablishments_Table.IDEstablishment
                                    )
                                ON EduGroups_Table.IDProgram=EduPrograms_Table.IDProgram
                                )
                            ON EduHorary_Table.IDGroup=EduGroups_Table.IDGroup
                            )
                        ON EduMatters_Table.IDMatter=EduHorary_Table.IDMatter 
                    WHERE EduHorary_Table.IDTeacher=".$IDTeacher." 
                    AND EduPrograms_Table.Year=".$Year." 
                    AND EduPrograms_Table.IDInstitution=".$IDInstitution;
            $result=$this->db->query($sql)->result();            
            }      
        return $result;
    }
    
    function getHoraryDescription($dat="")
    {
       if($dat["IDHorary"]!=null)
         {
             $sql="SELECT DISTINCT 
                    EduHorary_Table.IDHorary AS 'IDHorary',
                    EduTeachers_Table.Name AS 'Name',
                    EduTeachers_Table.Surname AS 'Surname', 
                    EduMatters_Table.Name AS 'Matter'
                    FROM EduMatters_Table INNER JOIN
                            (EduHorary_Table INNER JOIN EduTeachers_Table  
                                    ON EduHorary_Table.IDTeacher=EduTeachers_Table.IDTeacher
                             )
                        ON EduMatters_Table.IDMatter=EduHorary_Table.IDMatter 
                    WHERE EduHorary_Table.IDHorary=".$dat["IDHorary"];
            $result=$this->db->query($sql)->result();           
            }      
        return $result;
    }
    
    function updateAccount($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDAccount"]==null)
         {
             $fecha=date("Y-m-d H:i:s");
             $this->db->set('Name',  $dat["Name"]);
             $this->db->set('Surname',  $dat["Surname"]);
             $this->db->set('NitType',  $dat["NitType"]);
             $this->db->set('Nit',  $dat["Nit"]);
             $this->db->set('Since',  $fecha);
             $this->db->set('Telephone',  $dat["Telephone"]);
             $this->db->set('Address',  $dat["Address"]);
             $this->db->set('Mail',  $dat["Mail"]);
             $this->db->set('Username',  $dat["Username"]);
             $this->db->set('Password',  $dat["Password"]);
             $this->db->set('Photo',  $dat["Photo"]);
             $this->db->set('IDInstitute',  $dat["IDInstitute"]);             
             $this->db->insert('EduAccounts_Table');
             $id = $this->db->insert_id();
             $dat["IDAccount"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduAccounts_Table SET
               	name=".$dat["Name"].",
               	surname=".$dat["Surname"].",
                nit=".$dat["Nit"].",
                nitType=".$dat["NitType"].",
 		telephone=".$dat["Telephone"].",
		address=".$dat["Address"]."
                photo=".$dat["Photo"]."
		mail=".$dat["Mail"]."
 		username=".$dat["Username"].",
		password=".$dat["Password"]."
	    WHERE IDAccount=".$dat["IDAccount"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateAccountField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduAccounts_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDAccount=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteAccount($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduAccounts_Table WHERE IDAccount=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getAccountCatalog($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT * FROM EduAccounts_Table WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getAccountByID($dat="")
    {
       if($dat["IDAccount"]!=null)
         {
             $sql="SELECT * FROM EduAccounts_Table WHERE IDAccount=".$dat["IDAccount"]." 
                 WHERE IDAccount=".$dat["IDAccount"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }
 
   function updateStudent($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDStudent"]==null)
         {
             $fecha=date("Y-m-d H:i:s");
             $this->db->set('IDAccount',  $dat["IDAccount"]);
             $this->db->set('IDAccountParent',  $dat["IDAccountParent"]);
             $this->db->set('IDAccountParent2',  $dat["IDAccountParent2"]);
             $this->db->set('IDInstitute',  $dat["IDInstitute"]);
             $this->db->set('Since',  $fecha);
             $this->db->insert('EduStudents_Table');
             $id = $this->db->insert_id();
             $dat["IDStudent"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduStudents_Table SET
 		iDAccount=".$dat["IDAccount"].",
                iDAccountParent=".$dat["IDAccountParent"].",
		checkInDate=".$dat["CheckInDate"].", 
		checkOutDate=".$dat["CheckOutDate"]." 
	    WHERE IDStudent=".$dat["IDStudent"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateStudentField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduStudents_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDStudent=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteStudent($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduStudents_Table WHERE IDStudent=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getStudentCatalogByInstitute($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT Nit, Name, Surname, Telephone, Address, Mail FROM EduAccounts_Table INNER JOIN
                        (EduStudents_Table INNER JOIN EduPrograms_Table
                        ON EduStudents_Table.IDProgram=EduPrograms_Table.IDProgram) 
                        ON EduAccounts_Table.IDAccount=EduStudents_Table.IDAccount
                   WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getStudentCatalogByLevel($dat="")
    {
       if($dat["IDLevel"]!=null)
         {
             $sql="SELECT Nit, Name, Surname, Telephone, Address, Mail FROM EduAccounts_Table INNER JOIN
                        (EduStudents_Table INNER JOIN EduGroups_Table
                        ON EduStudents_Table.IDGroup=EduGroups_Table.IDGroup) 
                        ON EduAccounts_Table.IDAccount=EduStudents_Table.IDAccount
                   WHERE IDLevel=".$dat["IDLevel"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getStudentCatalogByProgram($dat="")
    {
       if($dat["IDProgram"]!=null)
         {
             $sql="SELECT Nit, Name, Surname, Telephone, Address, Mail FROM EduAccounts_Table INNER JOIN
                        (EduStudents_Table INNER JOIN EduPrograms_Table
                        ON EduStudents_Table.IDProgram=EduPrograms_Table.IDProgram) 
                        ON EduAccounts_Table.IDAccount=EduStudents_Table.IDAccount
                   WHERE IDProgram=".$dat["IDProgram"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getStudentCatalogByGroup($IDGroup)
    {
        $result=array();
       if($IDGroup!=null)
         {
             $sql="SELECT
                        EduAccounts_Table.IDAccount,
                        EduAccounts_Table.Nit, 
                        EduAccounts_Table.Surname,
                        EduAccounts_Table.Name,  
                        EduAccounts_Table.Telephone, 
                        EduAccounts_Table.Address, 
                        EduAccounts_Table.Mail FROM EduAccounts_Table INNER JOIN
                        (EduEnrollment_Table INNER JOIN EduGroups_Table
                        ON EduEnrollment_Table.IDGroup=EduGroups_Table.IDGroup) 
                        ON EduAccounts_Table.IDAccount=EduEnrollment_Table.IDAccount
                   WHERE EduEnrollment_Table.IDGroup=".$IDGroup."
                   AND EduEnrollment_Table.State='0' ORDER BY EduAccounts_Table.Surname ASC LIMIT 50";
             $result=$this->db->query($sql)->result(); 
                      
            }      
            return $result;
      
    }
    
    
    
    function getStudentByID($dat="")
    {
       if($dat["IDStudent"]!=null & $dat["IDInstitute"]!=null)
         {
             $sql="SELECT * FROM EduStudents_Table 
                        WHERE IDInstitute=".$dat["IDInstitute"]." 
                        AND IDStudent=".$dat["IDStudent"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }   
    
    function getStudentByNit($Nit, $IDInstitute)
    {
        $ret="-1";
       if($Nit!=null & $IDInstitute!=null)
         {
             $sql="SELECT IDAccountParent, IDAccountParent2, IDStudent
                    FROM EduStudents_Table INNER JOIN EduAccounts_Table
                        ON EduStudents_Table.IDAccount=EduAccounts_Table.IDAccount 
                    WHERE EduStudents_Table.IDInstitute=".$IDInstitute." 
                    AND EduAccounts_Table.Nit=".$Nit;
            $result=$this->db->query($sql)->result();
            
            foreach ($result as $value) {
                $ret=$value->IDAccountParent."_".
                        $value->IDAccountParent2."_".
                        $value->IDStudent;
            }
            }
            echo $ret;
    }   
    
    function updateEnrollment($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDEnrollment"]==null)
         {
             $fecha=date("Y-m-d H:i:s");
             $this->db->set('IDAccount',  $dat["IDAccount"]);
             $this->db->set('State',  '0');
             $this->db->set('Since',  $fecha);
             $this->db->set('Year',  $dat["Year"]);
             $this->db->set('IDProgram',  $dat["IDProgram"]);
             $this->db->set('IDGroup',  $dat["IDGroup"]);
             $this->db->set('IDInstitute',  $dat["IDInstitute"]);
             $this->db->insert('EduEnrollment_Table');
             $id = $this->db->insert_id();
             $dat["IDStudent"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduEnrollment_Table SET
 		idAccount=".$dat["IDAccount"].",
                state=".$dat["State"].",
		since=".$dat["Since"].", 
		year=".$dat["Year"].", 
                iDProgram=".$dat["IDProgram"].",  
                iDGroup=".$dat["IDGroup"].",
		idInstitute=".$dat["idInstitute"]." 
	    WHERE IDStudent=".$dat["IDStudent"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateEnrollmentField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduEnrollment_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDEnrollment=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteEnrollment($IDAccount, $Year)
    {
        $fecha=date("Y-m-d H:i:s");
       if($IDAccount!=null & $Year!=null)
         {
             $sql="UPDATE EduEnrollment_Table SET
                state='1',
		upto='".$fecha."'   
	    WHERE IDAccount=".$IDAccount."
                    AND Year=".$Year;
             echo $sql;
            $this->db->query($sql);           
            }      
        
    }   
    
    function getEnrollmentByNit($Nit, $IDInstitute, $Year)
    {
        $ret="-1";
       if($Nit!=null & $IDInstitute!=null)
         {
             $sql="SELECT EduEnrollment_Table.IDEnrollment, 
                    EduEnrollment_Table.State, 
                    EduEnrollment_Table.Since,
                    EduEnrollment_Table.Upto,
                    EduEnrollment_Table.Year,
                    EduEnrollment_Table.IDProgram,
                    EduEnrollment_Table.IDGroup
                    FROM EduEnrollment_Table INNER JOIN EduAccounts_Table
                                ON EduEnrollment_Table.IDAccount = EduAccounts_Table.IDAccount  
                    WHERE EduEnrollment_Table.State='true' 
                    AND EduEnrollment_Table.Year=".$Year." 
                    AND EduEnrollment_Table.IDInstitute=".$IDInstitute." 
                    AND EduAccounts_Table.Nit=".$Nit;
            $result=$this->db->query($sql)->result();
            
            foreach ($result as $value) {
                $ret=$value->IDEnrollment."_".
                        $value->IDProgram."_".
                        $value->IDGroup."_".
                        $value->State."_".
                        $value->Since."_".
                        $value->Upto."_";
            }
            }
            echo $ret;
    }    
    
    function updateRecordValue($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDRecordValue"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDMatter',  $dat["IDMatter"]);
            $this->db->set('IDAchievement',  $dat["IDAchievement"]);
            $this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->set('Year',  $dat["Year"]);
            $this->db->set('Description',  $dat["Description"]);
            $this->db->insert('EduRecordValues_Table');
             $id = $this->db->insert_id();
             $dat["IDRecordValue"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduRecordValues_Table SET
		description=".$dat["Description"].",
		iDMatter=".$dat["idMatter"].",
		iDAchievement=".$dat["IAchievement"].",
                iDGroup=".$dat["iDGroup"].",
                year=".$dat["Year"]." 
	    WHERE IDRecordValue=".$dat["IDRecordValue"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateRecordValueField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduRecordValues_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDRecordValue=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteRecordValue($IDRecordValue)
    {
       if($IDRecordValue!=null)
         {
             $sql="DELETE FROM EduRecordValues_Table WHERE IDRecordValue=".$IDRecordValue;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getRecordValueByGroup($Year, $IDMatter, $IDAchievement, $IDGroup)
    {
       if($Year!=null & $IDMatter!=null & $IDGroup!=null)
         {
             $sql="SELECT * FROM EduRecordValues_Table WHERE Year=".$Year.
                     " AND IDMatter=".$IDMatter;
                     " AND IDGroup=".$IDGroup;
             if($IDAchievement!=null)
             {
                 $sql=$sql." AND IDAchievement=".$IDAchievement;
             }
             else
             {
                 $sql=$sql." AND IDAchievement=0";
             }
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    } 
    
    function updateNote($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
          
          $sql="DELETE FROM EduNotes_Table WHERE
		iDRecordValue=".$dat["IDRecordValue"]." 
		AND year=".$dat["Year"]." 
		AND period=".$dat["Period"]." 
		AND iDAccount=".$dat["IDAccount"];
            $this->db->query($sql); 
            
        if($dat["IDNote"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDRecordValue',  $dat["IDRecordValue"]);
            $this->db->set('Year',  $dat["Year"]);
            $this->db->set('Period',  $dat["Period"]);
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('NoteValue',  $dat["NoteValue"]);
            $this->db->insert('EduNotes_Table');
             $id = $this->db->insert_id();
             $dat["IDNote"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduNotes_Table SET
		iDRecorValue=".$dat["IDRecordValue"].",
		year=".$dat["Year"].",
		period=".$dat["Period"].",
		iDAccount=".$dat["IDAccount"].",
		noteValue=".$dat["NoteValue"]."
	    WHERE IDNote=".$dat["IDNote"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateNoteField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduNotes_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDNote=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteNote($IDNote)
    {
       if($IDNote!=null)
         {
             $sql="DELETE FROM EduNotes_Table WHERE IDNote=".$IDNote;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getNoteByGroup($Year, $Period, $IDRecordValue, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDRecordValue!=null)
         {
             $sql="SELECT * FROM EduNotes_Table WHERE Year=".$Year.
                     " AND Period=".$Period." ".
                     " AND IDAccount=".$IDAccount." ".
                     " AND IDRecordValue=".$IDRecordValue;
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateAssistance($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
        if($dat["IDAssistance"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDAssistance',  $dat["IDAssistance"]);
            $this->db->set('IDMatter',  $dat["IDMatter"]);
            $this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('Description',  $dat["Description"]);
            $this->db->set('AbsentDate',  $dat["AbsentDate"]);
            $this->db->insert('EduAssistances_Table');
             $id = $this->db->insert_id();
             $dat["IDAssistance"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduAssistances_Table SET
		iDMatter=".$dat["IDMatter"].",
		iDGroup=".$dat["IDGroup"].",
		description=".$dat["Description"].",
		absentDate=".$dat["AbsentDate"].",
		iDAccount=".$dat["IDAccount"]." 
	    WHERE IDAssistance=".$dat["IDAssistance"];
            $this->db->query($sql);  
            //$result=$this->db->query($sql,$dat)->result();
         //   foreach ($result as $value) {
              //  $value->name;
                
           // }
        }
    }
    
    function updateAssistanceField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduAssistances_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDAssistance=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteAssistance($IDAssistance)
    {
       if($IDAssistance!=null)
         {
             $sql="DELETE FROM EduAssistances_Table WHERE IDAssistance=".$IDAssistance;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getAssistanceByGroupByCell($RecordDate, $IDMatter, $IDGroup, $IDAccount)
    {
       if($RecordDate!=null & $IDMatter!=null & $IDGroup!=null & $IDAccount!=null)
         {
             $sql="SELECT * FROM EduAssistances_Table WHERE ".
                     " IDAccount=".$IDAccount." ".
                     " AND IDMatter=".$IDMatter." ".
                     " AND IDGroup=".$IDGroup." ".
                     " AND date(AbsentDate)=date('".$RecordDate."')";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function insertYearNoteForPeriod($Year, $IDMatter, $IDGroup, $IDAccount)
    {
        if($Year!=null & $IDMatter!=null & $IDGroup!=null & $IDAccount!=null)
         {
            $this->db->set('Year',  $Year);
            $this->db->set('IDGroup',  $IDGroup);
            $this->db->set('IDMatter',  $IDMatter);
            $this->db->set('IDAccount',  $IDAccount);
            $this->db->insert('EduYearNotes_Table');
             $id = $this->db->insert_id();
             return $id;
        }   
    }
    
    function updateYearNoteForPeriod($IDYearNote, $Period, $Def, $Absents, $FailedObjectives)
    {
     if($Def==null)
     {
         $Def=0;
     }
     if($Absents==null)
     {
         $Absents=0;
     }
     if($FailedObjectives==null)
     {
         $FailedObjectives=0;
     }
     if($Period==1)
         {
            $sql="UPDATE EduYearNotes_Table SET
            defP0=".$Def.",
            Absents0=".$Absents.", 
            FailedObjectives0=".$FailedObjectives." 
	    WHERE IDYearNote=".$IDYearNote;
            $this->db->query($sql); 
         }
     if($Period==2)
         {
            $sql="UPDATE EduYearNotes_Table SET
            defP1=".$Def.",
            Absents1=".$Absents.", 
            FailedObjectives1=".$FailedObjectives."
	    WHERE IDYearNote=".$IDYearNote;
            $this->db->query($sql); 
         }
     if($Period==3)
         {
            $sql="UPDATE EduYearNotes_Table SET
            defP2=".$Def.",
            Absents2=".$Absents.",
            FailedObjectives2=".$FailedObjectives."
	    WHERE IDYearNote=".$IDYearNote;
            $this->db->query($sql); 
         }
     if($Period==4)
         {
            $sql="UPDATE EduYearNotes_Table SET
            defP3=".$Def.",
            Absents3=".$Absents.", 
            FailedObjectives3=".$FailedObjectives."
	    WHERE IDYearNote=".$IDYearNote;
            $this->db->query($sql); 
         }
    }
    
    function getYearNoteByIDAccount($Year, $IDMatter, $IDGroup, $IDAccount)
    {
       if($Year!=null & $IDMatter!=null & $IDGroup!=null & $IDAccount!=null)
         {
             $sql="SELECT * FROM EduYearNotes_Table WHERE ".
                     " IDAccount=".$IDAccount." ".
                     " AND IDMatter=".$IDMatter." ".
                     " AND IDGroup=".$IDGroup." ".
                     " AND Year='".$Year."'";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getDefByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDMatter!=null & $IDGroup!=null & $IDAccount!=null)
         {
             $sql="SELECT DISTINCT AVG(NoteValue) AS Def 
                      FROM EduNotes_Table INNER JOIN EduRecordValues_Table 
                      ON EduNotes_Table.IDRecordValue=EduRecordValues_Table.IDRecordValue 
                      WHERE ".
                     " EduNotes_Table.IDAccount=".$IDAccount." ".
                     " AND EduRecordValues_Table.IDMatter=".$IDMatter." ".
                     " AND EduRecordValues_Table.IDGroup=".$IDGroup." ".
                     " AND EduNotes_Table.Year=".$Year." ".
                     " AND EduNotes_Table.Period='".$Period."'";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getFailedObjectivesByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDMatter!=null & $IDAccount!=null & $IDGroup!=null)
         {
             $sql="SELECT DISTINCT COUNT(IDObjectiveNote) AS FailedObjectives 
                      FROM EduObjectiveNotes_Table INNER JOIN EduObjectives_Table 
                      ON EduObjectiveNotes_Table.IDObjective=EduObjectives_Table.IDObjective 
                      WHERE ".
                     " EduObjectiveNotes_Table.IDAccount=".$IDAccount." ".
                     " AND EduObjectives_Table.IDMatter=".$IDMatter." ".
                     " AND EduObjectiveNotes_Table.IDGroup=".$IDGroup." ".
                     " AND EduObjectiveNotes_Table.Year=".$Year." ".
                     " AND EduObjectiveNotes_Table.Period='".$Period."'";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getAbsentsByIDAccount($Year, $Period, $IDMatter, $IDGroup, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDMatter!=null & $IDGroup!=null & $IDAccount!=null)
         {
             $sql="SELECT COUNT(IDAssistance) AS Absents FROM EduAssistances_Table WHERE ".
                     " IDAccount=".$IDAccount." ".
                     " AND IDMatter=".$IDMatter." ".
                     " AND IDGroup=".$IDGroup." ".
                     " AND YEAR(AbsentDate)=".$Year." ";
            /*if($Period==0)
                {
                $sql = $sql." AND MONTH(AbsentDate) BETWEEN 2 AND 3";
                }
            else if($Period==1)
                {
                $sql = $sql." AND MONTH(AbsentDate) BETWEEN 4 AND 5";
                }
            else if($Period==2)
                {
                $sql = $sql." AND MONTH(AbsentDate) BETWEEN 7 AND 8";
                }
            else if($Period==3)
                {
                $sql = $sql." AND MONTH(AbsentDate) BETWEEN 9 AND 10";
                }*/
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateConductNote($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
          
                $sql="DELETE FROM EduConductNotes_Table WHERE
		iDGroup=".$dat["IDGroup"]." 
		AND iDAccount=".$dat["IDAccount"]." 
		AND year=".$dat["Year"]." 
		AND period=".$dat["Period"];
            $this->db->query($sql); 
        if(true)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('Year',  $dat["Year"]);
            $this->db->set('Period',  $dat["Period"]);
            $this->db->set('NoteValue',  $dat["NoteValue"]);
            $this->db->insert('EduConductNotes_Table');
             $id = $this->db->insert_id();
             $dat["IDConductNote"]=$id;
             return $id;
        }
    }
    
    function updateConductNoteField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduConductNotes_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDConductNote=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteConductNote($IDConductNote)
    {
       if($IDConductNote!=null)
         {
             $sql="DELETE FROM EduConductNotes_Table WHERE IDConductNote=".$IDConductNote;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getConductNoteByGroupByCell($Year, $Period, $IDGroup, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDGroup!=null & $IDAccount!=null)
         {
             $sql="SELECT * FROM EduConductNotes_Table WHERE ".
                     " IDAccount=".$IDAccount." ".
                     " AND IDGroup=".$IDGroup." ".
                     " AND Year=".$Year." ".
                     " AND Period=".$Period."";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateObjective($dat="")
    {
      $fecha=date("Y-m-d H:i:s");
        if($dat["IDObjective"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('Name',  $dat["Name"]);
            $this->db->set('Description',  $dat["Description"]);
            $this->db->set('IDMatter',  $dat["IDMatter"]);
            $this->db->insert('EduObjectives_Table');
             $id = $this->db->insert_id();
             $dat["IDObjective"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduObjectives_Table SET
		name=".$dat["Name"].",
		description=".$dat["Description"]." 
	    WHERE IDObjective=".$dat["IDObjective"];
            $this->db->query($sql);
        }
    }
    
    function updateObjectiveField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduObjectives_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDObjective=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteObjective($dat="")
    {
       if($dat!=null)
         {
             $sql="DELETE FROM EduObjectives_Table WHERE IDObjective=".$dat;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getObjectiveCatalog($dat="")
    {
       if($dat["IDMatter"]!=null)
         {
             $sql="SELECT * FROM EduObjectives_Table WHERE IDMatter=".$dat["IDMatter"]." ORDER BY NAME ASC";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getObjectiveByID($dat="")
    {
       if($dat["IDObjective"]!=null)
         {
             $sql="SELECT * FROM EduObjectives_Table WHERE IDObjective=".$dat["IDObjective"]." 
                 ";
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateObjectiveNote($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
          
          $sql="DELETE FROM EduObjectiveNotes_Table WHERE
		iDObjective=".$dat["IDObjective"]." 
		AND year=".$dat["Year"]." 
		AND period=".$dat["Period"]." 
 		AND iDGroup=".$dat["IDGroup"]." 
		AND iDAccount=".$dat["IDAccount"];
            $this->db->query($sql); 
            
        if($dat["IDObjectiveNote"]==null)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDObjective',  $dat["IDObjective"]);
            $this->db->set('Year',  $dat["Year"]);
            $this->db->set('Period',  $dat["Period"]);
            $this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('ObjectiveValue',  $dat["ObjectiveValue"]);
            $this->db->insert('EduObjectiveNotes_Table');
             $id = $this->db->insert_id();
             $dat["IDObjectiveNote"]=$id;
             return $id;
        }
        else
        {
             $sql="UPDATE EduObjectiveNotes_Table SET
		iDObjective=".$dat["IDObjective"].",
		year=".$dat["Year"].",
		period=".$dat["Period"].",
		iDAccount=".$dat["IDAccount"].",
		iDGroup=".$dat["iDGroup"].",
		ObjectiveValue=".$dat["ObjectiveValue"]."
	    WHERE IDObjectiveNote=".$dat["IDObjectiveNote"];
            $this->db->query($sql);  
        }
    }
    
    function updateObjectiveNoteField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduObjectiveNotes_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDObjectiveNote=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteObjectiveNote($IDObjectiveNote)
    {
       if($IDObjectiveNote!=null)
         {
             $sql="DELETE FROM EduObjectiveNotes_Table WHERE IDObjectiveNote=".$IDObjectiveNote;
            $result=$this->db->query($sql)->result();            
            }      
        
    }
    
    function getObjectiveNoteByGroupByCell($Year, $Period, $IDObjective, $IDGroup, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDObjective!=null & $IDGroup!=null)
         {
             $sql="SELECT * FROM EduObjectiveNotes_Table WHERE Year=".$Year.
                     " AND Period=".$Period." ".
                     " AND IDAccount=".$IDAccount." ".
                     " AND IDGroup=".$IDGroup." ".
                     " AND IDObjective=".$IDObjective;
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function updateRecoverObjective($dat="")
    {
          $fecha=date("Y-m-d H:i:s");
          
                $sql="DELETE FROM EduRecoverObjectives_Table WHERE
		iDObjectiveNote=".$dat["IDObjectiveNote"]." 
		AND iDGroup=".$dat["IDGroup"]." 
		AND iDAccount=".$dat["IDAccount"];
            $this->db->query($sql); 
        if(true)
         {
            $fecha=date("Y-m-d H:i:s");
            $this->db->set('IDAccount',  $dat["IDAccount"]);
            $this->db->set('IDObjectiveNote',  $dat["IDObjectiveNote"]);
            $this->db->set('IDGroup',  $dat["IDGroup"]);
            $this->db->set('RecoverDate',  $dat["RecoverDate"]);
            $this->db->set('NoteValue',  $dat["NoteValue"]);
            $this->db->insert('EduRecoverObjectives_Table');
             $id = $this->db->insert_id();
             $dat["IDRecoverObjective"]=$id;
             return $id;
        }
    }
    
    function updateRecoverObjectiveField($fieldName, $fieldValue, $key)
    {
	if($fieldName!=null & $fieldValue!=null & $key!=null)
	{
             $sql="UPDATE EduRecoverObjectives_Table SET
                 ".$fieldName."='".$fieldValue."' 
                             WHERE IDRecoverObjective=".$key;
             $this->db->query($sql);
             }
    }
    
    function deleteRecoverObjective($IDRecoverObjective)
    {
       if($IDRecoverObjective!=null)
            {
             $sql="DELETE FROM EduRecoverObjectives_Table WHERE IDRecoverObjective=".$IDRecoverObjective;
            $this->db->query($sql);            
            }      
        
    }
    
    function getRecoverObjectiveByAccount($IDObjectiveNote, $IDAccount)
    {
       if($IDObjectiveNote!=null & $IDAccount!=null)
         {
             $sql="SELECT * FROM EduRecoverObjectives_Table WHERE ".
                     " IDAccount=".$IDAccount." ".
                     " AND IDObjectiveNote=".$IDObjectiveNote;
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getFailedObjectivesByGroup($Year, $Period, $IDAccount)
    {
       if($Year!=null & $Period!=null & $IDAccount!=null)
         {
             $sql="SELECT DISTINCT 
                      EduGroups_Table.Name AS GroupName, ".
                     "EduMatters_Table.Name AS MatterName, ".
                     "EduObjectives_Table.Name AS ObjectiveName, ".
                     "EduObjectiveNotes_Table.IDGroup AS IDGroup, ".
                     "EduObjectiveNotes_Table.IDObjectiveNote AS IDObjectiveNote ".
                     "FROM EduMatters_Table INNER JOIN".
                            " (EduObjectives_Table INNER JOIN
                                    (EduObjectiveNotes_Table INNER JOIN EduGroups_Table ON EduObjectiveNotes_Table.IDGroup=EduGroups_Table.IDGroup)
                               ON EduObjectives_Table.IDObjective=EduObjectiveNotes_Table.IDObjective)".
                     " ON EduMatters_Table.IDMatter=EduObjectives_Table.IDMatter".
                     " WHERE EduObjectiveNotes_Table.Year=".$Year.
                     " AND EduObjectiveNotes_Table.Period=".$Period.
                     " AND EduObjectiveNotes_Table.IDAccount=".$IDAccount;
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getNotesCatalogByAccount($Year, $Period, $IDAccount)
    {
        $result=array();
       if($Year!=null & $Period!=null & $IDAccount!=null)
         {
             $sql="SELECT
                        EduYearNotes_Table.IDGroup,
                        EduYearNotes_Table.IDMatter,";
             if($Period==1)
                    {
                    $sql=$sql." EduYearNotes_Table.DefP0 AS Def, 
                            EduYearNotes_Table.FailedObjectives0 AS FailedObjectives, 
                            EduYearNotes_Table.Absents0 AS Absents, ";
                    }
             else if($Period==2)
                    {
                    $sql=$sql." EduYearNotes_Table.DefP1 AS Def, 
                            EduYearNotes_Table.FailedObjectives1 AS FailedObjectives, 
                            EduYearNotes_Table.Absents1 AS Absents, ";
                    }
             else if($Period==3)
                    {
                    $sql=$sql." EduYearNotes_Table.DefP2 AS Def,
                            EduYearNotes_Table.FailedObjectives2 AS FailedObjectives, 
                            EduYearNotes_Table.Absents2 AS Absents, ";
                    }
             else if($Period==4)
                    {
                    $sql=$sql." EduYearNotes_Table.DefP3 AS Def,
                            EduYearNotes_Table.FailedObjectives3 AS FailedObjectives, 
                            EduYearNotes_Table.Absents3 AS Absents, ";
                    }
             $sql=$sql."EduMatters_Table.Name AS MatterName
                   FROM EduYearNotes_Table INNER JOIN EduMatters_Table
                        ON EduYearNotes_Table.IDMatter=EduMatters_Table.IDMatter
                   WHERE EduYearNotes_Table.Year=".$Year." 
                   AND EduYearNotes_Table.IDAccount=".$IDAccount." 
                   ORDER BY EduMatters_Table.Name";
             $result=$this->db->query($sql)->result(); 
                      
            }      
            return $result;
    }
    
    function getConductNoteByAccount($Year, $Period, $IDAccount)
    {
        $result=array();
       if($Year!=null & $Period!=null & $IDAccount!=null)
         {
             $sql="SELECT NoteValue
                   FROM EduConductNotes_Table 
                   WHERE Year=".$Year." 
                   AND Period=".$Period." 
                   AND IDAccount=".$IDAccount;
             $result=$this->db->query($sql)->result(); 
                      
            }      
            return $result;
    }
}
?>