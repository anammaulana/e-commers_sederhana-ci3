<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('M_barang');
        $this->load->model('M_customer');
        $this->load->model('M_category');
        $this->load->model('M_transaksi');
        $this->load->library('form_validation');
    }

    public function index() {
        // Ambil data barang, kategori, dan pelanggan dari model
        $data['barang'] = $this->M_transaksi->get_allbarang();
        $data['category'] = $this->M_transaksi->get_allcategory();
        $data['customer'] = $this->M_transaksi->get_allcustomer();
        $data['username'] = $this->session->userdata('nama');


        $this->load->view('template/header',$data);
        $this->load->view('data_master/tampil_transaksi', $data);
        $this->load->view('template/footer');
    }

    public function proses_transaksi() {
        // Tangkap data dari form
        $data = array(
            'id_barang' => $this->input->post('nama_barang'),
            'id_category' => $this->input->post('category'),
            'id_cust' => $this->input->post('nama_cust'),
            'jumlah' => $this->input->post('jumlah'),
            'total_harga' => $this->input->post('total_harga')
        );

        // Panggil method untuk menyimpan transaksi di model
        $this->M_transaksi->simpan_transaksi($data);

        // Set flashdata untuk memberi pesan bahwa transaksi berhasil
        $this->session->set_flashdata('pesan', 'Transaksi berhasil disimpan.');

        // Redirect ke halaman form transaksi
        redirect('Transaksi');
    }

   
 
    
}
