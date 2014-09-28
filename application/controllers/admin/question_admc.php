<?php
class Question_admc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('option_model');
		$this->load->model('category_model');
					
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index($offset=0)
	{
		$data['recQuestion']=$this->question_model->getquestionjoin();
		$data['dataCatQuest']=$this->category_model->getcategorynav();		
		$data['admin_page']='question_adm';
		$this->load->view('backend',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processNewQst()
	{
		$config['upload_path']="img";
		$config['encrypt_name']=true;		
		$this->load->library("upload",$config);			
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$qst_img=$dataUpload['file_name'];
			}
			else
			{
				$qst_img="noimage.png";
			}
			
		$questPostDate=date("Y-m-d");		
		$arrayQst=array(
			'qst_id'=>'',
			'qst_img'=>$qst_img,
			'qst_description'=>$this->input->post("qst_description"),
			'qst_question'=>$this->input->post("qst_question"),
			'qst_answerkey'=>$this->input->post("qst_answerkey"),
			'qst_showexam'=>$this->input->post("qst_showexam"),
			'cat_id'=>$this->input->post("cat_id"),
			'qst_iduser'=>$this->session->userdata('sess_usr_id'),
			'qst_idmoderator'=>$this->session->userdata('sess_usr_id'),
			'qst_postdate'=>$questPostDate,
			'qst_confirmeddate'=>$questPostDate,
			'qst_status'=>$this->input->post("qst_status"),
		);			
		$questionID=$this->question_model->savenewqst($arrayQst);		
		$dataOption = $this->input->post("option");
		$dataTrueFalse = $this->input->post("opt_truefalse");
		
		$jumlahOption=count($dataOption);
		for($i=0;$i<$jumlahOption;$i++)
		{
			$arrayOpt=array(
				'opt_id'=>'',
				'qst_id'=>$questionID,
				'opt_choices'=>$dataOption[$i],
				'opt_truefalse'=>$dataTrueFalse[$i]
			);
			$this->option_model->saveoption($arrayOpt);
		}
		redirect('admin/question_admc');
	}	
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function UpdateQst($qst_id)
	{
		$dataQst=$this->question_model->getqst_qstid($qst_id)->row();
		$data['qst_id']=$dataQst->qst_id;
		$data['qst_img']=$dataQst->qst_img;
		$data['qst_description']=$dataQst->qst_description;
		$data['qst_question']=$dataQst->qst_question;
		$data['qst_answerkey']=$dataQst->qst_answerkey;
		$data['qst_showexam']=$dataQst->qst_showexam;
		$data['cat_id']=$dataQst->cat_id;
		$data['qst_iduser']=$dataQst->qst_iduser;
		$data['qst_idmoderator']=$dataQst->qst_idmoderator;
		$data['qst_postdate']=$dataQst->qst_postdate;
		$data['qst_confirmeddate']=$dataQst->qst_confirmeddate;
		$data['qst_status']=$dataQst->qst_status;		
		$data['dataOption']=$this->option_model->getOptQuestionID($dataQst->qst_id);
					
		$data['admin_page']='question_update';
		$this->load->view('admin/layout_modal_admin',$data);
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function processUpdateQst()
	{
			$config['upload_path']="img";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name']=true;
			
			$this->load->library("upload",$config);
			if($this->upload->do_upload("upload_file"))
			{
				$dataUpload=$this->upload->data();
				$qst_img=$dataUpload['file_name'];
				
				$arrayUpdateQst=array(
				'qst_img'=>$qst_img,
				'qst_description'=>$this->input->post("qst_description"),
				'qst_question'=>$this->input->post("qst_question"),
				'qst_answerkey'=>$this->input->post("qst_answerkey"),
				'qst_showexam'=>$this->input->post("qst_showexam"),
				'cat_id'=>$this->input->post("cat_id"),
				'qst_iduser'=>$this->input->post("qst_iduser"),
				'qst_idmoderator'=>$this->input->post("qst_idmoderator"),
				'qst_postdate'=>$this->input->post("qst_postdate"),
				'qst_confirmeddate'=>$this->input->post("qst_confirmeddate"),
				'qst_status'=>$this->input->post("qst_status"),
				);
			}
			else
			{
				$arrayUpdateQst=array(				
				'qst_description'=>$this->input->post("qst_description"),
				'qst_question'=>$this->input->post("qst_question"),
				'qst_answerkey'=>$this->input->post("qst_answerkey"),
				'qst_showexam'=>$this->input->post("qst_showexam"),
				'cat_id'=>$this->input->post("cat_id"),
				'qst_iduser'=>$this->input->post("qst_iduser"),
				'qst_idmoderator'=>$this->input->post("qst_idmoderator"),
				'qst_postdate'=>$this->input->post("qst_postdate"),
				'qst_confirmeddate'=>$this->input->post("qst_confirmeddate"),
				'qst_status'=>$this->input->post("qst_status")
				);
			}			
			$this->question_model->saveupdateqst($arrayUpdateQst,$this->input->post('qst_id'));
			
			$questionID=$this->input->post('qst_id');
			$this->option_model->delOptionbyID($questionID);
			
			$dataOption = $this->input->post("option");
			$dataTrueFalse = $this->input->post("opt_truefalse");
			
			$jumlahOption=count($dataOption);
			for($i=0;$i<$jumlahOption;$i++)
			{
				$arrayOpt=array(
					'opt_id'=>'',
					'qst_id'=>$questionID,
					'opt_choices'=>$dataOption[$i],
					'opt_truefalse'=>$dataTrueFalse[$i]
				);
				$this->option_model->saveoption($arrayOpt);
			}
			
			redirect('admin/question_admc');
		}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function DeleteQst($qst_id)
	{
		$this->question_model->deleteqst($qst_id);		
		redirect('admin/question_admc');
	}	
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function add_option_byid()
	{
		$option = $this->input->post("option");
		$qst_id = $this->input->post("idOption");
		$opt_choices = $this->input->post("opt_choices");
		$opt_truefalse = $this->input->post("opt_truefalse");
		
		$dataOption=array(
			'opt_id'=>'',
			'qst_id'=>$qst_id,
			'opt_choices'=>$option,
			'opt_truefalse'=>$opt_truefalse,
		);
		$this->option_model->saveoption($dataOption);
		redirect('admin/question_admc');

	}
}
