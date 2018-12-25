<?php 

/**
 * 
 */
class Konfirmasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Konfirmasi_m");
	}
	public function konfirmasi()
	{
		$data = array(); 
		 // Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->GambarModel->upload();
			 
				$id = $this->GambarModel->save($upload);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				redirect(base_url()); // Redirect kembali ke halaman awal / halaman view data
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		
	}
}

?>