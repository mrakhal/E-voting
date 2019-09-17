
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
    $this->load->model('Cms_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[8]|max_length[18]');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('loginmhs');
    }
    else
    {
      $where = array
      (
        'nim'=>$this->input->post('nim')
      );
      $select = 'nim';
      $data = array (
        'table' => 'mahasiswa',
        'where' => $where,
        'select' => $select
      );

      $cek = $this->Cms_model->getRow($data);
      $data['select'] = '*';
      $userdata = $this->Cms_model->getDetail($data);
      foreach ($userdata as $list)
      {
        $status = $list['status'];
      }

      if($cek == 1 && $status == "daftar")
      {
        $mhsdata = array
        (
          'nim'=>$this->input->post('nim'),
          'status'=>$status,
          'logged_in'=>TRUE
        );

        $this->session->set_userdata($mhsdata);

        redirect(site_url('pemilihan/'));
      }
      else
      {
        redirect(site_url('login'));
      }
    }
  }

	public function adm()
	{
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('login');
    }
    else
    {
      $where = array
			(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password')
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

				$mandata = array
				(
					'man'=>$this->input->post('username'),
					'status'=>$status,
          'logged_in'=>TRUE
				);

        $this->session->set_userdata($mandata);

        redirect(site_url('dashboard/'));
			}
      elseif ($cek == 1 && $status == "user")
      {
        $userdata = array
        (
          'user'=>$this->input->post('username'),
          'status'=>$status,
          'logged_in'=>TRUE
        );

        $this->session->set_userdata($userdata);

        redirect(site_url('registrasi/'));
      }
			else
			{
				redirect(site_url('login/adm'));
			}
    }
	}

  function logout()
	{
    $this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    //session_destroy();
		redirect(site_url('login'));
	}

}
