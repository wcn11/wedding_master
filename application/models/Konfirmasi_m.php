<?php 

/**
 * 
 */
class Konfirmasi_m extends CI_Model
{
	// Fungsi untuk melakukan proses upload file
	public function upload(){
		chmod('./assets/gambar/'.$this->session->userdata("id"));
		$config['upload_path'] = './assets/gambar/'.$this->session->userdata("id");
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '4048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('bukti')){ // Lakukan upload dan Cek jika proses upload berhasil
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

		$id_user = $this->session->userdata('id');
		$invoice = $this->input->post('invoice');
		$bukti = $this->input->post('bukti');

		$data = array(
			'id_user' => $id_user,
			'invoice' => $invoice,
			'bukti' => $upload['file']['file_name']
		);
		
		$this->db->insert('pembayaran', $data);
	}
	


}

?>