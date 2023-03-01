<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_members');
		$this->load->model('M_parkir');



		if (isset($this->session->userdata('userdata')->username)){
			$arr = array(
				'username'	=> $this->session->userdata('userdata')->username
			);
			$this->userdata = $this->M_members->select($arr)->row();
		}

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('userdata') == '') {
			redirect('Login');
		}
	}

}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */