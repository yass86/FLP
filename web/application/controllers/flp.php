<?php 
class Flp extends CI_Controller {
	public function index()
	{          
            $cont['header']=  $this->load->view('front/header',null,true);
            $cont['preface']=  $this->load->view('front/preface',null,true);
            $cont['main']=  $this->load->view('front/main',null,true);
            $cont['footer']=  $this->load->view('front/footer',null,true);
            
            echo $this->load->view('template',$cont,true);                    
	}
        function precarga()
        {
            echo $this->load->view("preload",null,true);
        }
} 
