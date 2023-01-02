<?php

class M_profile extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getWhere($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function aksi_edit_profile()
  {
    $this->load->library('upload');
    $this->load->helper('form');

		$config = array(
			'upload_path' 	=> './assets/img/foto_profil',
			'allowed_types'	=> 'gif|jpg|png|jpeg'
		);

		$this->upload->initialize($config);
		$this->upload->do_upload('foto_profil');

    $id_user = $this->input->post('id_user');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $username = $this->input->post('username');
    $jabatan = $this->input->post('jabatan');
    $password_baru = $this->input->post('password');
    $foto_lama = $this->input->post('foto_lama');
    $foto_profil	= $_FILES['foto_profil']['name'];
		$foto_profil 	= str_replace(' ','_', $foto_profil);

    
    if($foto_profil != null && $password_baru != null){
      unlink('./assets/img/foto_profil/'.$foto_lama);
      $query = "UPDATE tb_user SET nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', username = '$username', password = md5('$password_baru'), foto_profil = '$foto_profil' WHERE id_user = '$id_user'";
    } elseif($foto_profil != null && $password_baru == null){
      unlink('./assets/img/foto_profil/'.$foto_lama);
      $query = "UPDATE tb_user SET nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', username = '$username', foto_profil = '$foto_profil' WHERE id_user = '$id_user'";
    } elseif($foto_profil == null && $password_baru != null){
      $query = "UPDATE tb_user SET nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', username = '$username', password = md5('$password_baru') WHERE id_user = '$id_user'";
    } else {
      $query = "UPDATE tb_user SET nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', username = '$username' WHERE id_user = '$id_user'";
    }
  
    return $this->db->query($query);
  }

}