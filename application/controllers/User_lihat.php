<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_lihat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("materi_security_model");
		// loading session library
		$this->load->library('session');
	}

	public function index()
	{
		$data["user"] = $this->materi_security_model->getAll();
		$this->load->view('user_lihat', $data);
	}

	public function hapus() {
		$username = $this->uri->segment(3);
	    $this->materi_security_model->delete($username);
	    redirect('User_lihat');
	}

	public function edit() {
		$username = $this->uri->segment(3);
	    $result = $this->materi_security_model->get_username($username);

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        $data = array(
	            'username'    => $i['username'],
	            'nama'  => $i['nama'],
	            'password'     => $i['password'],
	            'role'     => $i['role'],
	            'email'     => $i['email'],
	            'telepon'     => $i['telepon']
	        );

	        $this->load->view('user_edit',$data);
	    } else {
	    	echo "<script>alert('Data Was Not Found'); </script>";
	    	echo "<script>window.history.back(); </script>";
	    }
	}
}
