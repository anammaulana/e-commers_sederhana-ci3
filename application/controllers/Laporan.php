<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('M_laporan'); // Sesuaikan dengan nama model yang Anda buat
    }
    public function index() {
        // Ambil data transaksi dari model
        $data['laporan'] = $this->M_laporan->get_laporan_transaksi();
        $data['username'] = $this->session->userdata('nama');


        // Load view dengan data yang telah diambil

        $this->load->view('template/header', $data);
        $this->load->view('data_master/tampil_laporan', $data);
        $this->load->view('template/footer', $data);
    }
}
