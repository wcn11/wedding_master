<?php defined('BASEPATH') OR exit('No direct script');

/**
 * 
 */
class Konten extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GaleriModel');
		$this->load->model('KontenModel');
		$this->load->library("cart");
		$this->load->model('Admin_m');
	}

	public function paket()
	{
		$data['reguler'] = $this->Admin_m->view_reguler(); 
		$this->load->view('partial/paket', $data);
	}
	public function galeri()
	{
		$this->load->view('partial/galeri');
	}



}