<?php

class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    public function register_user($email,$username, $password) {
        $data = array(
            'email' => $email,
            'username' => $username,
            'password' => $password
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('admin', $data);
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
}
