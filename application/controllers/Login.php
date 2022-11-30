<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("materi_security_model");
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
	      	redirect('dashboard');
	    } else {
	    	$this->load->view('login');
	    }
	}

	public function ceklogin() 
	{
		$post = $this->input->post();
		if (isset($post["username"]) && isset($post["password"]))
		{
			// cek user
			$user = $this->materi_security_model;
			$data = $user->getByUsernamePassword($post['username'], $post['password']);

			if ($data != null) {
				$username = $data->username;
				$nama = $data->nama;
				$role = $data->role;
				$password = $data->password;

				// adding data to session
				$newdata = array (
					'user_username' => $username,
					'user_name'		=> $nama,
					'user_role'		=> $role,
					'logged_in'		=> TRUE
				);

				$this->session->set_userdata($newdata);

				if ($role == "Admin") {
					'<script>alert("Login Berhasil ' . $username . '")</script>';
					redirect(site_url('dashboard'));
				} else if ($role == "Dosen") {
					echo "<script>alert('Hallo Dosen?');</script>";
				}
			} else {
				$this->session->set_flashdata('message', 'Username atau Password Salah');
				echo "<script>window.history.back();</script>";
			}
		} else {
			$this->load->view('login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
    	redirect('login');
	}
}
