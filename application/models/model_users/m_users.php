<?php

class M_users extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function get_data($where, $table, $limit, $start)
  {
    $this->db->order_by('id_data', 'DESC');
    return $this->db->get_where($table,$where, $limit, $start);
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

  public function get_where_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }
}