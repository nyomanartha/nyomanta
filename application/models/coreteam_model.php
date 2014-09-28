<?php
class Coreteam_model extends CI_Model
{
	public $rawct;
	function __construct()
	{
		parent::__construct();
		$this->rawct="tblcoreteam";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcoreteam()
	{
		return $this->db->get('tblcoreteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcoreteamlimit($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		return $this->db->get('tblcoreteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/			
	function getcoreteamnum_rows()
	{
		$query=$this->db->get('tblcoreteam');
		return $query->num_rows();
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function savenewcoreteam($arrayCoreTeam)
	{
		$this->db->insert('tblcoreteam',$arrayCoreTeam);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcoreteam_ctid($ct_id)
	{
		$this->db->where('ct_id',$ct_id);
		return $this->db->get('tblcoreteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function saveupdatecoreteam($arrayUpdateCoreTeam,$ct_id)
	{
		$this->db->where('ct_id',$ct_id);
		$this->db->update('tblcoreteam',$arrayUpdateCoreTeam);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function deletecoreteam($ct_id)
	{
		$this->db->where('ct_id',$ct_id);
		$this->db->delete('tblcoreteam');
	}
}