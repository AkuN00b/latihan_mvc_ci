<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Users extends RestController {

	public function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();

		//$this->load->model("materi_security_model");
		// loading session library
		//$this->load->library('session');
	}

	function index_get() {
		$id = $this->get('id');

		if ($id == '') {
			$user = $this->db->get('users')->result();
		} else {
			$this->db->where('id', $id);
			$user = $this->db->get('users')->result();
		}

		$this->response($user, 200);
	}

	function index_post() {
		$data = array (
			'nama'			=> $this->post('nama'),
			'username'		=> $this->post('username'),
			'password'		=> $this->post('password'),
			'role' 			=> $this->post('role')
		);

		$insert = $this->db->insert('users', $data);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_put() {
		$id = $this->put('id');
		
		$data = array(
			'id'			=> $this->put('id'),
			'nama'			=> $this->post('nama'),
			'username'		=> $this->post('username'),
			'password'		=> $this->post('password'),
			'role' 			=> $this->post('role')
		);

		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_delete() {
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');

		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}