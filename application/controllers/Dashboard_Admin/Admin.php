<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin/M_admin');
		$this->load->library('pagination');

		if($this->session->userdata('status')!="telah_login")
		{
			redirect('login/');
		}
		if($this->session->userdata('jabatan') != "Supervisor")
		{
			redirect('dashboard_/');
		}
	}

	
	public function index()
	{
		$query_get_low = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Low'";
		$query_get_medium = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Medium'";
		$query_get_hot = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Hot'";
		$data['data_low'] = $this->db->query($query_get_low)->num_rows();
		$data['data_medium'] = $this->db->query($query_get_medium)->num_rows();
		$data['data_hot'] = $this->db->query($query_get_hot)->num_rows();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/v_index', $data);
		$this->load->view('template_admin/v_footer');
	}
	
	public function prospek()
	{
		$get_bulan = date('n');
		$get_nama	 = "";
		if($this->input->get('bulan') && $this->input->get('nama_sales')){
			$get_bulan = $this->input->get('bulan');
			$get_nama	 = $this->input->get('nama_sales');
		}

		$bulan = date('M');
        switch($bulan){
            case 'Jan':
                $bulan = 'Januari';
                break;
            case 'Feb':
                $bulan = 'Februari';
                break;
            case 'Mar':
                $bulan = 'Maret';
                break;
            case 'Apr':
                $bulan = 'April';
                break;
            case 'May':
                $bulan = 'Mei';
                break;
            case 'Jun':
                $bulan = 'Juni';
                break;
            case 'Jul':
                $bulan = 'Juli';
                break;
            case 'Aug':
                $bulan = 'Agustus';
                break;
            case 'Sept':
                $bulan = 'September';
                break;
            case 'Oct':
                $bulan = 'Oktober';
                break;
            case 'Nov':
                $bulan = 'November';
                break;
            case 'Dec':
                $bulan = 'Desember';
                break;
            default:
                $bulan = 'invalid month';
        }

		//konfigurasi pagination
		$config['base_url'] = site_url('dashboard_admin/admin/prospek'); //site url
		$config['total_rows'] = $this->db->count_all_results('tb_data_prospek'); //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

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

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data = array(
			'data_prospek' => $this->M_admin->get_data($config["per_page"], $data['page'], $get_bulan, $get_nama)->result(),
			'bulan' => $bulan,
			'nama_sales' => $get_nama
		);           

		$data['pagination'] = $this->pagination->create_links();

		//load view mahasiswa view
		//$this->load->view('mahasiswa_view',$data);

		//$data['data_prospek'] = $this->M_admin->get_data()->result();
		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_prospek/v_index',$data);
		$this->load->view('template_admin/v_footer');
	}

	// public function prospek()
	// {
	// 	$data['data_prospek'] = $this->M_admin->get_data()->result();
	// 	$this->load->view('template_admin/v_header');
	// 	$this->load->view('template_admin/v_sidebar');
	// 	$this->load->view('template_admin/data_prospek/v_index',$data);
	// 	$this->load->view('template_admin/v_footer');
	// }

	public function report()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('dashboard_admin/admin/report'); //site url
		$config['total_rows'] = $this->db->count_all('tb_data_prospek'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

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

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data_prospek'] = $this->M_admin->get_data($config["per_page"], $data['page'])->result();           

		$data['pagination'] = $this->pagination->create_links();

		//load view mahasiswa view
		//$this->load->view('mahasiswa_view',$data);

		//$data['data_prospek'] = $this->M_admin->get_data()->result();
		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();

		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_report/v_index', $data);
		$this->load->view('template_admin/v_footer');
	}

	public function daftar_user()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('dashboard_admin/admin/daftar_user');
		$config['total_rows'] = $this->db->get('tb_user')->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] 	= 'Last';
		$config['next_link']	= 'Next';
		$config['prev_link']	= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav></div>';
		$config['num_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';
		$config['cur_tag_open']	= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']	= '</span>Next</li>';
		$config['first_tag_open']	=	'<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	=	'</span></li>';
		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']	= '</span></li>';

		//jalankan pagination
		$this->pagination->initialize($config);
		$data['page']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;



		$data['user'] = $this->M_admin->get_user($config['per_page'], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/daftar_user/v_index', $data);
		$this->load->view('template_admin/v_footer');
	}

	public function tambah_user()
	{
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/daftar_user/v_tambah_user');
		$this->load->view('template_admin/v_footer');
	}

	public function aksi_tambah_user()
	{
		$this->load->helper('form');
		$this->load->library('upload');

		$config = array(
			'upload_path' 	=> './assets/img/foto_profil',
			'allowed_types'	=> 'gif|jpg|png|jpeg'
		);

		$this->upload->initialize($config);
		$this->upload->do_upload('foto_profil');

		$jabatan			= $this->input->post('jabatan');
		$nama_lengkap	= $this->input->post('nama_lengkap');
		$username			= $this->input->post('username');
		$password			= $this->input->post('password');
		$foto_profil	= $_FILES['foto_profil']['name'];
		$foto_profil 	= str_replace(' ','_', $foto_profil);

		$data = array(
			'jabatan'		=>	$jabatan,
			'nama_lengkap'	=>	$nama_lengkap,
			'username'	=>	$username,
			'password'	=>	md5($password),
			'foto_profil'	=>	$foto_profil,
		);

		$this->M_admin->aksi_tambah_user($data, 'tb_user');
		redirect('dashboard_admin/admin/daftar_user');
	}

	public function edit_user($id_user)
	{
		$where = array('id_user' => $id_user);
		$data['user'] = $this->M_admin->edit_data_user($where, 'tb_user')->result();
		//$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/daftar_user/v_edit_user', $data);
		$this->load->view('template_admin/v_footer');

	}

	public function aksi_edit_user()
	{
		$this->M_admin->aksi_edit_user();
		redirect('dashboard_admin/admin/daftar_user');

	}

	public function hapus_user($id_user)
	{
		$where = array('id_user' => $id_user);
		$this->M_admin->hapus_user($where, 'tb_user');
		redirect('dashboard_admin/admin/daftar_user');
	}

	public function tambah_data_prospek()
	{
		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_prospek/v_tambah_data', $data);
		$this->load->view('template_admin/v_footer');
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

		$this->M_admin->tambah_data($data,'tb_data_prospek');

		redirect('dashboard_admin/admin/prospek');
	}

	public function edit_data($id_data)
	{
		$where		= array('id_data' => $id_data);
		$data['prospek'] = $this->M_admin->edit_data($where,'tb_data_prospek')->result();
		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_prospek/v_edit_data',$data);
		$this->load->view('template_admin/v_footer');
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

		$this->M_admin->aksi_edit_data($where,$data,'tb_data_prospek');

		redirect('dashboard_admin/admin/prospek');

	}

	public function hapus_data($id_data)
	{
		$where = array('id_data' => $id_data);
		$this->M_admin->hapus_data($where, 'tb_data_prospek');
		redirect('dashboard_admin/admin/prospek');
	}
}
