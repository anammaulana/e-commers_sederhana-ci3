<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('M_customer');
        $this->load->library('form_validation');
    }

    public function index()
    {  
        $data['username'] = $this->session->userdata('nama');
        $data['customer'] = $this->M_customer->getAll();
        $this->load->view('template/header',$data);
        $this->load->view('data_master/tampil_customer', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telpon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header',$data);
            $this->load->view('data_master/tambah_customer');
            $this->load->view('template/footer');
        } else {
            $data['nama_cust'] = $this->input->post('nama');
            $data['alamat_cust'] = $this->input->post('alamat');
            $data['no_tlp_cust'] = $this->input->post('no_tlp');

            $this->M_customer->insert($data);

            $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
            redirect(base_url('customer'));
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telpon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['customer'] = $this->M_customer->getId($id);
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header', $data);
            $this->load->view('data_master/edit_customer', $data);
            $this->load->view('template/footer');
        } else {
            $data['nama_cust'] = $this->input->post('nama');
            $data['alamat_cust'] = $this->input->post('alamat');
            $data['no_tlp_cust'] = $this->input->post('no_tlp');

            $this->M_customer->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect(base_url('customer'));
        }
    }

    public function delete($id)
    {
        $this->M_customer->delete($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect(base_url('customer'));
    }
}
