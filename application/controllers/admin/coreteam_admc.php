<?php
class Coreteam_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('coreteam_model');
				
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
		$data['recCoreTeamLimit']=$this->coreteam_model->getcoreteam ();
		$data['admin_page']='coreteam_adm';
		$this->load->view('backend',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processNewCoreTeam()
	{		
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$ct_img=$dataUpload['file_name'];
			}
			else
			{
				$ct_img="noimage.jpg";
			}			
		$arrayCoreTeam=array(
			'ct_id'=>'',
			'ct_header'=>$this->input->post("ct_header"),
			'ct_content'=>$this->input->post("ct_content"),
			'ct_img'=>$ct_img,
		);
		
		$this->coreteam_model->savenewcoreteam($arrayCoreTeam);
		redirect('admin/coreteam_admc');
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function UpdateCoreTeam($ct_id)
	{
		$dataCoreTeam=$this->coreteam_model->getcoreteam_ctid($ct_id)->row();
		$data['ct_id']=$dataCoreTeam->ct_id;
		$data['ct_header']=$dataCoreTeam->ct_header;	
		$data['ct_content']=$dataCoreTeam->ct_content;			
		$data['admin_page']='coreteam_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processUpdateCoreTeam()
	{
			$config['upload_path']="img";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$ct_img=$dataUpload['file_name'];
				
				$arrayUpdateCoreTeam=array(
				'ct_header'=>$this->input->post("ct_header"),
				'ct_content'=>$this->input->post("ct_content"),
				'ct_img'=>$ct_img,
			);
			}
			else
			{
				$arrayUpdateCoreTeam=array(
				'ct_content'=>$this->input->post("ct_content"),
				'ct_header'=>$this->input->post("ct_header"));
			}			
			$this->coreteam_model->saveupdatecoreteam($arrayUpdateCoreTeam,$this->input->post('ct_id'));
			redirect('admin/coreteam_admc');
		}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function DeleteCoreTeam($ct_id)
	{
		$this->coreteam_model->deletecoreteam($ct_id);
		redirect('admin/coreteam_admc');
	}	
}
