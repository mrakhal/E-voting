
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('grocery_CRUD');
    $this->load->library('Image_moo');
    $this->load->model('Cms_model');
    $user = $this->session->userdata('user');
    if( !$user)
    {
      redirect(site_url());
    }
  }

  public function index()
  {
    $crud = new grocery_CRUD();

    $crud->set_theme('bootstrap');
    $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
      ->set_subject('Mahasiswa');

    $crud->columns('daftar','nim','nama','jurusan');
    $crud->callback_column('daftar', array($this,'_daftar'));

    $styles = array('nim' => 'width: 200px; text-align: left; background-color: #FAD2D2;',
          'daftar' => 'width: 100px; text-align: left; background-color: #FAD2D2;'
         );
    $crud->set_style($styles);

    $crud->where('status', '');

    $crud->display_as('nim',"NIM");
    $crud->display_as('nama',"Nama Mahasiswa");

    $output = $crud->render();

    $output->title = 'Mahasiswa';
    $output->isi = 'registrasi';
    $this->load->view('layout/wrapper', $output);
//    $this->load->view('example.php',(array)$output);
  }

  function mhs()
  {
    $crud = new grocery_CRUD();

    $crud->set_theme('bootstrap');
    $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()->unset_bootstrap()
      ->set_subject('Mahasiswa');

    $crud->columns('nim','nama','jurusan','status');

    $styles = array('nim' => 'width: 100px; text-align: left; background-color: #FAD2D2;',
          'status' => 'width: 100px; text-align: left; background-color: #FAD2D2;'
         );
    $crud->set_style($styles);

    $crud->display_as('nim',"NIM");
    $crud->display_as('nama',"Nama Mahasiswa");

    $output = $crud->render();

    $output->title = 'Mahasiswa';
    $output->isi = 'output';
    $this->load->view('layout/wrapper', $output);
//    $this->load->view('example.php',(array)$output);
  }

  public function _daftar($value,$row)
  {
    return '<a href="#" onClick="javascript:daftarmhs('.$row->nim.')"><div class="btn btn-info">DAFTAR</div></a>';
  }

  public function daftarmhs($nim)
  {
    $where = array (
      'nim' => $nim
    );
    $data = array (
      'status' => 'daftar'
    );
    $d = array (
      'table' => 'mahasiswa',
      'where' => $where,
      'data' => $data
    );
    $this->Cms_model->update($d);
    return true;
  }
}
