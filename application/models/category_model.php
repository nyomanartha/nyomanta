<?php
class Category_model extends CI_Model
{
	public $rawcategory;
	function __construct()
	{
		parent:: __construct();
		
		//membrikan nilai pada attribut nama tabel berupa tblcatspecial
		$this->rawcategory="tblcategory";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcategory()
	{
		$this->db->select("*");
		$this->db->from("tblcategory");
		$this->db->join("tblquestion","tblcategory.cat_id=tblquestion.cat_id","inner");
		$this->db->order_by("tblquestion.cat_id","asc");
		return $this->db->get();
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcategorynav()
	{
		return $this->db->get('tblcategory');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcatlimit($limit,$offset)
	{
		$eq=$limit*($offset-1);
		if ($eq<=0) {
			$eq=0;
		}
		$this->db->limit($limit,$eq);
		return $this->db->get('tblcategory');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/			
	function getcatnum_rows()
	{
		$query=$this->db->get('tblcategory');
		return $query->num_rows();
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function savenewcat($arrayCat)
	{
		$this->db->insert('tblcategory',$arrayCat);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getcat_catid($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->get('tblcategory');
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function saveupdatecat($arrayUpdateCat,$cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		$this->db->update('tblcategory',$arrayUpdateCat);
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function deletecat($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		$this->db->delete('tblcategory');
	}
}