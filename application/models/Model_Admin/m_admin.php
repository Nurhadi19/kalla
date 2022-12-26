<?php

class M_admin extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function get_data($limit, $start, $month = null, $nama_sales = null)
  {
    if($month != "" && $nama_sales != ""){
      $query = "SELECT * FROM tb_data_prospek WHERE month(tanggal_prospek) = $month AND sumber_prospek = '$nama_sales'";
      return $this->db->query($query);
      // $this->db->like('sumber_prospek', $nama_sales);
      // $this->db->like('tanggal_prospek', $month);
    }

    //$this->db->order_by('id_data', 'DESC');
    return $this->db->get('tb_data_prospek', $limit, $start);
    
  }

  // public function get_data()
  // {
  //   return $this->db->get('tb_data_prospek');
  // }

  public function get_user($limit, $start)
  {
    $this->db->order_by('nama_lengkap', 'ASC');
    return $this->db->get('tb_user', $limit, $start);
  }

  public function get_data_user()
  {
    return $this->db->get('tb_user');
  }

  public function aksi_tambah_user($data, $table)
  {
    return $this->db->insert($table, $data);
  }

  public function edit_data_user($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function aksi_edit_user()
  {
    $this->load->library('upload');

		$config = array(
			'upload_path' 	=> './assets/img/foto_profil',
			'allowed_types'	=> 'gif|jpg|png|jpeg'
		);

		$this->upload->initialize($config);
		$this->upload->do_upload('foto_profil');

		$id_user = $this->input->post('id_user');
		$jabatan = $this->input->post('jabatan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
    $foto_lama = $this->input->post('foto_lama');
		$foto_profil	= $_FILES['foto_profil']['name'];
		$foto_profil 	= str_replace(' ','_', $foto_profil);


		if($foto_profil == null){
      $query = "UPDATE tb_user SET jabatan = '$jabatan', nama_lengkap = '$nama_lengkap', username = '$username' WHERE id_user = '$id_user'";
    } else {
      unlink('./assets/img/foto_profil/'.$foto_lama);
      $query = "UPDATE tb_user SET jabatan = '$jabatan', nama_lengkap = '$nama_lengkap', username = '$username', foto_profil = '$foto_profil' WHERE id_user = '$id_user'";

    } 

    $hasil = $this->db->query($query);

    return $hasil;

		
  }

  public function hapus_user($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function tambah_data($data,$table)
  {
    $this->db->insert($table,$data);
  }

  public function edit_data($where,$table)
  {
    return $this->db->get_where($table,$where);
  }

  public function aksi_edit_data($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  public function hapus_data($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}