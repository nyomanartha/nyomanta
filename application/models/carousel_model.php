<?php
class Carousel_model extends CI_Model
{
	public $rawcarousel;
	function __construct()
	{
		parent:: __construct();
		
		$this->rawcarousel="tblcarousel";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcarousel()
	{
		return $this->db->get($this->rawcarousel);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcarousellimit($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		return $this->db->get('tblcarousel');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/			
	function getcarouselnum_rows()
	{
		$query=$this->db->get('tblcarousel');
		return $query->num_rows();
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function savenewcrs($arrayCrs)
	{
		$this->db->insert('tblcarousel',$arrayCrs);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcrs_crsid($crs_id)
	{
		$this->db->where('crs_id',$crs_id);
		return $this->db->get('tblcarousel');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function saveupdatecrs($arrayUpdateCrs,$crs_id)
	{
		$this->db->where('crs_id',$crs_id);
		$this->db->update('tblcarousel',$arrayUpdateCrs);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function deletecrs($crs_id)
	{
		$this->db->where('crs_id',$crs_id);
		$this->db->delete('tblcarousel');
	}
}