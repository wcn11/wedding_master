<?php defined("BASEPATH") Or exit();

/**
 * 
 */
class Order extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Order_m');
	}

	function bayar_order()
	{
		$invoice = uniqid();
		$data_order = array(
			'invoice' => $invoice,
			'id_paket' => $this->input->post('id_paket'),
			'id_user' => $this->session->userdata('id'),
			'nama_paket' => $this->input->post('nama_paket'),
			'class' => $this->input->post('class'),
			'tag' => $this->input->post('tag'),
			'harga' => $this->input->post('harga'),
			'tanggal' => $this->input->post('tanggal'),
			'catatan' => $this->input->post('catatan'),
			'status' => "Belum dibayar"
		);
		$this->Order_m->tambah_order($data_order);

		$data_session = array(
			"status_booking" => "success",
			'invoice' => $invoice
		);
		$this->session->set_userdata($data_session);



		redirect(base_url());
	}

	
}