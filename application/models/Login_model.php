<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function data_login($table, $where)
	{
        return $this->db->get_where($table, $where);
	}
	
	public function register_user($data) {
        $this->db->insert('tbl_karyawan', $data);
        return $this->db->insert_id();
    }
}
