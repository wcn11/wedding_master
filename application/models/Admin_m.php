			<?php defined("BASEPATH") Or exit("keluar");

class Admin_m extends CI_Model 
{
 
	public function proses_login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$data = array(
			'username' => $username,
			'password' => $password
		); 
		return $this->db->get_where('admin', $data)->num_rows();
	}

	public function tambah_paket_reguler()
	{
		$nama_paket = $this->input->post("nama_paket");
		$class = $this->input->post("class");
		$harga = $this->input->post("harga");
		$deskripsi = $this->input->post("deskripsi");
		$tag = $this->input->post("tag");
		$data = array(
			'id' => uniqid(),
			'nama_paket' => $nama_paket,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'class' => $class,
			'tag' => $tag
		);

		$this->db->insert('paket_reguler', $data);
	}

	public function view_reguler()
	{
		return $this->db->get('paket_reguler')->result();
	}

	public function edit_reguler()
	{
		$id = $this->uri->segment(3);

		$nama_paket = $this->input->post("nama_paket");
		$class = $this->input->post("class");
		$harga = $this->input->post("harga");
		$deskripsi = $this->input->post("deskripsi");
		$tag = $this->input->post("tag");

		$data = array(
			'nama_paket' => $nama_paket,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'class' => $class,
			'tag' => $tag
		);

		$this->db->where(array('id' => $id));
		$this->db->update('paket_reguler', $data);
	}

	public function hapus_reguler()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('paket_reguler', array('id' => $id));
	
	}

	public function getGaleri()
	{
		return $this->db->get('galeri')->result();
	}

	public function upload_thumbnail($id){
		$config['upload_path'] = './assets/gambar/galeri/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '4048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('thumbnail')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :

			$upload_data = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '', 'id_galeri' => $id);
			return $upload_data;

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/gambar/galeri/'.$upload_data['file']['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 70;
			$config['height'] = 50;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			// $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '', 'id_galeri' => $id);
			// return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function save_galeri($upload)
	{
		$data = array(
			'id_galeri' => uniqid(),
			'thumbnail' => $upload['file']['file_name']
		);
		$this->db->insert('galeri', $data);
	}

	public function daftar_user()
	{
		return $this->db->get('user')->result();
	}

	public function hapus_user()
	{
		$this->db->where(array('id' => $this->uri->segment(3)));
		$this->db->delete('user');
	}

	public function order_masuk()
	{
		return $this->db->get('bukti_pembayaran')->result();
	}

	public function konfirmasi_berhasil()
	{
		$this->db->where(array('invoice' => $this->uri->segment(3)));
		$this->db->update('bukti_pembayaran', array('status' => "Terkonfirmasi"));
		$this->db->update('order_paket', array('status' => "Terkonfirmasi"));
	}

	public function konfirmasi_salah()
	{
		$this->db->where(array('invoice' => $this->uri->segment(3)));
		$this->db->update('bukti_pembayaran', array('status' => "Salah"));
		$this->db->update('order_paket', array('status' => "Salah"));
	}
	public function batal_order()
	{
		$invoice = $this->uri->segment(3);
		$this->db->where(array('invoice' => $this->uri->segment(3)));
		$this->db->delete("order_paket");
		$this->db->query("delete from bukti_pembayaran where invoice='".$id."'");
	}
	public function hapus_galeri()
	{
		$id = $this->uri->segment(3);
		$this->db->where(array('id_galeri' =>$id));
		$this->db->delete('galeri');
	}
}