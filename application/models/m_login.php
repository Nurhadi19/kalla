<?php

class m_login extends CI_Model {

  public function cek_login($table,$where)
  {
    $this->load->database();
    return $this->db->get_where($table,$where);
  }

}