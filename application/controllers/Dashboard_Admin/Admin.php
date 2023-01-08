<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin/M_admin');
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
		$query_get_low = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Low'";
		$query_get_medium = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Medium'";
		$query_get_hot = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Hot'";
		$query_get_do = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'DO'";
		$query_get_spk = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'SPK'";
		$data['data_low'] = $this->db->query($query_get_low)->num_rows();
		$data['data_medium'] = $this->db->query($query_get_medium)->num_rows();
		$data['data_hot'] = $this->db->query($query_get_hot)->num_rows();
		$data['data_do'] = $this->db->query($query_get_do)->num_rows();
		$data['data_spk'] = $this->db->query($query_get_spk)->num_rows();
		$data['jumlah_user'] = $this->M_admin->get_data_user()->num_rows();
		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/v_index', $data);
		$this->load->view('template_admin/v_footer');
	}
	
	public function prospek()
	{
		$get_bulan = null;
		$get_nama = null;
		// $limit = 5;
		// $start = 0;
		if($this->input->get('bulan') AND $this->input->get('nama_sales')){
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
            case 'Sep':
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
		// $config['base_url'] = site_url('dashboard_admin/admin/prospek'); //site url
		// $config['per_page'] = 5;  //show record per halaman
		// $config["uri_segment"] = 4;  // uri parameter
		
		// Membuat Style pagination untuk BootStrap v4
		// $config['first_link']       = 'First';
		// $config['last_link']        = 'Last';
		// $config['next_link']        = 'Next';
		// $config['prev_link']        = 'Prev';
		// $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		// $config['full_tag_close']   = '</ul></nav></div>';
		// $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		// $config['num_tag_close']    = '</span></li>';
		// $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		// $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		// $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		// $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['prev_tagl_close']  = '</span>Next</li>';
		// $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		// $config['first_tagl_close'] = '</span></li>';
		// $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['last_tagl_close']  = '</span></li>';
		// $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		// $data_prospek =  $this->M_admin->get_data($config["per_page"], $data['page'], $get_bulan, $get_nama);
		$data_prospek =  $this->M_admin->get_data($get_bulan, $get_nama);
		// var_dump($data_prospek->num_rows()); die();

		// if($get_bulan == null && $get_nama == null){
		// 	$config['total_rows'] = $this->db->count_all('tb_data_prospek');
		// } else {
		// 	// $config['total_rows'] = $data_prospek->num_rows();
		// 	$this->db->like('nama_sales', $get_nama);
		// 	$this->db->like('tanggal_prospek', $get_bulan);
		// 	$this->db->from('tb_data_prospek');
		// 	// $config['total_rows'] = $data_prospek->count_all_results();
		// 	$config['total_rows'] = $this->db->count_all_results();
		// 	// var_dump($config['total_rows']); die();
		
		// }


		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = floor($choice);

		// $this->pagination->initialize($config);
		
		$data = array(
			'data_prospek' => $data_prospek->result(),
			'bulan' => $bulan,
			'nama_sales' => $get_nama
		);           
		// $data['pagination'] = $this->pagination->create_links();
		$data['nama_lengkap'] = $this->M_admin->get_data_user()->result();

		$this->load->view('template_admin/v_header');
		$this->load->view('template_admin/v_sidebar');
		$this->load->view('template_admin/data_prospek/v_index',$data);
		$this->load->view('template_admin/v_footer');
	}

	public function report()
	{
		$get_bulan = null;
		$get_nama = null;
		$get_prospek = null;

		if($this->input->get('bulan') AND $this->input->get('nama_sales') AND $this->input->get('prospek')){
			$get_bulan = $this->input->get('bulan');
			$get_nama	 = $this->input->get('nama_sales');
      $get_prospek = $this->input->get('prospek');
		}

		// //konfigurasi pagination
		// $config['base_url'] = site_url('dashboard_admin/admin/report'); //site url
		// $config['per_page'] = 5;  //show record per halaman
		// $config["uri_segment"] = 4;  // uri parameter
		
		// // Membuat Style pagination untuk BootStrap v4
		// $config['first_link']       = 'First';
		// $config['last_link']        = 'Last';
		// $config['next_link']        = 'Next';
		// $config['prev_link']        = 'Prev';
		// $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		// $config['full_tag_close']   = '</ul></nav></div>';
		// $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		// $config['num_tag_close']    = '</span></li>';
		// $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		// $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		// $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		// $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['prev_tagl_close']  = '</span>Next</li>';
		// $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		// $config['first_tagl_close'] = '</span></li>';
		// $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		// $config['last_tagl_close']  = '</span></li>';
		// $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $data_report = $this->M_admin->get_all_data_report($get_bulan, $get_nama, $get_prospek);           

  	// $config['total_rows'] = $data_report->num_rows();

    // $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = floor($choice);

    // $this->pagination->initialize($config);

		$data['data_prospek'] = $data_report->result();           
		// $data['pagination'] = $this->pagination->create_links();
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
		$config['per_page'] = 10;
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

		$this->M_admin->aksi_edit_data($where,$data,'tb_data_prospek');

		redirect('dashboard_admin/admin/prospek');

	}

	public function hapus_data($id_data)
	{
		$where = array('id_data' => $id_data);
		$this->M_admin->hapus_data($where, 'tb_data_prospek');
		redirect('dashboard_admin/admin/prospek');
	}

	public function export_excel()
	{
		$data_prospek = $this->M_admin->get_all_data()->result();

		$PHPExcelSheet = new SpreadSheet();

		$PHPExcel = $PHPExcelSheet->getActiveSheet();

		$PHPExcel->setCellValue("A1","Nomor");
		$PHPExcel->setCellValue("B1","Nama Sales");
		$PHPExcel->setCellValue("C1","Nama Customer");
		$PHPExcel->setCellValue("D1","Media");
		$PHPExcel->setCellValue("E1","Alamat");
		$PHPExcel->setCellValue("F1","No. HP");
		$PHPExcel->setCellValue("G1","Sumber Prospek");
		$PHPExcel->setCellValue("H1","Model Kendaraan");
		$PHPExcel->setCellValue("I1","Type Kendaraan");
		$PHPExcel->setCellValue("J1","Status Prospek");
		$PHPExcel->setCellValue("K1","Keterangan Tanggal Prospek");
		$PHPExcel->setCellValue("L1","Keterangan Prospek");

		$baris=2;
		$no=1;

		foreach($data_prospek as $data){
			$PHPExcel->setCellValue('A'.$baris, $no);
			$PHPExcel->setCellValue('B'.$baris, $data->nama_sales);
			$PHPExcel->setCellValue('C'.$baris, $data->nama_customer);
			$PHPExcel->setCellValue('D'.$baris, $data->media);
			$PHPExcel->setCellValue('E'.$baris, $data->alamat);
			$PHPExcel->setCellValue('F'.$baris, $data->no_hp);
			$PHPExcel->setCellValue('G'.$baris, $data->sumber_prospek);
			$PHPExcel->setCellValue('H'.$baris, $data->nama_model_kendaraan);
			$PHPExcel->setCellValue('I'.$baris, $data->type_kendaraan);
			$PHPExcel->setCellValue('J'.$baris, $data->status_prospek);
			$PHPExcel->setCellValue('K'.$baris, $data->tanggal_prospek);
			$PHPExcel->setCellValue('L'.$baris, $data->keterangan_prospek);

			$no++;
			$baris++;
		}

		$writer = new Xlsx($PHPExcelSheet);
		$filename="Data Laporan Bulanan ".date("d-m-Y-i-s").".xlsx";

		// $PHPExcel->getActiveSheet->setTitle("Data Laporan Bulanan");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		// $writer=PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$writer->save('php://output');
	}
}
