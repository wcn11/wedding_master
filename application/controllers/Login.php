<?php defined("BASEPATH") Or exit("mueehehe");
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('Login_m');
	}
 
	function index(){
		$this->load->view('login');
	} 
 
	function aksi_login(){
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));

			$insertData = array(
				'email' => $email,
				'password' => md5($password)
			);
			$cek = $this->Login_m->cek_login('user',$insertData)->num_rows();
				if($cek > 0)
				{ 
					$username = $this->Login_m->getUsername($email);
					$id = $this->Login_m->getId($email);
					foreach($id as $id)
					{
						$id_hasil = $id->id;
					}
					foreach ($username as $username) {
						$user1 = $username->username;
 					}

 					$data_session = array(
 						'id' => $id_hasil,
 						'username' => $user1,
 						'status' => 'login',
 						'pesan_login' => "login"
 					);

					$this->session->set_userdata($data_session);


					mkdir("assets/gambar/".$id_hasil, 0755, TRUE);

					redirect(base_url());
				}else{
					$data['pesan_gagal_login'] = "Gagal login, silahkan cek kembali";
					//$this->load->view('index', $data);
					$this->load->view('index', $data);
					redirect(base_url());
				}
		}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}