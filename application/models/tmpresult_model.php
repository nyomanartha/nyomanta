<?php
class Tmpresult_model extends CI_Model
{
	 
	public function __construct()
	{
		parent::__construct();
		
	}
		
	function getAllTmpResult()
	{
		$this->db->select('*');
		$this->db->from('tbltmpresult');
		$this->db->join('tblquestion','tbltmpresult.qst_id=tblquestion.qst_id');
		return $this->db->get();
	}
		
	function getAllTmpResultByStatus($status)
	{
		$this->db->select('*');
		$this->db->from('tbltmpresult');
		$this->db->join('tblquestion','tbltmpresult.qst_id=tblquestion.qst_id');
		$this->db->where('tbltmpresult.statusresult',$status);
		return $this->db->get();
	}
	
	function savedataresult($dataResult)
	{
		$this->db->insert('tbltmpresult',$dataResult);
	}
}