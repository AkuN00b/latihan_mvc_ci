<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_lihat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();

		$this->load->model("materi_security_model");
		//loading session library
		$this->load->library('session');
	}

	public function index()
	{
		$data["user"] = $this->materi_security_model->getAll();
		$this->load->view('user_lihat', $data);
	}

	// function index_get() {
	// 	$id = $this->get('username');

	// 	if ($id == '') {
	// 		$user = $this->db->get('users')->result();
	// 	} else {
	// 		$this->db->where('username', $id);
	// 		$user = $this->db->get('users')->result();
	// 	}

	// 	$this->response($user, 200);
	// }

	// function index_post() {
	// 	$data = array (
	// 		'username'	=> $this->post('username'),
	// 		'nama'		=> $this->post('nama'),
	// 		'password'	=> $this->post('password'),
	// 		'role'		=> $this->post('role'),
	// 		'email' 	=> $this->post('email'),
	// 		'telepon'	=> $this->post('telepon')
	// 	);

	// 	$insert = $this->db->insert('users', $data);

	// 	if ($insert) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

	// function index_put() {
	// 	$username = $this->put('username');
		
	// 	$data = array(
	// 		'username'	=> $this->put('username'),
	// 		'nama'		=> $this->put('nama'),
	// 		'password'	=> $this->put('password'),
	// 		'role'		=> $this->put('role'),
	// 		'email' 	=> $this->put('email'),
	// 		'telepon'	=> $this->put('telepon')
	// 	);

	// 	$this->db->where('username', $username);
	// 	$update = $this->db->update('users', $data);

	// 	if ($update) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

	// function index_delete() {
	// 	$username = $this->delete('username');
	// 	$this->db->where('username', $username);
	// 	$delete = $this->db->delete('users');

	// 	if ($delete) {
	// 		$this->response(array('status' => 'success'), 201);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }

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
