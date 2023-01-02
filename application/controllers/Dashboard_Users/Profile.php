<?php

class Profile extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_users/M_profile');
  }

  public function index()
  {
    $where = array('id_user' => $this->session->userdata('id_user'));
    $data['profile'] = $this->M_profile->getWhere($where, 'tb_user')->row();
    $this->load->view('template_user/v_header');
    $this->load->view('template_user/v_sidebar');
    $this->load->view('template_user/profile/v_index', $data);
    $this->load->view('template_user/v_footer');
  }

  public function edit_profile()
  {
    $where = array('id_user' => $this->session->userdata('id_user'));
    $data['profile'] = $this->M_profile->getWhere($where, 'tb_user')->row();
    $this->load->view('template_user/v_header');
    $this->load->view('template_user/v_sidebar');
    $this->load->view('template_user/profile/v_edit_profile', $data);
    $this->load->view('template_user/v_footer');
  }

  public function aksi_edit_profile()
  {
    $this->M_profile->aksi_edit_profile();
    redirect('dashboard_users/profile');
  }
}