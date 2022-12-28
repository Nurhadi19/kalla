<?php

class M_do extends CI_Model {

  function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

  public function get_data_do($limit, $start)
  {
    $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'DO' LIMIT $start, $limit");
      
    return $this->db->query($query);
  }

  public function edit_do($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function aksi_edit_do($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  public function hapus_do($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function get_data_user()
  {
    return $this->db->get('tb_user');
  }
}