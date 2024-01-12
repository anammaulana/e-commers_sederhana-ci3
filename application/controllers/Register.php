<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $data['title'] = 'Register';

        $this->load->view('auth/header_auth', $data);
        $this->load->view('auth/form_register', $data);
        $this->load->view('auth/footer_auth', $data);
    }

    public function aksi_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_kar', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/header_auth');
            $this->load->view('auth/form_register');
            $this->load->view('auth/footer_auth');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'nama_kar' => $this->input->post('nama_kar'),
                'password' => md5($this->input->post('password'))
            );

            $this->Login_model->register_user($data);

            $this->session->set_flashdata('success_message', 'Registration successful. Please login.');

            redirect(base_url('login'));
        }
    }
}
