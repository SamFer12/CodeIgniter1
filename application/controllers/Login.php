<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->backend->views('login');
	}
	public function Login() {
		
	}
	public function auth()
	{
		$data = $this->input->post();

		$auth = array(
			'username' => $data['username'], 
			'password' => $data['password']
		);

		$query = $this->db->get_where('tbl_admin', $auth);

		if ($query->num_rows() > 0){
			$userdata = array(
				'userdata' => $query->row()
			);
			$this->session->set_userdata($userdata);

			echo "<script>alert('Login berhasil')</script>
			<meta http-equiv='refresh' content='0;../admin/Home'>";
		}else{
			echo "<script>alert('Login gagal');</script>
			<meta http-equiv='refresh' content='0;../Login'>";
		}
	}

	public function out()
	{
		session_destroy();
		redirect("Login");
	}
}
