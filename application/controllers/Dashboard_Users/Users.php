<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

		$query_get_low = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Low' AND nama_sales = '$user'";
		$query_get_medium = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Medium' AND nama_sales = '$user'";
		$query_get_hot = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'Hot' AND nama_sales = '$user'";
		$query_get_do = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'DO' AND nama_sales = '$user'";
		$query_get_spk = "SELECT status_prospek FROM tb_data_prospek WHERE status_prospek = 'SPK' AND nama_sales = '$user'";

		$data = array(
			'data_low' => $this->db->query($query_get_low)->num_rows(),
			'data_medium' => $this->db->query($query_get_medium)->num_rows(),
			'data_hot' => $this->db->query($query_get_hot)->num_rows(),
			'data_do' => $this->db->query($query_get_do)->num_rows(),
			'data_spk' => $this->db->query($query_get_spk)->num_rows()
		);


		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/v_index', $data);
		$this->load->view('template_user/v_footer');
	}
	
	public function prospek()
	{
		//$where = array('nama_sales' => $this->session->userdata('nama_lengkap'));

		$get_nama = null;
		$get_bulan = null;

		if($this->input->get('nama_sales') && $this->input->get('bulan')){
			$get_nama = $this->input->get('nama_sales');
			$get_bulan = $this->input->get('bulan');
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
					$bulan = 'Invalid Month';

			}

		// $config['base_url'] = site_url('dashboard_users/users/prospek');
		// $config['total_rows'] = $this->db->get_where('tb_data_prospek', $where)->num_rows();
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 4;
		// $choice = $config['total_rows'] / $config['per_page'];
		// $config['num_links'] = floor($choice);

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

		// $this->pagination->initialize($config);
		// $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		// $data['data_prospek'] = $this->M_users->get_data($config["per_page"], $data['page'])->result();           

		// $data['pagination'] = $this->pagination->create_links();


    $data_prospek = $this->M_users->get_data($get_bulan, $get_nama);
		$data = array(
			'data_prospek' => $data_prospek->result(),
			'bulan' => $bulan,
			'nama_sales' => $get_nama
		);
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
		// $where = array(
		// 	'nama_sales'	=> $this->session->userdata('nama_lengkap')
		// );

		$get_bulan = null;
		$get_nama = null;
		$get_prospek = null;

		if($this->input->get('bulan') AND $this->input->get('nama_sales') AND $this->input->get('prospek')){
			$get_bulan = $this->input->get('bulan');
			$get_nama	 = $this->input->get('nama_sales');
      $get_prospek = $this->input->get('prospek');
		}

		// $config['base_url'] = site_url('dashboard_users/users/prospek');
		// $config['total_rows'] = $this->db->get_where('tb_data_prospek', $where)->num_rows();
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 4;
		// $choice = $config['total_rows'] / $config['per_page'];
		// $config['num_links'] = floor($choice);

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

		// $this->pagination->initialize($config);
		// $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data_report = $this->M_users->get_all_data_report($get_nama, $get_bulan, $get_prospek);  
		$data['data_prospek'] = $data_report->result();         

		// $data['pagination'] = $this->pagination->create_links();

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

		$this->M_users->aksi_edit_data($where,$data,'tb_data_prospek');

		redirect('dashboard_users/users/prospek');

	}

	public function do()
	{
		$config['base_url'] = site_url('dashboard_users/do'); //site url
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
		
		$data_prospek =  $this->M_do->get_data_do($config["per_page"], $data['page']);
		
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data = array(
			'data_prospek' => $data_prospek->result(),
		);           
		$data['pagination'] = $this->pagination->create_links();

    $data['nama_lengkap'] = $this->M_do->get_data_user()->result();
    
    $this->load->view('template_users/v_header');
		$this->load->view('template_users/v_sidebar');
		$this->load->view('template_users/data_do/v_index', $data);
		$this->load->view('template_users/v_footer');
	}

	public function export_excel()
	{
		
		$data_prospek = $this->M_users->get_where_data()->result();

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
		$filename="Data Laporan Bulanan Sales ".date("d-m-Y-i-s").".xlsx";

		// $PHPExcel->getActiveSheet->setTitle("Data Laporan Bulanan");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		// $writer=PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$writer->save('php://output');
	}

}
