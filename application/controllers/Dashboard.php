// MOCHAMAD RAKHA LUTHFI F - TELKOM UNIVERSITY - EVOTING SYSTEM

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('grocery_CRUD');
    $this->load->library('Image_moo');
    $this->load->model('Cms_model');
    $this->key = 'vjnanckalsadiowdk23rwiwdkdm9wdiijdn8f3nf8fvnsdvnskmada0aa0fe0e9vmew9ewfjevnew9ghr8ghr8hg8ew98efw8ghwvnw8gvrn8vnwjwe8ghwnaslmcaldmasskvmkal9gbgaakislm8ru89tdiejfef';
    $man = $this->session->userdata('man');
    if( !$man )
    {
      redirect(site_url());
    }
  }

  public function index()
  {
    redirect(site_url('dashboard/mhs'));
  }

  function mhs()
  {
    $crud = new grocery_CRUD();

    $crud->set_theme('bootstrap');
    $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
      ->set_subject('Mahasiswa');

    $crud->columns('nim','nama','jurusan','status');

    $styles = array('nim' => 'width: 100px; text-align: left; background-color: #FAD2D2;'
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



  function insertdpt()
  {
    $output->isi = 'insertdpt';
    $this->load->view('layout/wrapper', $output);

  }

  public function bem()
  {
    $crud = new grocery_CRUD();

    $crud->set_theme('bootstrap');
    $crud->set_table('calon_bem')
      ->set_subject('Calon KAHIM');

    $crud->columns('no','nama','photo');
    $crud->callback_column('photo', array($this,'_photo'));

    $crud->add_fields('no','nama','photo');
    $crud->edit_fields('no','nama','photo');
    $crud->required_fields("no","nama");

    $styles = array('no' => 'width: 80px; text-align: left; background-color: #FAD2D2;'
         );
    $crud->set_style($styles);

    $crud->set_field_upload('photo','assets/uploads/files');
    $crud->callback_after_insert(array($this,'_set_photo_bem'));
    $crud->callback_after_update(array($this,'_set_photo_bem'));

    $crud->display_as('no',"No Urut");
    $crud->display_as('nama',"Nama Calon");

    $output = $crud->render();

    $output->title = 'Calon BEM';
    $output->isi = 'output';
    $this->load->view('layout/wrapper', $output);
//    $this->load->view('example.php',(array)$output);
  }

  function _photo($value,$row)
  {
    return '<img src="'.base_url().'/assets/uploads/files/'.$row->photo.'" width="100px"></img><br>';
  }

  function _set_photo_bem($post_array,$value)
  {
    $image = $post_array['photo'];
    $no = $post_array['no'];
    $pic = 'bem_'.$no.'.jpg';

    $this->image_moo->load("./assets/uploads/files/".$image)
                    ->set_background_colour("#ffffff")
                    ->resize(300, 250, TRUE)
                    ->save("./assets/uploads/files/".$pic, $overwrite="TRUE")
                    ;
    $data = array (
      'photo' => $pic
    );
    $d = array (
      'table' => 'calon_bem',
      'where' => 'no = '.$no,
      'data' => $data
    );
    $this->Cms_model->update($d);

    if ($pic != $image) {
    unlink("./assets/uploads/files/".$image);
    }
    		if ($this->image_moo->error) print $this->image_moo->display_errors();

    return true;
    #		var_dump($post_array);die();
  }

  function _set_photo_dpm($post_array,$value)
  {
    $image = $post_array['photo'];
    $no = $post_array['no'];
    $jurusan = $post_array['jurusan'];
    $pic = $jurusan.'_'.$no.'.jpg';

    $this->image_moo->load("./assets/uploads/files/".$image)
                    ->set_background_colour("#ffffff")
                    ->resize(300, 250, TRUE)
                    ->save("./assets/uploads/files/".$pic, $overwrite="TRUE")
                    ;

    $data = array (
      'photo' => $pic
    );
    $d = array (
      'table' => 'calon_dpm',
      'where' => 'id = '.$value,
      'data' => $data
    );
    $this->Cms_model->update($d);

    if ($pic != $image) {
    unlink("./assets/uploads/files/".$image);
    }
    #		if ($this->image_moo->error) print $this->image_moo->display_errors();

    return true;
    #		var_dump($post_array);die();
  }

  public function suara($d='1')
  {
    if ($d=='1') {


      $crud = new grocery_CRUD();
      $crud->set_theme('bootstrap');
      $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
        ->set_subject('Mahasiswa');
      $output = $crud->render();

      $output->deadline = 'May 16, 2017 01:15:00';
      $output->key = $this->key;
      $output->title = 'Perhitungan Mundur';
      $output->isi = 'countdown';
      $this->load->view('layout/wrapper', $output);
    } elseif($d==$this->key) {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('mahasiswa')->unset_add()->unset_edit()->unset_delete()
      ->set_subject('Mahasiswa');
    $output = $crud->render();

    $d = array (
      'table' => 'calon_bem',
      'order' => 'no ASC'
    );
    $bem = $this->Cms_model->getAll($d);
    $output->title = 'Perhitungan Suara';
    $output->isi = 'suara';
    $output->bem = $bem;
    $this->load->view('layout/wrapper', $output);
  } else {
    redirect(site_url());
  }
  }

  public function lihatsuara()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() === FALSE)
    {
      redirect(site_url('dashboard/suara'));
    }
    else
    {
      $where = array
      (
        'username'=>$this->input->post('username'),
        'password'=>sha1($this->input->post('password'))
      );
      $select = 'username, password';
      $data = array (
        'table' => 'user',
        'where' => $where,
        'select' => $select
      );

      $cek = $this->Cms_model->getRow($data);
      $data['select'] = 'username, password, status';
      $userdata = $this->Cms_model->getDetail($data);
      foreach ($userdata as $list)
      {
        $status = $list['status'];
      }

      if($cek == 1 && $status == "admin")
      {
        $d = $this->key;
        redirect(site_url('dashboard/suara/'.$d));

      }

    }
  }


}
