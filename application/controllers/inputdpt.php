
<?php

class Inputdpt extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');

	}

	function tambah(){
		$this->load->view('insertdpt');
	}

	function tambah_aksi(){
		$nim = $this->input->post('nim');
		$status = $this->input->post('status');

		$data = array(
			'nim' => $nim,
			'status' => $status
			);

		$this->m_data->input_data($data,'mahasiswa');
		redirect('');
	}

}
