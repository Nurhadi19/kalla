<?php

class M_spk extends CI_Model {

  function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

  public function get_data_spk($limit, $start)
  {
    $nama_sales = $this->session->userdata('nama_lengkap');
    $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'SPK' AND nama_sales = '$nama_sales' LIMIT $start, $limit");
      
    return $this->db->query($query);
  }

  public function get_data_user()
  {
    return $this->db->get('tb_user');
  }

}