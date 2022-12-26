<?php 

class Login extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_login');
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function aksi_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => md5($password)
    );

    $cek = $this->M_login->cek_login('tb_user',$where)->num_rows();
    if($cek > 0){
      $data = $this->M_login->cek_login('tb_user',$where)->row();

      $data_session = array(
        'id_user'       => $data->id_user,
        'username'      => $data->username,
        'nama_lengkap'  => $data->nama_lengkap,
        'foto_profil'   => $data->foto_profil,
        'jabatan'       => $data->jabatan,
        'status'        => 'telah_login'
      );
      $this->session->set_userdata($data_session);
      if($data_session['jabatan'] == 'Supervisor'){
        redirect('dashboard_admin/admin');
      } else {
        redirect('dashboard_users/users');
      }
    } else{
      redirect('login/'); 
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login/');
  }

}