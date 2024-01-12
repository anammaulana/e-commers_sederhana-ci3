<?php

class M_barang extends CI_Model {
    private $table = 'tbl_barang';
    private $primary_key = 'id_barang';

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
    public function getGambarById($id)
    {
        $this->db->select('gambar');
        $this->db->from('tbl_barang'); // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id_barang', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->gambar;
        } else {
            return null;
        }
    }
  
}
?>
