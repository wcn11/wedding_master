<?php defined('BASEPATH') OR exit('No direct script');

/** 
 *  
 */
class Bayar_m extends CI_Model
{	
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
	}

	function paket($nama_paket)
	{
		return $this->db->get_where();
	}

	  public function upload(){  
	  	$config['upload_path'] = './assets/gambar/user/'.$this->session->userdata('id').'/';    
	  	$config['allowed_types'] = 'jpg|png|jpeg';    
	  	$config['max_size']  = '4048';    
	  	$config['remove_space'] = TRUE;
	  	$config['file_name'] = 'bukti_pembayaran'; 
	  	$this->load->library('upload', $config); // Load konfigurasi uploadnya 

	  	if($this->upload->do_upload('bukti')){ // Lakukan upload dan Cek jika proses upload berhasil      
	  	// Jika berhasil :      
	  		$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      

	  			return $return;   

	  		}else{      // Jika gagal :      

	  			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());  

	  		return $return;    
	  		}  
	  	}   

 
	 // Fungsi untuk menyimpan data ke database  
	public function save($upload){    
		$data = array(           
			'invoice' => $this->input->post('invoice'),
			'id_user' => $this->session->userdata('id'),
		  	'nama_file' => $upload['file']['file_name'],
		  	'tanggal_upload' => date("Y-m-d"),
		  	'status' => "belum di konfirmasi"
		);        
	
		$this->db->insert('bukti_pembayaran', $data);  
		$this->db->query("update order_paket set status='menunggu konfirmasi' where id_user='".$this->session->userdata('id')."'");

		

	}

	function ambil_data()
	{
		$invoice = $this->uri->segment(3);
		return $this->db->get_where('pembayaran', array('invoice' =>$invoice))->result();
	}


}