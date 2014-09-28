<?php
class Modteam_model extends CI_Model
{
	public $rawmodteam;
	function __construct()
	{
		parent::__construct();
		$this->rawmodteam="tblmodteam";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getmodteam()
	{
		return $this->db->get('tblmodteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getmodteamlimit($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		return $this->db->get('tblmodteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/			
	function getmodteamnum_rows()
	{
		$query=$this->db->get('tblmodteam');
		return $query->num_rows();
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function savenewmodteam($arrayModTeam)
	{
		$this->db->insert('tblmodteam',$arrayModTeam);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getmodteam_modtid($modt_id)
	{
		$this->db->where('modt_id',$modt_id);
		return $this->db->get('tblmodteam');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function saveupdatemodteam($arrayUpdateModTeam,$modt_id)
	{
		$this->db->where('modt_id',$modt_id);
		$this->db->update('tblmodteam',$arrayUpdateModTeam);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function deletemodteam($modt_id)
	{
		$this->db->where('modt_id',$modt_id);
		$this->db->delete('tblmodteam');
	}
}