<?php
class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');

    }

    function index()
    {
        $data=
		[
			'title' => 'Login Admin'

		];
        $this->load->view('auth/header_auth',$data);
        $this->load->view('auth/form_login',$data);
        $this->load->view('auth/footer_auth',$data);
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
    
        $where = array(
            'username' => $username,
            'password' => $password
        );
    
        $user = $this->Login_model->data_login("tbl_karyawan", $where)->row();
    
        if ($user) {
            $data_session = array(
                'user_id' => $user->user_id,
                'nama' => $user->username,
                'role' => $user->role_id, // Ambil peran dari rekaman pengguna
                'status' => "login"
            );
    
            $this->session->set_userdata($data_session);
    
            // Redirect berdasarkan peran pengguna
            if ($user->role_id == 1) {
                // Admin
                redirect(base_url("Home"));
            } else {
                // Pengguna biasa
                redirect(base_url("Katalog"));
            }
        } else {
            echo "Username dan password salah!";
        }
    }
    

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
