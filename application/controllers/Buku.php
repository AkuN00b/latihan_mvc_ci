<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Buku extends RestController {

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
			$user = $this->db->get('buku')->result();
		} else {
			$this->db->where('id', $id);
			$user = $this->db->get('buku')->result();
		}

		$this->response($user, 200);
	}

	function index_post() {
		$data = array (
			'nama'			=> $this->post('nama'),
			'jenis_buku'	=> $this->post('jenis_buku'),
			'vendor'		=> $this->post('vendor'),
			'jml_stok' 		=> $this->post('jml_stok'),
			'byUser'		=> $this->post('byUser')
		);

		$insert = $this->db->insert('buku', $data);

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
			'nama'			=> $this->put('nama'),
			'jenis_buku'	=> $this->post('jenis_buku'),
			'vendor'		=> $this->post('vendor'),
			'jml_stok' 		=> $this->post('jml_stok'),
			'byUser'		=> $this->post('byUser')
		);

		$this->db->where('id', $id);
		$update = $this->db->update('buku', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	function index_delete() {
		$id = $this->delete('id');
		$this->db->where('id', $id);
		$delete = $this->db->delete('buku');

		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}