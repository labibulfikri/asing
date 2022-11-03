<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->library('session');
  }


  public function index($data = NULL, $page = NULL)
  {
    $this->load->view('login/login2');
  }



  public function cek_login()
  {

    $user_name = $this->input->post('user_name');
    $password = $this->input->post('password');

    $where = array(
      'user_name' => $user_name,
      'user_password' => md5 ($password)
    );
    $cek = $this->m_login->verify("s_user", $where)->num_rows();
    $dt = $this->m_login->verify("s_user", $where)->row();

    if ($cek >= 1) {

      $data_session = array(
        'status' => "login",
        'level' => $dt->level,
        'nama' => $dt->user_name
      );

      $this->session->set_userdata($data_session);
      $this->session->set_flashdata('pesan', $user_name);
    } else {
      echo $this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
           <h4><i class='icon glyphicon glyphicon-remove'></i> Coba Lagi !</h4> Login Gagal
    </div>");

      redirect(base_url("c_login"));
    }
    redirect(base_url("c_dashboard"));
  }

  function log_out()
  {
    $this->session->sess_destroy();
    redirect(base_url("c_dashboard"));
  }
}
