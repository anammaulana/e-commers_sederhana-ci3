<?php
class M_karyawan extends CI_Model
{
    private $table = 'tbl_karyawan';
    private $primary_key = 'id_karyawan';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getId($id)
    {
        return $this->db->get_where($this->table, array($this->primary_key => $id))->row();
    }
    public function checkUsername($id, $username)
    {
        // Memeriksa apakah ada karyawan dengan username yang sama kecuali karyawan dengan $id
        $this->db->where('id_karyawan !=', $id);
        $this->db->where('username', $username);
        $result = $this->db->get($this->table)->row();

        return ($result) ? true : false;
    }
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function edit($id, $data)
    {
        try {
            $this->db->where($this->primary_key, $id);
            $result = $this->db->update($this->table, $data);

            if (!$result) {
                throw new Exception("Gagal mengupdate data");
            }

            return true;
        } catch (Exception $e) {
            log_message('error', $e->getMessage()); // Log pesan kesalahan
            return false;
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array($this->primary_key => $id));
    }

    public function getJumlahKaryawan()
    {
        return $this->db->count_all($this->table);
    }
}
