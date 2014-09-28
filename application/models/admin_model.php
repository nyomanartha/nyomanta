<?php
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->rawquestion="tbladmin";
	}
/*
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
*/		
	function getAdminByEmailPass($email,$password)
	{
		$this->db->where('emailadm',$email);
		$this->db->where('password',md5($password));
		
		return $this->db->get('tbladmin');
	}
}