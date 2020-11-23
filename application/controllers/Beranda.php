<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }
  public function index()
  {
    $data['judul'] = "BTis | Beranda";
    $data['user'] = $this->User_model->cekData('email', $this->session->userdata('email'));
    $data['kontak'] = $this->Produk_model->getOneData('kontak');

    $data['hero'] = $this->Produk_model->getMaxJual(2);
    $data['unggulan'] = $this->Produk_model->getMaxJual(6);
    $data['diskon'] = $this->Produk_model->getDiskonJoin();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('beranda');
    $this->load->view('templates/footer');
  }
}