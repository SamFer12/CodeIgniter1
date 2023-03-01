<?php
	class Backend {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance();
		}

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {
				$data['_header'] 				= $this->_ci->load->view('layout/header', $data, TRUE);
				$data['_menu'] 					= $this->_ci->load->view('layout/menu', $data, TRUE);
				$data['_mainContent'] 			= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view('layout/content', $data, TRUE);
				$data['_footer'] 				= $this->_ci->load->view('layout/footer', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('layout/template', $data, TRUE);
			}
		}
	}
	
?>
