<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("materi_security_model");
		// loading session library
		$this->load->library('session');

		if (!$this->session->userdata('logged_in')) {
	      redirect('login');
	    }
	}

	public function index()
	{
		$data["user"] = $this->materi_security_model->getRoleCount();
		$data["totalAdmin"] = $this->materi_security_model->getAdmin();
		$data["totalDosen"] = $this->materi_security_model->getDosen();

		$this->load->view('dashboard', $data);
	}
}
