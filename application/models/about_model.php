<?php
class About_model extends CI_Model
{
	public $rawabout;
	function __construct()
	{
		parent::__construct();
		$this->rawabout="tblabout";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/	
	function getabout()
	{
		return $this->db->get('tblabout');
	}
}