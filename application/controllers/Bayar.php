<?php defined("BASEPATH") OR exit("j");

/**
 *  
 */
class Bayar extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('GambarModel');
		$this->load->model('Bayar_m');
		$this->load->helper(array('form', 'url'));
	}
	function bayar_paket(){
		$id = $this->uri->segment(3);
		$data['detail'] = $this->GambarModel->view_by_id_reguler($id);
		$data['invoice'] = uniqid();
		$this->load->view('pembayaran/form_bayar', $data);
	}
	function bayar_paket_arsip(){
		$id = $this->uri->segment(3); 
		$data['detail'] = $this->GambarModel->view_by_id($id);
		$data['invoice'] = uniqid();
		$this->load->view('pembayaran/form_bayar', $data); 
	}
	public function aksi_bayar()
	{
		$upload = $this->Bayar_m->upload();

		if($upload['result'] == "success"){

			$this->Bayar_m->save($upload); 

			chmod('./assets/gambar/user/'.$this->session->userdata('id').'/'.$upload['file']['file_name'], 0777);

			redirect(base_url());
		}else{

			echo  $upload['error'];
			
		}
	}

	public function pemberitahuan()
	{
		$data = array();
		if ($this->input->post('submit')) {
			$upload = $this->Bayar_m->upload();
		}
	}
	public function konfirmasi()
	{
		$this->load->view('pembayaran/konfirmasi_pembayaran');
	}
	public function aksi_konfirmasi()
	{
		$this->Bayar_m->save();
		redirect(base_url());
	}
}