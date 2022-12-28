<?php

class Spk extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin/M_spk');
		$this->load->library('pagination');

		if($this->session->userdata('status')!="telah_login")
		{
			$this->session->set_flashdata('alert', 'Anda belum login, silahkan login terlebih dahulu');
			redirect('login/');
		}
		if($this->session->userdata('jabatan') != "Supervisor")
		{
			redirect('dashboard_/');
		}
	}

  public function index()
  {
    $config['base_url'] = site_url('dashboard_admin/spk'); //site url
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$config['total_rows'] = $this->db->count_all('tb_data_prospek');
		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data_prospek =  $this->M_spk->get_data_spk($config["per_page"], $data['page']);
		
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data = array(
			'data_prospek' => $data_prospek->result(),
		);           
		$data['pagination'] = $this->pagination->create_links();

    $data['nama_lengkap'] = $this->M_spk->get_data_user()->result();
    
    $this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_spk/v_index', $data);
		$this->load->view('template_admin/v_footer');
  }

}

