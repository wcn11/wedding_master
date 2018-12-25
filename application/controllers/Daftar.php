<?php defined('BASEPATH') OR exit('No direct script');

/**
 * 
 */
class Daftar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation', 'session');
		$this->load->model('Daftar_m');
		$this->load->model('Login_m');
	}

	function index()
	{
		$this->load->view('daftar');
	}

	function aksi_daftar()
	{
		$id = uniqid();
		$email =  $this->security->xss_clean($this->input->post('email'));
		$username =  $this->security->xss_clean($this->input->post('username'));
		$password =  $this->security->xss_clean($this->input->post('password'));

		$data = array(
			'id' => $id,
			'email' => $email,
			'username' => $username, 
			'password' => md5($password)
		); 

		$this->Daftar_m->save('user', $data);

		$data_session = array(
			'id' => $id,
			'status' => 'login',
			'username' => $username,
			'pesan_daftar' => "daftar"
		);

		$this->session->set_userdata($data_session);

    	mkdir('./assets/gambar/user/'.$id, 0755, TRUE);
    	chmod('./assets/gambar/user/'.$id,0777);
    			
		redirect(base_url());
	}

}