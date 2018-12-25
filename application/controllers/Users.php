<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        //$this->load->model('Users_model', 'user');
        $this->load->model('User');
        if($this->session->userdata('status') != 'login')
        {
          redirect(base_url());
        }
    } 

    public function pengaturan() 
    {
      $id = $this->session->userdata('id');
      $data['data'] = $this->User->getProfile($id); 
      $data['data2'] = $this->User->getProfile($id); 
      $data['tagihan'] = $this->User->getTagihan();

      $this->load->view('users/pengaturan', $data);
    }

    public function edit_profile()
    {
      $id = $this->uri->segment(3);
      $this->load->view('users/edit-profile');
    }

    public function aksi_edit()
    {
      $id = $this->uri->segment(3);
      $validation = $this->form_validation;

      $user = $validation->set_rules('username', 'Username', 'required|trim');
      $email = $validation->set_rules('email', 'Email', 'valid_email|required');
      $password = $validation->set_rules('password', 'Password', 'required|alpha_numeric');
      if(!$validation->run())
      {
        $data_session_edit = array(
          'username' => 'Username harus diisi',
          'email' => 'email harus diisi',
          'password' => 'password harus disi huruf dan angka!'
        );
        redirect(base_url().'users/pengaturan/'.$id);
      } 

      $nama =  $this->security->xss_clean($this->input->post('nama_lengkap'));
      $email =  $this->security->xss_clean($this->input->post('email'));
      $username =  $this->security->xss_clean($this->input->post('username'));
      $password =  $this->security->xss_clean($this->input->post('password'));
      $telepon =  $this->security->xss_clean($this->input->post('telepon'));
      $alamat =  $this->security->xss_clean($this->input->post('alamat'));
      $pekerjaan =  $this->security->xss_clean($this->input->post('pekerjaan'));

      $data = array(
        'nama' => $nama,
        'email' => $email,
        'username' => $username,
        'password' => md5($password),
        'telepon' => $telepon,
        'alamat' => $alamat,
        'pekerjaan' => $pekerjaan
      );

      $this->User->aksi_edit($data);
      redirect('users/pengaturan/'.$id);
    }
 
    public function ganti_foto()
    { 
      $upload = $this->User->ganti_foto();

      if ($upload['result'] == 'success') {
        $this->User->save($upload);

        chmod('./assets/gambar/user/'.$this->session->userdata('id').'/'.$upload['file']['file_name'], 0777);

        redirect(base_url('users/pengaturan'));
      }else{
        $data['pesan'] = $upload['error'];
      }
    } 

    public function batal_order()
    {
      $this->User->batal_order();
      $this->User->update_admin();
      redirect(base_url('users/pengaturan')); 
    }

    public function ganti_password()
    {
        $this->User->ganti_password();
        redirect('users/pengaturan');
    }

}
?>