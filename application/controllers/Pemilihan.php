
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('grocery_CRUD');
    $this->load->library('Image_moo');
    $this->load->model('Cms_model');
    $nim = $this->session->userdata('nim');
    if( !$nim )
    {
      redirect(site_url());
    }

    //cek status
    $status = $this->session->userdata('status');
    if ($status != 'daftar') {
      redirect(site_url('login/'));
    }
    //Codeigniter : Write Less Do More
  }
    //Codeigniter : Write Less Do More

  public function index()
  {
    redirect(site_url('pemilihan/bem/'));
  }

  public function bem()
  {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
      ->set_subject('Mahasiswa');
    $output = $crud->render();

    $d = array (
      'table' => 'calon_bem',
      'order' => 'no ASC',
    );
    $bem = $this->Cms_model->getAll($d);
    $output->title = 'Mahasiswa';
    $output->calon = $bem;
    $output->isi = 'pemilihanbem';
    $this->load->view('layout/navbaruser', $output);
  }

  public function setbem()
  {
    $bem = $this->input->post('id');
    if($bem)
    {
      $data = array (
        'bem' => $bem
      );
      $this->session->set_userdata($data);

      redirect(site_url('pemilihan/success'));
    }
    else
    {
      redirect(site_url('pemilihan/bem'));
    }
  }

  public function success()
  {
    $bem = $this->session->userdata('bem');
    // $dpm = $this->session->userdata('dpm');

    if(!$bem)
    {
      redirect(site_url('pemilihan/bem'));
    }
    // elseif (!$dpm) {
    //   redirect(site_url('pemilihan/dpm'));
    // }
    else
    {
      //suara bem update
      $where = array ('no' => $bem );
      $d = array (
        'select' => 'suara',
        'table' => 'calon_bem',
        'where' => $where
      );
      $calon_bem = $this->Cms_model->getDetail($d);
      foreach ($calon_bem as $key => $v) {
        $suara_bem = $v['suara'];
      }
      $suara_bem += 1;

      $where = array ('no' => $bem );
      $data = array ('suara' => $suara_bem );
      $d = array (
        'table' => 'calon_bem',
        'data' => $data,
        'where' => $where
      );
      $this->Cms_model->update($d);

      //suara dpm update
      // $where = array ('id' => $dpm );
      // $d = array (
      //   'select' => 'suara',
      //   'table' => 'calon_dpm',
      //   'where' => $where
      // );
      // $calon_dpm = $this->Cms_model->getDetail($d);
      // foreach ($calon_dpm as $key => $v) {
      //   $suara_dpm = $v['suara'];
      // }
      // $suara_dpm += 1;
      //
      // $where = array ('id' => $dpm );
      // $data = array ('suara' => $suara_dpm );
      // $d = array (
      //   'table' => 'calon_dpm',
      //   'data' => $data,
      //   'where' => $where
      // );
      // $this->Cms_model->update($d);

      //status change
      $mhsdata = array (
        'status' => 'success'
      );
      $this->session->set_userdata($mhsdata);

      $nim = $this->session->userdata('nim');
      $where = array ('nim' => $nim );
      $data = array ('status' => 'success' );
      $d = array (
        'table' => 'mahasiswa',
        'data' => $data,
        'where' => $where
      );
      $this->Cms_model->update($d);


      //success
      $crud = new grocery_CRUD();
      $crud->set_theme('bootstrap');
      $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
        ->set_subject('Mahasiswa');
      $output = $crud->render();


      $output->title = 'Terima Kasih Telah Berpartisipasi';
      $output->isi = 'success';
      $this->load->view('layout/navbaruser', $output);
    }
  }
}
