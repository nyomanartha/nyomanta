<?php
class Modteam_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modteam_model');
			
		if($this->session->userdata("login")!=true)
		{
			redirect('Adminlogin_controller');
		}		
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function index()
	{
		$data['recModTeamLimit']=$this->modteam_model->getmodteam ();
		$data['admin_page']='modteam_adm';
		$this->load->view('backend',$data);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processNewModTeam()
	{		
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$modt_img=$dataUpload['file_name'];
			}
			else
			{
				$modt_img="noimage.jpg";
			}			
		$arrayModTeam=array(
			'modt_id'=>'',
			'modt_header'=>$this->input->post("modt_header"),
			'modt_content'=>$this->input->post("modt_content"),
			'modt_img'=>$modt_img,
		);
		
		$this->modteam_model->savenewmodteam($arrayModTeam);
		redirect('admin/modteam_admc');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function UpdateModTeam($modt_id)
	{
		$dataModTeam=$this->modteam_model->getmodteam_modtid($modt_id)->row();
		$data['modt_id']=$dataModTeam->modt_id;
		$data['modt_header']=$dataModTeam->modt_header;	
		$data['modt_content']=$dataModTeam->modt_content;			
		$data['admin_page']='modteam_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function processUpdateModTeam()
	{
			$config['upload_path']="img";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$modt_img=$dataUpload['file_name'];
				
				$arrayUpdateModTeam=array(
				'modt_header'=>$this->input->post("modt_header"),
				'modt_content'=>$this->input->post("modt_content"),
				'modt_img'=>$modt_img,
			);
			}
			else
			{
				$arrayUpdateModTeam=array(
				'modt_content'=>$this->input->post("modt_content"),
				'modt_header'=>$this->input->post("modt_header"));
			}			
			$this->modteam_model->saveupdatemodteam($arrayUpdateModTeam,$this->input->post('modt_id'));
			redirect('admin/modteam_admc');
		}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/			
	function DeleteModTeam($modt_id)
	{
		$this->modteam_model->deletemodteam($modt_id);
		redirect('admin/modteam_admc');
	}	
}
