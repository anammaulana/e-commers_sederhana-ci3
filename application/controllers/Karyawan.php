<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('M_karyawan');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['karyawan'] = $this->M_karyawan->getAll();
        $data['username'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('data_master/tampil_karyawan', $data);
        $this->load->view('template/footer');
    }

    public function insert() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_karyawan.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header', $data);
            $this->load->view('data_master/tambah_karyawan');
            $this->load->view('template/footer');
        } else {
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $data['nama_kar'] = $this->input->post('nama');
            $data['alamat_kar'] = $this->input->post('alamat');
    
            // echo "<pre>";
            // print_r($data);  // Print data for debugging
            // echo "</pre>";
    
            $this->M_karyawan->insert($data);
    
            // Check for any database errors
            if ($this->db->error()['code']) {
                echo 'Database Error: ' . $this->db->error()['code'];
                echo '<br>';
                echo 'Error Message: ' . $this->db->error()['message'];
            }
    
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
            redirect(base_url('karyawan'));
        }
    }
    
    public function edit($id) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required'); // Ubah 'role' menjadi 'role_id'
    
        if ($this->form_validation->run() == FALSE) {
            $data['karyawan'] = $this->M_karyawan->getId($id);
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header', $data);
            $this->load->view('data_master/edit_karyawan', $data);
            $this->load->view('template/footer');
        } else {
            $data['nama_kar'] = $this->input->post('nama');
            $data['alamat_kar'] = $this->input->post('alamat');
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $data['role_id'] = $this->input->post('role_id');
    
            // Periksa apakah username unik, tambahkan validasi manual
            $existing_username = $this->M_karyawan->checkUsername($id, $data['username']);
            if ($existing_username) {
                $this->session->set_flashdata('pesan', 'Username sudah digunakan oleh karyawan lain.');
                redirect(base_url('karyawan/edit/' . $id));
            }
    
            $this->M_karyawan->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect(base_url('karyawan'));
        }
    }
    
    

    public function delete($id) {
        $this->M_karyawan->delete($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect(base_url('karyawan'));
    }
}
?>
