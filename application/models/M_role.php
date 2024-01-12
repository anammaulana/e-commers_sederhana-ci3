<?php

// File: application/models/Roles_model.php
class M_role extends CI_Model {

    public function getRoles() {
        // Gantilah 'roles' dengan nama tabel atau metode pengambilan data roles Anda
        return $this->db->get('roles')->result();
    }

}

?>
