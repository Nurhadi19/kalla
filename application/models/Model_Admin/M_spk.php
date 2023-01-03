<?php

class M_spk extends CI_Model {

  function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

  public function get_data_spk($limit, $start, $bulan = null, $nama_sales = null)
  {
    if($bulan == null && $nama_sales == null){
        $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'SPK' LIMIT $start, $limit");
    } else {
        $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'SPK' AND MONTH(td.tanggal_prospek) = $bulan AND td.nama_sales = '$nama_sales' LIMIT $start, $limit");
    }
  
      
    return $this->db->query($query);
  }

  public function get_data_user()
  {
    return $this->db->get('tb_user');
  }

  public function edit_spk($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function aksi_edit_spk($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  public function hapus_spk($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

}