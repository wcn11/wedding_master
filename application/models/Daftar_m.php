<?php defined('BASEPATH') OR exit('No direct script');

/** 
 * 
 */
class Daftar_m extends CI_Model
{
	// function cek_duplikat($email){
 //  		$this->db->select('email');
 //  		$this->db->from('user');
 //  		$this->db->like('email', $email);
 //  }
  	function insert_user($table, $insert_data){
  		$this->db->insert($table, $insert_data);
  	}
  	function save($table, $data){
  		$this->db->insert($table, $data);
  	}
    function getId($username)
    {
      return $this->db->query("select * from user where email='$username'")->result();

    }
}