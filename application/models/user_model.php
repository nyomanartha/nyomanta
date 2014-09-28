<?php
class User_model extends CI_Model
{
	public $rawuser;
	function __construct()
	{
		parent::__construct();
		$this->rawuser="tbluser";
	}
	
	function getuser()
	{
		return $this->db->get('tbluser');
	}
	
	function getuserlimit($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		return $this->db->get('tbluser');
	}
			
	function getusernum_rows()
	{
		$query=$this->db->get('tbluser');
		return $query->num_rows();
	}
		
	function savenewuser($arrayUser)
	{
		$this->db->insert('tbluser',$arrayUser);
	}
	
	function getuser_usrid($usr_id)
	{
		$this->db->where('usr_id',$usr_id);
		return $this->db->get('tbluser');
	}
		
	function saveupdateuser($arrayUpdateUser,$usr_id)
	{
		$this->db->where('usr_id',$usr_id);
		$this->db->update('tbluser',$arrayUpdateUser);
	}
	
	function deleteuser($usr_id)
	{
		$this->db->where('usr_id',$usr_id);
		$this->db->delete('tbluser');
	}
	
	function getUserByUsernamePass($email,$password)
	{
		$this->db->where('usr_email',$email);
		$this->db->where('usr_password',md5($password));
		
		return $this->db->get('tbluser');
	}
}