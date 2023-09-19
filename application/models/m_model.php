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
    public function getData()
    {
        // Query database untuk mengambil data
        $query = $this->db->get('siswa');
        return $query->result();
    }
    public function getDataGuru()
    {
        // Query database untuk mengambil data
        $query = $this->db->get('guru');
        return $query->result();
    }
    public function get_by_id($tabel,$id_column,$id){
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function ubah_data($tabel,$data,$where){
        $data=$this->db->update($tabel,$data,$where);
        return $this->db->affected_rows();
    }
    function tambah_data($tabel, $data)
    {
       $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }
    function delete($table, $field, $id)
    {
        $data=$this->db->delete($table,array($field => $id));
        return $data;
    }
}
