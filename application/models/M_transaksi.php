<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function get_barang()
    {
        return $this->db->get('tbl_barang')->result();
    }

    public function get_category()
    {
        return $this->db->get('tbl_category')->result();
    }

    public function get_custumer()
    {
        return $this->db->get('tbl_custumer')->result();
    }
    
   

    
    public function get_allbarang() {
        // Query untuk mendapatkan data barang
        $query = $this->db->get('tbl_barang');
        return $query->result();
    }

    public function get_allcategory() {
        // Query untuk mendapatkan data kategori
        $query = $this->db->get('tbl_category');
        return $query->result();
    }

    public function get_allcustomer() {
        // Query untuk mendapatkan data pelanggan
        $query = $this->db->get('tbl_custumer');
        return $query->result();
    }

    public function simpan_transaksi($data) {
        // Query untuk menyimpan data transaksi ke dalam tabel
        $this->db->insert('tbl_transaksi', $data);
    }

    public function getTransaksi() {
        return $this->db->count_all('tbl_transaksi'); // 'karyawan' adalah nama tabel karyawan
    }
}
