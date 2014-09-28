<?php
class Adminlogin_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index()
	{
		$this->load->view('adminlogin');
	}
	
	function proses_login()
	{
		$this->form_validation->set_rules("txtemail","Email","required|valid_email");
		$this->form_validation->set_rules("txtpassword","Password","required");
		
		if($this->form_validation->run()==true)
		{
			$email=$this->input->post("txtemail");
			$password=$this->input->post("txtpassword");
			
			$dataUser=$this->admin_model->getAdminByEmailPass($email,$password);
			if($dataUser->num_rows()>0)
			{
				$recuser=$dataUser->row();
				$datalogin=array(
				'sess_usr_id'=>$recuser->idadmin,
				'usr_username'=>$recuser->emailadmin,
				'login'=>true			
				);
				$this->session->set_userdata($datalogin);
				redirect('admin/admc');
			}
			else
			{
				$this->session->set_flashdata("message","email atau password tidak valid");
				redirect('Adminlogin_controller');
			}
		}
		else
		{
			$this->load->view('adminlogin');
		}
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Adminlogin_controller');
	}
}
