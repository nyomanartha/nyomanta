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
		$this->tmpresult_model->clearTable();
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['page']='content/front_exam_all'; 
		$this->load->view('layout',$data);
	}
	
	function save_exam_tmp_limit($limit)
	{
		$recQuestion=$this->question_model->get_all_exam_limit($limit);
		foreach($recQuestion->result() as $tmpexam)
		{
			$arrtmp=array(
			'idresult'=>'',
			'qst_id'=>$tmpexam->qst_id,
			'opt_idku'=>0,
			'statusresult'=>"False"
			);
			
			$this->tmpresult_model->savedataresult($arrtmp);
		}
		redirect('exam_controller/all_exam_tmp');
	}
	
	function all_exam_tmp()
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		
		$limit=5;
		$config['base_url']=site_url().'/exam_controller/all_exam_tmp';
		$config['total_rows']=$this->question_model->total_exam_tmp();
		$config['per_page']=$limit;
		
		$this->pagination->initialize($config);
		$data['recQuestion']=$this->question_model->get_all_exam_tmp($limit,$this->uri->segment(3));
		
		$data['link']=$this->pagination->create_links();
		$data['page']='content/exam_all'; 
		$this->load->view('layout',$data);
	}

	function exam_process()
	{
		$dataOption=$this->input->post('optionsRadios');
		$idresult=$this->input->post('idresult');
		$pageposition=$this->input->post('pageposition');
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
			"opt_idku" => $idconvert,
			"statusresult" => $status,
			);
			
			$this->tmpresult_model->updatedataresult($arraytmp,$idresult[$idQuest]);
			
		}
		redirect('exam_controller/all_exam_tmp/'.$pageposition);
		
	}
	
	function finalresult()
	{
		$data['recCategoryNav']=$this->category_model->getcategorynav();
		$data['recQuestion']=$this->tmpresult_model->getAllTmpResult();
		
		$data['jumlah_soal']=$data['recQuestion']->num_rows();
		$data['jumlah_benar']=$this->tmpresult_model->getAllTmpResultByStatus('True')->num_rows();
		$data['jumlah_salah']=$this->tmpresult_model->getAllTmpResultByStatus('False')->num_rows();
		$data['page']='content/exam_result'; 
		$this->load->view('layout',$data);
	}
	
}
