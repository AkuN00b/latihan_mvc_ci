<?php defined('BASEPATH') or exit('No direct script access allowed');

class Materi_security_model extends CI_Model
{
	private $_table = "users";

	public function getAll() {
		return $this->db->get($this->_table)->result();
	}

	public function get_username($username) {
	    $query = $this->db->get_where($this->_table, array('username' => $username));
	    return $query;
	}

	public function getByUsernamePassword($username, $password) {
		$this->db->where('username', $username);
	    $this->db->where('password', $password);
	    $data = $this->db->get_where($this->_table, array('username' => $username, 'password' => $password))->row();
	    return $data;
	}

	public function save() {
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = $post["password"];
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->telepon = $post["telepon"];
		$this->role = $post["role"];

		return $this->db->insert($this->_table, $this);
	}

	public function update($username, $nama, $password, $role, $email, $telepon) {
		$data = array(
	      'username' => $username,
	      'nama' => $nama,
	      'password' => $password,
	      'role' => $role,
	      'email' => $email,
	      'telepon' => $telepon
	    );

	    $this->db->where('username', $username);
	    $this->db->update($this->_table, $data);
	}

	public function delete($username) {
	    $this->db->where('username', $username);
	    $this->db->delete($this->_table);
	}
}

?>