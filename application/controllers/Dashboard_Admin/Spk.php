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
    $baris_data = "SELECT td.id_data, td.nama_sales, td.nama_customer, td.media, td.alamat, td.no_hp, td.sumber_prospek, tm.nama_model_kendaraan, td.type_kendaraan, td.status_prospek, td.tanggal_prospek, td.keterangan_prospek FROM tb_data_prospek td INNER JOIN tb_model_kendaraan tm ON td.id_model_kendaraan = tm.id_model_kendaraan WHERE td.status_prospek = 'SPK'";

    $config['base_url'] = site_url('dashboard_admin/spk/index'); //site url
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$config['total_rows'] = $this->db->query($baris_data)->num_rows();
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

  public function edit_spk($id_data)
  {
    $where = array('id_data' => $id_data);
    $data['prospek'] = $this->M_spk->edit_spk($where, 'tb_data_prospek')->result();

    $data['nama_lengkap'] = $this->M_spk->get_data_user()->result();
    $this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_spk/v_edit_data', $data);
		$this->load->view('template_admin/v_footer');

  }

  public function aksi_edit_spk()
  {
    $id_data 						= $this->input->post('id_data');
		$id_user 						= $this->input->post('id_user');
		$jabatan						= $this->input->post('jabatan');
		$nama_sales					= $this->input->post('nama_sales');
		$nama_customer 			= $this->input->post('nama_customer');
		$media							= $this->input->post('media');
		$alamat							= $this->input->post('alamat');
		$no_hp							= $this->input->post('no_hp');
		$sumber_prospek			= $this->input->post('sumber_prospek');
		$type_kendaraan			= $this->input->post('type_kendaraan');
		$model_kendaraan		= $this->input->post('model_kendaraan');
		$status_prospek			= $this->input->post('status_prospek');
		$tanggal_prospek		= $this->input->post('tanggal_prospek');
		$keterangan_prospek	= $this->input->post('keterangan_prospek');

		$data = array(
			'id_user'							=> $id_user,
			'jabatan'							=> $jabatan,
			'nama_sales'					=> $nama_sales,
			'nama_customer'				=> $nama_customer,
			'media'								=> $media,
			'alamat'							=> $alamat,
			'no_hp'								=> $no_hp,
			'sumber_prospek'			=> $sumber_prospek,
			'type_kendaraan'			=> $type_kendaraan,
			'id_model_kendaraan'	=> $model_kendaraan,
			'status_prospek'			=> $status_prospek,
			'tanggal_prospek'			=> $tanggal_prospek,
			'keterangan_prospek'	=> $keterangan_prospek
		);

		$where = array('id_data' => $id_data);

		$this->M_spk->aksi_edit_spk($where,$data,'tb_data_prospek');

		redirect('dashboard_admin/spk/');
  }

  public function hapus_spk($id_data)
  {
    $where = array('id_data' => $id_data);
    $this->M_spk->hapus_spk($where, 'tb_data_prospek');
    redirect('dashboard_admin/spk/');
  }

}

