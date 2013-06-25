<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//error 404
		public function page_missing() {
			$this->load->view('error/404');
		}
#############################################################################################################################
}

/* End of file cabal.php */
/* Location: ./application/controllers/error.php */