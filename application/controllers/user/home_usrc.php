<?php
class Home_usrc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	
		$this->load->model('category_model');
		$this->load->model('question_model');
		$this->load->model('option_model');
		
		if($this->session->userdata('sess_login')!=true && $this->session->userdata('sess_level')!="user" || $this->session->userdata('sess_login')!=true && $this->session->userdata('sess_level')!="moderator")
		{
			redirect('web_controller');
		}
	}
/*--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function index()
	{
	
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['content_page']='user/welcome';
		$data['page']='user/home_usr';
		$this->load->view('layout',$data);
	}
	
	function upload_question()
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['recQuestion']=$this->question_model->getquestionjoin();
		$data['dataCatQuest']=$this->category_model->getcategorynav();
		$data['content_page']='question_upload';
		$data['page']='user/home_usr';
		$this->load->view('layout',$data);
	}
	
	function process_upload_question()
	{
		$config['upload_path']="img";
		$config['allowed_types'] = 'gif|jpg|png';
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
		
		$dataQuestArray=array(
		'qst_id'=>'',
		'qst_description'=>$this->input->post('qst_description'),
		'qst_question'=>$this->input->post('qst_question'),
		'qst_answerkey'=>$this->input->post('qst_answerkey'),
		'qst_showexam'=>$this->input->post('qst_showexam'),
		'cat_id'=>$this->input->post('cat_id'),
		'qst_iduser'=>$this->session->userdata('sess_usr_id'),
		'qst_idmoderator'=>0,
		'qst_postdate'=>$questPostDate,
		'qst_confirmeddate'=>'0000-00-00',
		'qst_status'=>'Pending',
		'qst_img'=>$qst_img,
		);
		
		$Q=$this->question_model->savenewqst($dataQuestArray);
		
		$arrayQ=$this->input->post('option');
		$arrayTF=$this->input->post('opt_truefalse');
		$jumlahdata=count($arrayQ);
		
		for($i=0;$i<$jumlahdata;$i++)
		{
			$dataQuestArray=array(
			'opt_id'=>'',
			'qst_id'=>$Q,
			'opt_choices'=>$arrayQ[$i],
			'opt_truefalse'=>$arrayTF[$i],
			);
			
			$this->option_model->saveoption($dataQuestArray);
		}
		
		
	}
	
	function get_question_confirm_status($userid)
		{
			$data['dataQuest']=$this->question_model->getDataQuestionStatus($userid);
			$data['recCategoryNav']=$this->category_model->getcategorynav();
			$data['content_page']='user/question_status_usr';
			$data['page']='user/home_usr';
			$this->load->view('layout',$data);
		}
}
