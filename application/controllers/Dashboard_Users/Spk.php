<?php

class Spk extends CI_Controller{

  function __construct()
	{
		parent::__construct();
		$this->load->model('Model_users/M_spk');
		$this->load->library('pagination');

		if($this->session->userdata('status')!="telah_login")
		{
			$this->session->set_flashdata('alert', 'Anda belum login, silahkan login terlebih dahulu');
			redirect('login/');
		}
		if($this->session->userdata('jabatan') != "Sales")
		{
			redirect('dashboard_/');
		}
	}

  public function index()
  {
		$get_nama = null;
		$get_bulan = null;

		if($this->input->get('nama_sales') && $this->input->get('bulan')){
			$get_nama = $this->input->get('nama_sales');
			$get_bulan = $this->input->get('bulan');
		}
   
		
		$data_prospek =  $this->M_spk->get_data_spk($get_nama, $get_bulan);
		
		
		$data = array(
			'data_prospek' => $data_prospek->result()
		);           
		
    $this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_spk/v_index', $data);
		$this->load->view('template_user/v_footer');

  }

  public function edit_data_spk($id_data)
	{
		$where		= array('id_data' => $id_data);
		$data['prospek'] = $this->M_spk->edit_data_spk($where,'tb_data_prospek')->result();
		$this->load->view('template_user/v_header');
		$this->load->view('template_user/v_sidebar');
		$this->load->view('template_user/data_spk/v_edit_data',$data);
		$this->load->view('template_user/v_footer');
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

		redirect('dashboard_users/spk/');
	}
  
}