<?php
class Exam_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('option_model');
		$this->load->model('tmpresult_model');
		$this->load->model('category_model');
	}

	function index()
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['page']='content/exam'; 
		$this->load->view('layout',$data);
	}

	function exam_by_category($cat_id)
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['cat_id']=$cat_id;
		$data['page']='content/front_exam_category'; 
		$this->load->view('layout',$data);
	}

	function exam_by_category_limit($catid,$jumlahsoal)
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['recQuestion']=$this->question_model->getQuestionIDLimit($catid,$jumlahsoal);
		$data['cat_id']=$catid;
		$data['page']='content/exam_category'; 
		$this->load->view('layout',$data);
	}
	
	function all_exam()
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['page']='content/front_exam_all'; 
		$this->load->view('layout',$data);
	}
		
	function all_exam_limit($limit)
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['recQuestion']=$this->question_model->get_all_exam_limit($limit);
		$data['page']='content/exam_all'; 
		$this->load->view('layout',$data);
	}

	function exam_process()
	{
		$dataOption=$this->input->post('optionsRadios');
		foreach($dataOption as $idQuest => $idOption)
		{	
			$idconvert=intval($idOption);
			$nilaiOption=$this->option_model->getOptID($idconvert);
			
			if($nilaiOption->num_rows()>0)
			{
				$recOption=$nilaiOption->row();
				$status=$recOption->opt_truefalse;
			}
				
			else
			{
				$status="False";
			}
						
			$arraytmp=array(
			"idresult" => "",
			"qst_id" => $idQuest,
			"opt_idku" => $idconvert,
			"statusresult" => $status,
			);
			
			$this->tmpresult_model->savedataresult($arraytmp);
			
		}
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['recQuestion']=$this->tmpresult_model->getAllTmpResult();
		
		$data['jumlah_soal']=$data['recQuestion']->num_rows();
		$data['jumlah_benar']=$this->tmpresult_model->getAllTmpResultByStatus('True')->num_rows();
		$data['jumlah_salah']=$this->tmpresult_model->getAllTmpResultByStatus('False')->num_rows();
		$data['page']='content/exam_result'; 
		$this->load->view('layout',$data);
		
	}
	
}
