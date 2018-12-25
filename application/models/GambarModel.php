<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GambarModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		return $this->db->get('gambar')->result();
	}
	
	public function view_by_id($id){
		return $this->db->get_where('gambar', array('id' => $id))->result();
	}
	
	public function view_by_id_reguler($id){
		return $this->db->get_where('paket_reguler', array('id' => $id))->result();
	}

	// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './assets/gambar/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '4048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function upload_gambar($id)
	{
		$config['upload_path'] = './assets/gambar/'.$id.'/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '4048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$id = uniqid();
		$data = array(
			'id' => $id,
			'nama_paket'=>$this->input->post('nama_paket'),
			'deskripsi'=>$this->input->post('input_deskripsi'),
			'harga' => $this->input->post('input_harga'),
			'nama_file' => $upload['file']['file_name'],
			'ukuran_file' => $upload['file']['file_size'],
			'tipe_file' => $upload['file']['file_type'],
			'tag' => $this->input->post('input_tag')
		);
		
		$this->db->insert('gambar', $data);
		return $id;
	}

	
	

	public function save_gambar($upload)
	{
		$data = array(
			'id' => $this->input->post('id'),
			'nama_file' => $this->upload->data('file_name')
		);
		
		$this->db->insert('gambar_konten', $data);
	}

	public function view_gambar($id, $table)
	{
		$this->db->get_where($table, array('id' => $id));
		return $this->db->query("select * from gambar_konten where id='$id'")->result();
	}

	public function hapus($id)
	{

		$this->db->where(array('id' => $id));
		$this->db->delete('gambar');

	}

}
