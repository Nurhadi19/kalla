<?php

class M_users extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function get_data($month = null, $nama_sales = null)
  {
    $default = $this->session->userdata('nama_lengkap');


    if($month == null && $nama_sales == null){
      $query = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan  WHERE td.nama_sales = '$default' AND td.status_prospek IN ('Low', 'Medium', 'Hot')";
      return $this->db->query($query);
    } else {
      $query = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan  WHERE td.nama_sales = '$nama_sales' AND month(td.tanggal_prospek) = $month AND td.status_prospek IN ('Low', 'Medium', 'Hot')";
      return $this->db->query($query);
    }

    
  }

  // public function get_data($where,$table)
  // {
  //   return $this->db->get_where($table,$where);
  // }

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

  public function get_all_data_report($nama_sales = null, $bulan = null, $prospek = null)
  {
    $default = $this->session->userdata('nama_lengkap');

    if($bulan == null && $nama_sales == null && $prospek == null){
      $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.nama_sales = '$default'");
  } else {
      $query = ("SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_model_kendaraan tm INNER JOIN tb_data_prospek td ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE month(td.tanggal_prospek) = '$bulan' AND td.nama_sales = '$nama_sales' AND td.status_prospek = '$prospek'");
  }

  return $this->db->query($query);
   
    
  }

  public function get_where_data()
  {
    $nama_sales = $this->session->userdata('nama_lengkap');


    $query = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_data_prospek td INNER JOIN tb_model_kendaraan tm ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.nama_sales = '$nama_sales'";

    return $this->db->query($query);
  }
}