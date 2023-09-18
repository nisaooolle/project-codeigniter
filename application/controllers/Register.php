<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('m_model');
    }
  
    // untuk menampilkan folder admin/register
    public function index()
    {
      $this->load->view('auth/register');
    }

  public function register() {
      // Validasi form
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

      if ($this->form_validation->run() == FALSE) {
          // Jika validasi gagal, kembalikan ke halaman registrasi
          $this->load->view('registration');
      } else {
          // Jika validasi berhasil, simpan data ke database
          $email = $this->input->post('email');
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));

          // Simpan data ke database sesuai kebutuhan Anda
          $this->m_model->register_user($email,$username, $password);

          // Redirect ke halaman sukses atau login
          redirect('auth');
      }
  }
}