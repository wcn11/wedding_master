<?php defined('BASEPATH') OR exit('dfaf');

/**
 * 
 */
class Login_m extends CI_Model
{
	function cek_login($table, $insertData)
	{
		return $this->db->get_where($table, $insertData);
	}

	function getUsername($email)
	{
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where(array('email' => $email));
		return $this->db->get()->result();
	}

    function getId($username)
    {
      return $this->db->query("select * from user where email='$username'")->result();
    }
}