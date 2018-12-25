<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Model {
	
  function cek_duplikat($email){ 
  	$this->db->select('email');
  	$this->db->from('user');
  	$this->db->like('email', $email);
  	return $this->db->count_all_result();
  }

  function getProfile($id)
  {
  	return $this->db->get_where('user', array('id' => $id))->result();
  }

  function aksi_edit($data)
  {
    $id = $this->uri->segment(3);
    $this->db->where(array('id' => $id));
    $this->db->update('user', $data);

  }

  public function ganti_foto()
  {
      $config['upload_path'] = './assets/gambar/user/'.$this->session->userdata('id').'/';    
      $config['allowed_types'] = 'jpg|png|jpeg';    
      $config['max_size']  = '4048';    
      $config['remove_space'] = TRUE;
      $config['file_name'] = 'foto_profil'; 

      $this->load->library('upload', $config);

      if($this->upload->do_upload('ganti_foto'))
      {

        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        return $return;

      }else{

        $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        return $return;

      }

  }

  public function save($upload)
  {

    $data = array(
      'foto_profil' => $upload['file']['file_name']
    );

    $this->db->update('user', $data);
    $this->db->where(array('id' => $this->session->userdata('id')));
  }

  public function favorit($data)
  {
    
    $this->db->insert('favorit', $data);
  }

  public function getTagihan()
  {
    return $this->db->get_where('order_paket', array('id_user' => $this->session->userdata('id')))->result();
  }

  public function batal_order()
  {
    $this->db->where(array("id_user" => $this->session->userdata('id')));
    $this->db->delete("order_paket");
  }
  public function update_admin()
  {
    $this->db->where(array("id_user" => $this->session->userdata('id')));
    $this->db->delete("bukti_pembayaran");
  }
  function ganti_password()
  {

      $data = array(
        'password' => md5($this->input->post("password_baru"))
      );

      $this->db->where(array('id' => $this->session->userdata('id')));
      $this->db->update('user', $data);

  }
}
?>