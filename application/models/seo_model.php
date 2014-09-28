<?php
class Seo_model extends CI_Model
{
	public $seo;
	function __construct()
	{
		parent::__construct();
		$this->seo="tblseoabout";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getseoabout()
	{
		return $this->db->get('tblseoabout');
	}
}