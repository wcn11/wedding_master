<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('GambarModel');
	}
	
	public function index()
	{
		$data['gambar'] = $this->GambarModel->view();
		$this->load->view('gambar/view', $data);
	}
	
	public function tambah()
	{ 
		$data = array(); 
		 // Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			mkdir("assets/gambar/".$id, 0755, TRUE);
			$upload = $this->GambarModel->upload();
			 
				$id = $this->GambarModel->save($upload);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				mkdir('./assets/gambar/'.$id, 0755, TRUE);
				chmod('./assets/gambar/'.$id,0777);
				redirect('admin'); // Redirect kembali ke halaman awal / halaman view data
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		
	}

	public function view_tambah_gambar()
	{
		$this->load->view('gambar/tambah_gambar');
	}
 
	public function hasil_gambar()
	{
		$id = $this->uri->segment(3);
		$data['data'] = $this->GambarModel->view_gambar($id, 'gambar_konten');
		$this->load->view('gambar/hasil_gambar', $data);
	}

	public function tambah_gambar()
	{
		$data = array();
		if($this->input->post('submit')) {	

			$id = $this->input->post('id');

			$upload = $this->GambarModel->upload_gambar($id);

			if($upload['result'] == 'success') {

				$this->GambarModel->save_gambar($upload);

				redirect('gambar/hasil_gambar/'.$id);

			}else{
				$data['message'] = $upload['error'];
				$this->load->view('gambar/hasil_gambar', $data);
			}
		}
	}

	public function tes()
	{
	 $id = $this->input->post('id');
	  $config['upload_path'] = './assets/gambar/'.$id.'/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']  = '3000';
      $config['max_width']  = '5000';
      $config['max_height']  = '3000';
 
      $this->load->library('upload', $config);
 
      // modifikasi disini
      // looping $_FILES dan buat array baru
      foreach($_FILES['gambar'] as $key=>$val)
      {
         $i = 1;
         foreach($val as $v)
         {
            $field_name = "file_".$i;
            $_FILES[$field_name][$key] = $v;
            $i++;
         }
      }
      // hapus array awal, karena kita sudah memiliki array baru
      unset($_FILES['gambar']);
 
      // variabel error diubah, dari string menjadi array
      $error = array();
      $success = array();
      foreach($_FILES as $field_name => $file)
      {
         if ( ! $this->upload->do_upload($field_name))
         {
            $error[] = $this->upload->display_errors();
         }
         else
         {
            $success[] = $this->upload->data();
            $data = array(
            	'id' => $id,
            	'nama_file' => $this->upload->data('file_name')
            );
            $this->db->insert('gambar_konten', $data);
            redirect('admin');
         }
      }
	}

	public function hapus()
	{

		$id =$this->uri->segment(3);
		$dir = "assets/gambar/".$id;
		$nama_file = $this->GambarModel->view_gambar($id, 'gambar_konten');
		$this->GambarModel->hapus($id);
  		if (is_dir($dir)) {
    		$objects = scandir($dir);
    		foreach ($objects as $object) {
      			if ($object != "." && $object != "..") {
        			if (filetype($dir."/".$object) == "dir"){
           				rrmdir($dir."/".$object);
    					redirect('gambar');
           			}else{
           				unlink ($dir."/".$object);
           			}
      			}
    		}
    		$this->load->helper('text');
           	unlink(APPPATH, './assets/gambar/'.$nama_file);
			$this->db->query("delete from gambar where id='$id'");
    		reset($objects);
    		rmdir($dir);
    		redirect('gambar');
  		}
	}
}
