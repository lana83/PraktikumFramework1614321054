<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login(){
		$username = $this->input->post('Username');
		$password = $this->input->post('Password');

		$query = $this->db->where('username', $username)
							->where('password', md5($password))
							->get('admin');

		if($query->num_rows() > 0){
			$data = array(
				'username' => $username,
				'logged_in' => TRUE
				);

			$this->session->userdata($data);

			return TRUE;

		}else{
			return FALSE;
		}
	}
}