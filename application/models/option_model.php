<?php
class Option_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}	
	
	function getOptQuestionID($qst_id)
	{
		$this->db->where('qst_id',$qst_id);
		return $this->db->get("tbloption");
	}
	
	function getOptID($opt_id)
	{
		$this->db->where('opt_id',$opt_id);
		return $this->db->get("tbloption");
	}	
		
	function saveoption($dataOption)
	{
		$this->db->insert('tbloption',$dataOption);
	}
		
	function saveupdateopt($arrayUpdateOpt,$opt_id)
	{
		$this->db->where('opt_id',$opt_id);
		$this->db->update('tbloption',$arrayUpdateOpt);
	}	
	
	function delOptionbyID($questionID)
	{
		$this->db->where('qst_id',$questionID);
		$this->db->delete('tbloption');
	}
	
	
}