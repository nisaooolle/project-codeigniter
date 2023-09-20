<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->helper('my_helper');;
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true) {
      redirect(base_url() . 'auth');
    }
  }

  // untuk menampilkan folder admin/index
  public function dasboard()
    {
      $data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
      $data['guru'] = $this->m_model->get_data('guru')->num_rows();
      $this->load->view('admin/dasboard', $data);
    }

  public function siswa()
  {
    $data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
    $data['guru'] = $this->m_model->get_data('guru')->num_rows();
    $data['result'] = $this->m_model->getData();
    $this->load->view('admin/siswa', $data);
  }
  public function guru()
  {
    $data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
    $data['guru'] = $this->m_model->get_data('guru')->num_rows();
    $data['result'] = $this->m_model->getDataGuru();
    $this->load->view('admin/guru', $data);
  }

  public function tambah_siswa()
  {
   $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('admin/tambah_siswa',$data);
  }
  public function aksi_tambah_siswa()
  {
    $data = [
      'nama_siswa' => $this->input->post('nama'),
      'nisn' => $this->input->post('nisn'),
      'gender' => $this->input->post('gender'),
      'ttl' => $this->input->post('ttl'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan'),
    ];
    $this->m_model->tambah_data('siswa', $data);
    redirect(base_url('admin/siswa'));
  }
  public function tambah_guru()
  {
   $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('admin/tambah_guru',$data);
  }
  public function aksi_tambah_guru()
  {
    $data = [
      'nama_guru' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'gender' => $this->input->post('gender'),
    ];
    $this->m_model->tambah_data('guru', $data);
    redirect(base_url('admin/guru'));
  }

  public function update($id){
    $data['siswa']=$this->m_model->get_by_id('siswa' , 'id', $id)->result();
    // $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/update', $data);
  }

  public function aksi_update()
  {
    $data = array (
      'nama_siswa' => $this->input->post('nama'),
      'nisn' => $this->input->post('nisn'),
      'gender' => $this->input->post('gender'),
      'ttl' => $this->input->post('ttl'),
      'kelas' => $this->input->post('kelas'),
      'jurusan' => $this->input->post('jurusan'),
      // 'id_kelas' => $this->input->post('kelas'),
    );
    $eksekusi=$this->m_model->ubah_data('siswa', $data,array('id'=>$this->input->post('id')));
    if($eksekusi){
      $this->session->set_flashdata('sukses','berhasil');
      redirect(base_url('admin/siswa'));
    }
    else{
      $this->session->set_flashdata('error', 'gagal...');
      redirect(base_url('admin/siswa/update/'.$this->input->post('id')));
    }
  }

  public function aksi_update_guru()
  {
    $data = array (
      'nama_guru' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'gender' => $this->input->post('gender'),
      // 'id_kelas' => $this->input->post('kelas'),
    );
    $eksekusi=$this->m_model->ubah_data('guru', $data,array('id'=>$this->input->post('id')));
    if($eksekusi){
      $this->session->set_flashdata('sukses','berhasil');
      redirect(base_url('admin/guru'));
    }
    else{
      $this->session->set_flashdata('error', 'gagal...');
      redirect(base_url('admin/guru/update_guru/'.$this->input->post('id')));
    }
  }

  public function update_guru($id){
    $data['guru']=$this->m_model->get_by_id('guru' , 'id', $id)->result();
    // $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/update_guru', $data);
  }

  public function hapus_siswa($id)
  {
    $this->m_model->delete('siswa', 'id', $id);
    redirect(base_url('admin/siswa'));
  }
  public function hapus_guru($id)
  {
    $this->m_model->delete('guru', 'id', $id);
    redirect(base_url('admin/guru'));
  }
}
