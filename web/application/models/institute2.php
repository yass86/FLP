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
             $sql="SELECT IDInstitute, IDAccount, Code, Name, Since, Type  FROM EduInstitute_Table WHERE IDInstitute=".$dat["IDInstitute"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();   
            return $result;
            }      
    }
    
    function getInstituteByID($dat="")
    {
       if($dat["IDInstitute"]!=0)
         {
             $sql="SELECT IDInstitute, IDAccount, Code, Name, Since, Type  FROM EduInstitute_Table WHERE IDInstitute=".$dat["IDInstitute"]."";
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
             $sql="SELECT IDEstablishment, Code, Name, Type, City, Address, Telephone, Director FROM EduEstablishments_Table WHERE IDInstitute=".$dat["IDInstitute"];
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
             echo $sql;
             exit();
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
                 Day1, Day2, Day3, Day4, Day5, Day6, Day7 FROM EduSchedules_Table WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getScheduleByID($dat="")
    {
       if($dat["IDInstitute"]!=null)
         {
             $sql="SELECT IDSchedule, Code, Name, InitHour, EndingHour, Type, 
                 Day1, Day2, Day3, Day4, Day5, Day6, Day7  FROM EduSchedules_Table WHERE IDInstitute=".$dat["IDInstitute"]; 
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
             $sql="SELECT IDLevel, Code, Name, Since, Type  FROM EduLevel_Table WHERE IDInstitute=".$dat["IDInstitute"];
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
             $sql="SELECT IDAcademicArea, Code, Name, Description, Since  FROM EduAcademicArea_Table WHERE IDInstitute=".$dat["IDInstitute"];
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
             $sql="SELECT IDProgram,year,iDLevel,iDEstablishment,iDSchedule,code,name,periods,gender,state,since  FROM EduProgram_Table WHERE IDInstitute=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getProgramByID($dat="")
    {
       if($dat["IDProgram"]!=null)
         {
             $sql="SELECT year,iDLevel,iDEstablishment,iDSchedule,code,name,periods,gender,state,since  FROM EduProgram_Table WHERE IDProgram=".$dat["IDProgram"]." 
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
             $sql="SELECT *  FROM EduGrade_Table WHERE IDGrade=".$dat["IDLevel"];
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
            $this->db->set('Description',  $dat["Description"]);
            $this->db->set('IDAcademicArea',  $dat["IDAcademicArea"]);
            $this->db->set('Achievements',  $dat["Achievements"]);
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
		description=".$dat["Description"].",
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
             $sql="SELECT * FROM EduMatters_Table WHERE IDGrade=".$dat["IDGrade"];
             $result=$this->db->query($sql)->result(); 
            return $result;
            }      
    }
    
    function getMatterByID($dat="")
    {
       if($dat["IDMatter"]!=null)
         {
             $sql="SELECT * FROM EduMatters_Table WHERE IDMatter=".$dat["IDMatter"]." 
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
             $sql="SELECT * FROM EduAchievements_Table WHERE IDAchievement=".$dat["IDMatter"];
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
             $this->db->set('IDAcademicArea',  $dat["IDAcademicArea"]);
             $this->db->set('Title',  $dat["Title"]);
             $this->db->set('Scale',  $dat["Scale"]);
             $this->db->set('Since',  $fecha);
             $this->db->set('IDInstitution',  $dat["IDInstitution"]);
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
		iDAcademicArea=".$dat["IDAcademicArea"].", 
		title=".$dat["Title"].", 
		scale=".$dat["Scale"].", 
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
             $sql="SELECT * FROM EduTeachers_Table WHERE IDTeacher=".$dat["IDInstitute"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getTeacherByID($dat="")
    {
       if($dat["IDTeacher"]!=null)
         {
             $sql="SELECT * FROM EduTeachers_Table WHERE IDTeacher=".$dat["IDTeacher"]." 
                 WHERE IDTeacher=".$dat["IDTeacher"];
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
       if($dat["IDGroup"]!=null)
         {
             $sql="SELECT IDGroup, Name, Description FROM EduGroups_Table WHERE IDGroup=".$dat["IDGroup"];
             $result=$this->db->query($sql)->result(); 
            return $result;           
            }      
        return $result;
    }
    
    function getGroupByID($dat="")
    {
       if($dat["IDGroup"]!=null)
         {
             $sql="SELECT IDGroup, Name, Description FROM EduGroups_Table WHERE IDGroup=".$dat["IDGroup"]." 
                 WHERE IDGroup=".$dat["IDGroup"];
            $this->db->query($sql,$dat);  
            $result=$this->db->query($sql,$dat)->result();            
            }      
        return $result;
    }


 
                 
}
?>