<?php
class Admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata("login")!=true)
		{
			redirect('Adminlogin_controller');
		}
		
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index()
	{
		$data['admin_page']='home_adm';
		$this->load->view('backend',$data);
	}	
}