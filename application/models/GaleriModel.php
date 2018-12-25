<?php defined('BASEPATH') OR exit('No direct script');

/**
 * 
 */
class GaleriModel extends CI_Model
{
	public function internasional()
	{
		return $this->db->query("select * from gambar where tag='internasional'")->result();
	}
	public function indonesia()
	{
		return $this->db->query("select * from gambar where tag='indonesia'")->result();
	}
}