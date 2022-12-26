<?php

class Users extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('Model_users/M_users');
		$this->load->library('pagination');

		if($this->session->userdata('status') != "telah_login")
		{
			redirect('login/');
		}
		if($this->session->userdata('jabatan') != "Sales")
		{
			redirect('login/');
		}
	}

	
	public function index()
	{
		$user = $this->session->userdata('nama_lengkap');

		$query_get_low = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Low' AND sumber_prospek = '$user'";
		$query_get_medium = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Medium' AND sumber_prospek = '$user'";
		$query_get_hot = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Hot' AND sumber_prospek = '$user'";

		$data = array(
			'data_low' => $this->db->query($query_get_low)->num_rows(),
			'data_medium' => $this->db->query($query_get_medium)->num_rows(),
			'data_hot' => $this->db->query($query_get_hot)->num_rows()
		);


		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/v_index', $data);
		$this->load->view('template_user/v_footer');
	}
	
	public function prospek()
	{
		$where = array(
			'sumber_prospek'	=> $this->session->userdata('nama_lengkap')
		);

		$config['base_url'] = site_url('dashboard_users/users/prospek');
		$config['total_rows'] = $this->db->get_where('tb_data_prospek', $where)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

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

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data_prospek'] = $this->M_users->get_data($where, 'tb_data_prospek', $config["per_page"], $data['page'])->result();           

		$data['pagination'] = $this->pagination->create_links();


    
		// $data['data_prospek'] = $this->M_users->get_data($where,'tb_data_prospek')->result();
		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_prospek/v_index',$data);
		$this->load->view('template_user/v_footer');
	}

	// public function prospek()
	// {
  //   $where = array(
	// 		'sumber_prospek'	=> $this->session->userdata('nama_lengkap')
	// 	);
	// 	$data['data_prospek'] = $this->M_users->get_data($where,'tb_data_prospek')->result();
	// 	$this->load->view('template_user/v_header');
	// 	$this->load->view('template_user/v_sidebar');
	// 	$this->load->view('template_user/data_prospek/v_index',$data);
	// 	$this->load->view('template_user/v_footer');
	// }

	public function report()
	{
		$where = array(
			'sumber_prospek'	=> $this->session->userdata('nama_lengkap')
		);

		$config['base_url'] = site_url('dashboard_users/users/prospek');
		$config['total_rows'] = $this->db->get_where('tb_data_prospek', $where)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

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

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data_prospek'] = $this->M_users->get_data($where, 'tb_data_prospek', $config["per_page"], $data['page'])->result();           

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_report/v_index', $data);
		$this->load->view('template_user/v_footer');
	}

	public function tambah_data_prospek()
	{

		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_prospek/v_tambah_data');
		$this->load->view('template_user/v_footer');
	}

	public function aksi_tambah_data()
	{
		$id_user 						= $this->input->post('id_user');
		$jabatan						= $this->input->post('jabatan');
		$nama_customer 			= $this->input->post('nama_customer');
		$media							= $this->input->post('media');
		$alamat							= $this->input->post('alamat');
		$sumber_prospek			= $this->input->post('sumber_prospek');
		$type_kendaraan			= $this->input->post('type_kendaraan');
		$model_kendaraan		= $this->input->post('model_kendaraan');
		$status_prospek			= $this->input->post('status_prospek');
		$tanggal_prospek		= $this->input->post('tanggal_prospek');
		$keterangan_prospek	= $this->input->post('keterangan_prospek');

		$data = array(
			'id_user'							=> $id_user,
			'jabatan'							=> $jabatan,
			'nama_customer'				=> $nama_customer,
			'media'								=> $media,
			'alamat'							=> $alamat,
			'sumber_prospek'			=> $sumber_prospek,
			'type_kendaraan'			=> $type_kendaraan,
			'model_kendaraan'			=> $model_kendaraan,
			'status_prospek'			=> $status_prospek,
			'tanggal_prospek'			=> $tanggal_prospek,
			'keterangan_prospek'	=> $keterangan_prospek
		);

		$this->M_users->tambah_data($data,'tb_data_prospek');

		redirect('dashboard_users/users/prospek');
	}

	public function edit_data($id_data)
	{
		$where		= array('id_data' => $id_data);
		$data['prospek'] = $this->M_users->edit_data($where,'tb_data_prospek')->result();
		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_prospek/v_edit_data',$data);
		$this->load->view('template_user/v_footer');
	}

	public function aksi_edit_data()
	{
		$id_data 						= $this->input->post('id_data');
		$id_user 						= $this->input->post('id_user');
		$jabatan						= $this->input->post('jabatan');
		$nama_customer 			= $this->input->post('nama_customer');
		$media							= $this->input->post('media');
		$alamat							= $this->input->post('alamat');
		$sumber_prospek			= $this->input->post('sumber_prospek');
		$type_kendaraan			= $this->input->post('type_kendaraan');
		$model_kendaraan		= $this->input->post('model_kendaraan');
		$status_prospek			= $this->input->post('status_prospek');
		$tanggal_prospek		= $this->input->post('tanggal_prospek');
		$keterangan_prospek	= $this->input->post('keterangan_prospek');

		$data = array(
			'id_user'							=> $id_user,
			'jabatan'							=> $jabatan,
			'nama_customer'				=> $nama_customer,
			'media'								=> $media,
			'alamat'							=> $alamat,
			'sumber_prospek'			=> $sumber_prospek,
			'type_kendaraan'			=> $type_kendaraan,
			'model_kendaraan'			=> $model_kendaraan,
			'status_prospek'			=> $status_prospek,
			'tanggal_prospek'			=> $tanggal_prospek,
			'keterangan_prospek'	=> $keterangan_prospek
		);

		$where = array('id_data' => $id_data);

		$this->M_users->aksi_edit_data($where,$data,'tb_data_prospek');

		redirect('dashboard_users/users/prospek');

	}

}
