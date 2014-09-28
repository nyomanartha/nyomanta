<?php
class Question_model extends CI_Model
{
	public $rawquestion;
	function __construct()
	{
		parent::__construct();
		$this->rawquestion="tblquestion";
	}
	
	function getquestion()
	{
		return $this->db->get('tblquestion');
	}
		
	function getquestionjoin()
	{
		$this->db->select("*");
		$this->db->from('tblquestion');
		$this->db->join('tblcategory',"tblquestion.cat_id=tblcategory.cat_id", "inner");
		$this->db->join('tbluser','tblquestion.qst_iduser=tbluser.usr_id');
		
		return $this->db->get();
	}
		
	function getQuestionID($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->get($this->rawquestion);
	}
		
	function getQuestionIDLimit($cat_id,$limit)
	{
		$this->db->where('cat_id',$cat_id);
		$this->db->limit($limit);
		return $this->db->get($this->rawquestion);
	}
	
	
	function getUkdiExam()
	{
		$this->db->where('qst_id',0);
		$this->db->order_by('qst_id','random');
		return $this->db->get($this->rawquestion);
	}
	
	function get_all_exam_limit($limit)
	{
		$this->db->where('qst_showexam','Show');
		$this->db->order_by('qst_id','random');
		$this->db->limit($limit);
		return $this->db->get($this->rawquestion);
	}
	
	function getquestionlimit($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		return $this->db->get('tblquestion');
	}
		
	function getquestionnum_rows()
	{
		$query=$this->db->get('tblquestion');
		return $query->num_rows();
	}	
	
	function savenewqst($arrayQst)
	{
		$this->db->insert('tblquestion',$arrayQst);
		return $this->db->insert_id();
	}
	
	function getqst_qstid($qst_id)
	{
		$this->db->where('qst_id',$qst_id);
		return $this->db->get('tblquestion');
	}
	
	function saveupdateqst($arrayUpdateQst,$qst_id)
	{
		$this->db->where('qst_id',$qst_id);
		$this->db->update('tblquestion',$arrayUpdateQst);
	}
		
	function deleteqst($qst_id)
	{
		$this->db->where('qst_id',$qst_id);
		$this->db->delete('tblquestion');
	}
		
	
	function getDataQuestionStatus($idUser)
	{
		$this->db->select('*');
		$this->db->from('tbluser');
		$this->db->join('tbluserlevel','tbluser.usr_id=tbluserlevel.iduser','inner');
		$this->db->join('tbllevel','tbluserlevel.idlevel=tbllevel.idLevel','inner');
		$this->db->join('tblquestion','tbllevel.cat_id=tblquestion.cat_id','inner');
		$this->db->join('tblcategory','tblquestion.cat_id=tblcategory.cat_id','inner');
		$this->db->where('tbluser.usr_id',$idUser);
		$this->db->where('tblquestion.qst_status','Pending');
		return $this->db->get();

	}
	function getUserbyidCreator($idUser)
	{
		$this->db->where('usr_id',$idUser);
		return $this->db->get('tbluser');
	}
}