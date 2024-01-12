<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('M_barang');
        $this->load->model('M_category');
        $this->load->library('form_validation');
    }

    private function listCategory()
    {
        $data_category = $this->M_category->getAll();
        foreach ($data_category as $key) {
            # code...    
            $list_category[$key->id_category] = $key->category;
        }
        return $list_category;
    }
    public function index()
    {
        $data['barang'] = $this->M_barang->getAll();
        $data['category'] = $this->M_category->getCategory();
        $data['username'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('data_master/tampil_barang', $data);
        $this->load->view('template/footer');
    }
    public function insert()
    {
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_validate_image'); // Gunakan aturan validasi gambar
    
        if ($this->form_validation->run() == FALSE) {
            $data['category'] = $this->listCategory();
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header', $data);
            $this->load->view('data_master/tambah_barang', $data);
            $this->load->view('template/footer');
        } else {
            $upload_config = [
                'upload_path'   => './uploads/image',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => 1024 * 5,
                'encrypt_name'  => TRUE,
            ];
    
            $this->load->library('upload', $upload_config);
    
            if (!$this->upload->do_upload('gambar')) {
                $error = ['error' => $this->upload->display_errors('<p>', '</p>')];
                $data['category'] = $this->listCategory();
                $data['username'] = $this->session->userdata('nama');
                $data['error'] = $error;
                $this->load->view('template/header', $data);
                $this->load->view('data_master/tambah_barang', $data);
                $this->load->view('template/footer');
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'nama_bar'     => $this->input->post('nama'),
                    'id_category'  => $this->input->post('category'),
                    'stok_bar'     => $this->input->post('stok'),
                    'harga_bar'    => $this->input->post('harga'),
                    'gambar'       => $upload_data['file_name'],
                ];
    
                $this->M_barang->insert($data);
    
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
                redirect('barang');
            }
        }
    }
    
    public function validate_image()
    {
        // Aturan validasi gambar di sini
        $allowed_types = ['image/gif', 'image/jpeg', 'image/png'];
    
        if (!in_array($_FILES['gambar']['type'], $allowed_types)) {
            $this->form_validation->set_message('validate_image', 'File yang diupload bukan gambar yang valid.');
            return FALSE;
        }
    
        return TRUE;
    }
    


    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = $this->M_barang->getId($id);
            $data['category'] = $this->listCategory();
            $data['username'] = $this->session->userdata('nama');
            $this->load->view('template/header', $data);
            $this->load->view('data_master/edit_barang', $data);
            $this->load->view('template/footer');
        } else {
            $data['nama_bar'] = $this->input->post('nama');
            $data['id_category'] = $this->input->post('category');
            $data['stok_bar'] = $this->input->post('stok');
            $data['harga_bar'] = $this->input->post('harga');
    
            // Upload gambar baru jika ada
            $config['upload_path'] = './uploads/image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('gambar')) {
                // Hapus gambar lama jika ada
                $old_image = $this->M_barang->getGambarById($id);
                if (!empty($old_image)) {
                    unlink('./uploads/image/' . $old_image);
                }
    
                // Ambil nama gambar yang baru diupload
                $data['gambar'] = $this->upload->data('file_name');
            }
    
            $this->M_barang->edit($id, $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect(base_url('barang'));
        }
    }
        public function delete($id)
    {
        $this->M_barang->delete($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect(base_url('barang'));
    }
}
