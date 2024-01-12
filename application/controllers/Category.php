<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('M_category');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['category'] = $this->M_category->getAll();
        $data['username'] = $this->session->userdata('nama');

        $this->load->view('template/header',$data);
        $this->load->view('data_master/tampil_category', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['username'] = $this->session->userdata('nama');

            $this->load->view('template/header', $data);
            $this->load->view('data_master/tambah_category');
            $this->load->view('template/footer');
        } else {
            $data['category'] = $this->input->post('category');
            $this->M_category->insert($data);

            $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
            redirect(base_url('category'));
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['category'] = $this->M_category->getId($id);
            $this->load->view('template/header');
            $this->load->view('data_master/edit_category', $data);
            $this->load->view('template/footer');
        } else {
            $data['category'] = $this->input->post('category');

            $this->M_category->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect(base_url('category'));
        }
    }

    public function delete($id)
    {
        $this->M_category->delete($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect(base_url('category'));
    }
}
