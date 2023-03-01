<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {

	public function index()
	{
		$data = array(
			'title'		=> 'home',
		);
		$this->backend->views('admin/home', $data);
	}

}
