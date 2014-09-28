<?php
class User_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	
	}
	
	function proses_user_login()
	{
		$this->form_validation->set_rules("usr_email","Email","required|valid_email");
		$this->form_validation->set_rules("passwordinput","Password","required");
		
		if($this->form_validation->run()==true)
		{
			$email=$this->input->post("usr_email");
			$password=$this->input->post("passwordinput");
			
			$dataUser=$this->user_model->getUserByUsernamePass($email,$password);
			if($dataUser->num_rows()>0)
			{
				$recuser=$dataUser->row();
				$dataUserlogin=array(
				'sess_usr_id'=>$recuser->usr_id,
				'sess_usr_name'=>$recuser->usr_name,
				'sess_usr_email'=>$recuser->usr_email,
				'sess_level'=>$recuser->usr_level,
				'sess_login'=>true			
				);
				$this->session->set_userdata($dataUserlogin);
				redirect('user/home_usrc');
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
	
	function processNewUser()
	{						
		$arrayUser=array(
			'usr_id'=>'',
			'usr_name'=>$this->input->post("usr_name"),
			'usr_img'=>'',
			'usr_email'=>$this->input->post("usr_email"),
			'usr_username'=>'',
			'usr_password'=>md5($this->input->post("usr_password")),
			'usr_level'=>'moderator',
			
		);
		
		$this->user_model->savenewuser($arrayUser);
		redirect('user/home_usrc');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('web_controller');
	}
}
