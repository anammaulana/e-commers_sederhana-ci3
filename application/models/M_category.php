<?php

class M_category extends CI_Model {
    private $table = 'tbl_category';
    private $primary_key = 'id_category';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }
    public function getCategory() {
        // Ambil data kategori dari database
        $query = $this->db->get('tbl_category');
        return $query->result();
    }

    public function getId($id) {
        return $this->db->get_where($this->table, array($this->primary_key => $id))->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function edit($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, array($this->primary_key => $id));
    }

    public function getAllCategory() {
        return $this->db->count_all('tbl_category'); // 'karyawan' adalah nama tabel karyawan
    }
}
?>
