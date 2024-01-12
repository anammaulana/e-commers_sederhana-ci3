<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function get_laporan_transaksi() {
        // Query untuk mendapatkan data transaksi
        $query = $this->db->get('tbl_transaksi');
        return $query->result();
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
}
