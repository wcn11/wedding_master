<?php defined("BASEPATH") OR exit("j");

/**
 *  
 */
class Admin extends CI_Controller
{
	function __construct(){ 
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('GambarModel');
		$this->load->library("session");
		// if ($this->session->userdata("status_admin") != "login") {
		// 	redirect(base_url('Admin'));
		// }
	}

	public function index()
	{
		$this->load->view("admin/login");
	}

	public function proses_login()
	{
		$username = $this->input->post("username");
		$cek_login = $this->Admin_m->proses_login();
		if ($cek_login > 0)
		{
			$data_session = array(
				'username_admin' => $username,
				'status_admin' => 'login'
			);

			$this->session->set_userdata($data_session);
			redirect('admin/dashboard');
		}else{
			echo "salah";
		}
	}

	public function dashboard()
	{ 
		$data_paket['reguler'] = $this->Admin_m->view_reguler();
		$this->load->view('admin/dashboard');
	}
	public function paket_reguler()
	{
		$data['reguler'] = $this->Admin_m->view_reguler();
		$this->load->view('admin/paket_reguler', $data);
	}
	public function tambah_paket_reguler()
	{
			$this->Admin_m->tambah_paket_reguler();
			redirect(base_url('admin/dashboard'));
	}
	public function edit_paket_reguler()
	{
		$this->Admin_m->edit_reguler(); 
		redirect(base_url('admin/dashboard'));
	}
	public function hapus_paket_reguler()
	{
		$this->Admin_m->hapus_reguler();
		redirect(base_url('admin/dashboard'));
	}

	public function paket_arsip()
	{
		$data['galeri'] = $this->Admin_m->getGaleri();
		$this->load->view('admin/paket_arsip', $data);
	}

	public function tambah_galeri()
	{
		$upload = $this->Admin_m->upload_thumbnail($id);

		if ($upload['result'] == 'success') {
			$this->Admin_m->save_galeri($upload);
			chmod("assets/gambar/".$upload['file']['file_name'], 0777);
			redirect(base_url('admin/dashboard'));
		}else{
			echo $upload['error'];
		}

	}

	public function hapus_galeri()
	{
		$this->Admin_m->hapus_galeri();
		redirect(base_url('Admin/dashboard'));
	}

	public function daftar_user()
	{
		$data['user'] = $this->Admin_m->daftar_user();
		$this->load->view('admin/daftar_user', $data);
	}
	public function hapus_user()
	{
		$this->Admin_m->hapus_user();
		redirect(base_url('admin/dashboard'));
	}

	public function order_masuk()
	{
		$data['order'] = $this->Admin_m->order_masuk();
		$this->load->view('admin/order_masuk', $data);
	}	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function konfirmasi_berhasil()
	{
		$this->Admin_m->konfirmasi_berhasil();
		redirect(base_url('Admin/dashboard'));
	}
	public function konfirmasi_salah()
	{
		$this->Admin_m->konfirmasi_salah();
		redirect(base_url('Admin/dashboard'));
	}
	public function batal_order()
	{
		$this->Admin_m->batal_order();
		redirect(base_url('Admin/dashboard'));
	}

	function add_galeri()
	{
		$config['upload_path'] = './assets/gambar/galeri/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '500';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			echo $this->upload->display_errors();
		}else{
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/gambar/galeri/'.$_FILES['thumbnail']['name'];
			$config['maintain_ratio'] = FALSE;
			$config['width'] = '320';
			$config['height'] = '288';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();


			$conf['image_library'] = 'gd2';
			$conf['source_image'] = './assets/gambar/galeri/'.$_FILES['thumbnail']['name'];
			$conf['new_image'] = './assets/gambar/galeri/thumbnail/'.$_FILES['thumbnail']['name'];
			$conf['create_thumb'] = TRUE;
			$conf['maintain_ratio'] = FALSE;
			$conf['width'] = '120';
			$conf['height'] = '108';

			$this->load->library('image_lib', $conf);
			$this->image_lib->initialize($conf);
			$this->image_lib->resize();
		}
	}
}