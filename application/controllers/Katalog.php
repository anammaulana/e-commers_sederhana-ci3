<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

	private function isUser()
	{
		// Periksa peran pengguna dari sesi
		return $this->session->userdata('role') == 2;
	}
	private function isAdmin()
	{
		// Periksa peran pengguna dari sesi
		return $this->session->userdata('role') == 1;
	}



	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang'); // Load model M_barang

		if (!$this->isUser() && !$this->isAdmin()) {
			// Redirect atau berikan pesan kesalahan jika bukan admin atau pengguna
			redirect(base_url('katalog/error'));
		}
	}

	public function index()
	{
		$data =
			[
				'title' => 'Home',
				'barang_list' => $this->M_barang->getAll()

			];
		$this->load->view('template_katalog/header', $data);
		$this->load->view('katalog/index');
		$this->load->view('template_katalog/footer');
	}
	public function produk()
	{
		$data =
			[
				'title' => 'Produk',
				'barang_list' => $this->M_barang->getAll()
			];
		$this->load->view('template_katalog/header', $data);
		$this->load->view('katalog/produk', $data);
		$this->load->view('template_katalog/footer');
	}
	public function about()
	{
		$data =
			[
				'title' => 'About',
				'barang_list' => $this->M_barang->getAll()
			];
		$this->load->view('template_katalog/header', $data);
		$this->load->view('katalog/about', $data);
		$this->load->view('template_katalog/footer');
	}
	public function order($barang_id)
	{
		// Lakukan operasi order sesuai dengan kebutuhan aplikasi Anda
		// Contoh: Kurangi stok barang, catat order, dll.

		// Redirect atau tampilkan pesan sukses sesuai dengan kebutuhan
		redirect(base_url('katalog/produk'));
	}
}
