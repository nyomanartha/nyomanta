<?php
class Carousel_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('carousel_model');
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
	function index($offset=0)
	{
		$data['recCrsLimit']=$this->carousel_model->getcarousel();
		$data['admin_page']='carousel_adm';
		$this->load->view('backend',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processNewCrs()
	{		
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$crs_img=$dataUpload['file_name'];
			}
			else
			{
				$crs_img="noimage.png";
			}			
		$arrayCrs=array(
			'crs_id'=>'',
			'crs_header'=>$this->input->post("crs_header"),
			'crs_img'=>$crs_img,
		);
		
		$this->carousel_model->savenewcrs($arrayCrs);
		redirect('admin/carousel_admc');
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function UpdateCrs($crs_id)
	{
		$dataCrs=$this->carousel_model->getcrs_crsid($crs_id)->row();
		$data['crs_id']=$dataCrs->crs_id;
		$data['crs_header']=$dataCrs->crs_header;			
		$data['admin_page']='carousel_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processUpdateCrs()
	{
			$config['upload_path']="img";
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$crs_img=$dataUpload['file_name'];
				
				$arrayUpdateCrs=array(
				'crs_header'=>$this->input->post("crs_header"),
				'crs_img'=>$crs_img,
				);
			}
			else
			{
				$arrayUpdateCrs=array(
				'crs_header'=>$this->input->post("crs_header"));
			}			
			$this->carousel_model->saveupdatecrs($arrayUpdateCrs,$this->input->post('crs_id'));
			redirect('admin/carousel_admc');
		}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function DeleteCrs($crs_id)
	{
		$this->carousel_model->deletecrs($crs_id);
		redirect('admin/carousel_admc');
	}	
}
