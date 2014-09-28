<?php
class User_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
		
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
		$data['recUserLimit']=$this->user_model->getuser ();
		$data['admin_page']='user_adm';
		$this->load->view('backend',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processNewUser()
	{		
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$usr_img=$dataUpload['file_name'];
			}
			else
			{
				$usr_img="noimage.jpg";
			}			
		$arrayUser=array(
			'usr_id'=>'',
			'usr_name'=>$this->input->post("usr_name"),
			'usr_email'=>$this->input->post("usr_email"),
			'usr_username'=>$this->input->post("usr_username"),
			'usr_password'=>$this->input->post("usr_password"),
			'usr_img'=>$usr_img,
		);
		
		$this->user_model->savenewuser($arrayUser);
		redirect('admin/user_admc');
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function UpdateUser($usr_id)
	{
		$dataUser=$this->user_model->getuser_usrid($usr_id)->row();
		$data['usr_id']=$dataUser->usr_id;
		$data['usr_name']=$dataUser->usr_name;	
		$data['usr_email']=$dataUser->usr_email;
		$data['usr_username']=$dataUser->usr_username;
		$data['usr_password']=$dataUser->usr_password;			
		$data['admin_page']='user_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processUpdateUser()
	{
			$config['upload_path']="img";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$usr_img=$dataUpload['file_name'];
				
				$arrayUpdateUser=array(
				'usr_name'=>$this->input->post("usr_name"),
				'usr_email'=>$this->input->post("usr_email"),
				'usr_username'=>$this->input->post("usr_username"),
				'usr_password'=>$this->input->post("usr_password"),			
				'usr_img'=>$usr_img,
			);
			}
			else
			{
				$arrayUpdateUser=array(
				'usr_name'=>$this->input->post("usr_name"),
				'usr_email'=>$this->input->post("usr_email"),
				'usr_username'=>$this->input->post("usr_username"),
				'usr_password'=>$this->input->post("usr_password"));
			}			
			$this->user_model->saveupdateuser($arrayUpdateUser,$this->input->post('usr_id'));
			redirect('admin/user_admc');
		}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function DeleteUser($usr_id)
	{
		$this->user_model->deleteuser($usr_id);
		redirect('admin/user_admc');
	}
}
