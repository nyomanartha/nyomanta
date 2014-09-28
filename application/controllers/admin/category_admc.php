<?php
class Category_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		
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
		$data['recCatLimit']=$this->category_model->getcategorynav();
		$data['admin_page']='category_adm';
		$this->load->view('backend',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function processNewCat()
	{
		
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$cat_img=$dataUpload['file_name'];
			}
			else
			{
				$cat_img="noimage.png";
			}			
		$arrayCat=array(
			'cat_id'=>'',
			'cat_name'=>$this->input->post("cat_name"),
			'cat_img'=>$cat_img,
			'cat_description'=>$this->input->post("cat_description"),
		);
		
		$this->category_model->savenewcat($arrayCat);
		redirect('admin/category_admc');
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function UpdateCat($cat_id)
	{
		$dataCat=$this->category_model->getcat_catid($cat_id)->row();
		$data['cat_id']=$dataCat->cat_id;
		$data['cat_img']=$dataCat->cat_img;
		$data['cat_name']=$dataCat->cat_name;
		$data['cat_description']=$dataCat->cat_description;			
		$data['admin_page']='category_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processUpdateCat()
	{
			$config['upload_path']="img";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$cat_img=$dataUpload['file_name'];
				
				$arrayUpdateCat=array(
				'cat_name'=>$this->input->post("cat_name"),
				'cat_img'=>$cat_img,
				'cat_description'=>$this->input->post("cat_description")
			);
			}
			else
			{
				$arrayUpdateCat=array(
				'cat_name'=>$this->input->post("cat_name"),
				'cat_description'=>$this->input->post("cat_description"));
			}			
			$this->category_model->saveupdatecat($arrayUpdateCat,$this->input->post('cat_id'));
			redirect('admin/category_admc');
		}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function DeleteCat($cat_id)
	{
		$dataCat=$this->category_model->getcat_catid($cat_id);
		
		if($dataCat->num_rows()>0)
		{
			$recCat=$dataCat->row();
			
			$cat_img=$recCat->cat_img;
			if($cat_img!="noimage.png")
			{
				unlink(realpath(APPPATH.'../img/'.$cat_img));
			}
			$this->category_model->deletecat($cat_id);		
					
			$this->session->set_flashdata("message","Proses Penghapusan Data Berhasil Dilakukan");
			redirect('admin/category_admc');
				
		}
		else
		{
			echo "Data tidak terhapus";
		}		
	}	
}
