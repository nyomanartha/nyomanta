<?php
class About_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('seo_model');
		$this->load->model('about_model');
		$this->load->model('coreteam_model');
		$this->load->model('modteam_model');
		$this->load->model('category_model');
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index()
	{
		$recSeoAbout=$this->seo_model->getseoabout()->row();
		$data['seoTitle']=$recSeoAbout->abt_seotitle;
		$data['seoKeywords']=$recSeoAbout->abt_seokeywords;
		$data['seoDescription']=$recSeoAbout->abt_seodescription;
		$data['recAbout']=$this->about_model->getabout();
		$data['recCoreTeam']=$this->coreteam_model->getcoreteam();
		$data['recModTeam']=$this->modteam_model->getmodteam();
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['page']='content/about';
		$this->load->view('layout',$data);
	}	
}
