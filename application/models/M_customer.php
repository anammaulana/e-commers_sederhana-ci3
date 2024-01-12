<?php

class M_customer extends CI_Model {
    private $table = 'tbl_custumer';
    private $primary_key = 'id_cust';

    public function getAll() {
        return $this->db->get($this->table)->result();
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

    public function getCustomer() {
        return $this->db->count_all('tbl_custumer'); // 'karyawan' adalah nama tabel karyawan
    }
}
?>
