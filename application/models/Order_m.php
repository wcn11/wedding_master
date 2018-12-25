<?php defined("BASEPATH") Or exit();

/**
 * 
 */
class Order_m extends CI_Model
{
	function tambah_order($data)
	{
		$this->db->insert('order_paket', $data);
	}
}