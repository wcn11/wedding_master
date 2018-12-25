<?php defined('BASEPATH') OR exit('No direct script');

/**
 * 
 */
class KontenModel extends CI_Model
{
	public function view()
	{
		$this->db->select('*');
		$this->db->where('tag', 'jawa');
		return $this->db->get('gambar')->result();
	}
	public function isi_konten($id)
	{
		return $this->db->query("select * from gambar where id='$id'")->result();
	}
	public function paket($id)
	{
		return $this->db->query("select nama_file from gambar_konten where id='$id'")->row();
	}

	public function favorit($data)
	{
		$this->db->insert('favort', $data);
	}
}