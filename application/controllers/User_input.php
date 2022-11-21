<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_input extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("materi_security_model");
		// loading session library
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('user_input');
	}

	public function tambah() {
		$user = $this->materi_security_model;
		$result = $user->save();
		if ($result > 0) $this->sukses();
		else $this->gagal();
	}

	function sukses() {
		redirect(site_url('user_lihat'));
	}

	function gagal() {
		echo "<script>alert('Input data Gagal')</script>";
	}

	public function update() {
	    $username = $this->input->post('username');
	    $nama = $this->input->post('nama');
	    $password = $this->input->post('password');
	    $role = $this->input->post('role');
	    $email = $this->input->post('email');
	    $telepon = $this->input->post('telepon');

		$this->materi_security_model->update($username,$nama,$password,$role,$email,$telepon);
	    redirect(site_url('user_lihat'));
	}
}
