<?php

class M_do extends CI_Model {

  function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

  public function get_data_do($month = null, $nama_sales = null)
  {

    $default = $this->session->userdata('nama_lengkap');

    if($month == null && $nama_sales == null){
      $query = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'DO' AND td.nama_sales = '$default'";
    } else {
      $query = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'DO' AND td.nama_sales = '$nama_sales' AND month(td.tanggal_prospek) = $month";
    }
      
    return $this->db->query($query);
  }

  public function get_data_user()
  {
    return $this->db->get('tb_user');
  }

  public function edit_data_do($where,$table)
  {
    return $this->db->get_where($table,$where);
  }

  public function aksi_edit_do($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
}