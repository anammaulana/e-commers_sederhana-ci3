<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	if($this->session->userdata('status') != "login"){
	// 		redirect(base_url("login"));
	// 	}
	// }
	private function isAdmin() {
        // Periksa peran pengguna dari sesi
        return $this->session->userdata('role') == 1;
    }
	function __construct(){
		parent::__construct();
	
		if (!$this->isAdmin()) {
            // Redirect atau berikan pesan kesalahan jika bukan admin
            redirect(base_url('katalog'));
        }
	}
	 
   
	public function index()
	{
		$this->load->model('M_karyawan');
        $data['jumlah_karyawan'] = $this->M_karyawan->getJumlahKaryawan();

		$this->load->model('M_customer');
		$data['jumlah_customer'] = $this->M_customer->getCustomer();

		$this->load->model('M_transaksi');
		$data['jumlah_transaksi'] = $this->M_transaksi->getTransaksi();

		$this->load->model('M_category');
		$data['jumlah_category'] = $this->M_category->getAllCategory();

		$data['username'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('template/home', $data);
		$this->load->view('template/footer');
	}
}
