<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();
		//mesti ikut peraturan ni..
		//user mesti log on kalau tidak redirect to index
		if ($this->session->userdata('logged_in') === FALSE) {
			redirect('/welcome/index', 'location');
		}
	}

	public function index() {
		$this->load->view('user/home');
	}

	public function donate() {
		$this->load->view('user/donate');
	}

#############################################################################################################################
//error 404
		public function page_missing() {
			$this->load->view('error/404');
		}

#############################################################################################################################
//logout
		public function logout() {
			if ($this->session->userdata('logged_in') === TRUE) {
				//process
				$array = array 
						(
							'authkey' => '',
							'id_user' => '',
							'username' => '',
							'password' => '',
							'logged_in' => FALSE
						);
				$this->session->unset_userdata($array);
				redirect('welcome/index', 'location');
			} else {
				redirect('cabal/index', 'location');
			}
		}

#############################################################################################################################
}

/* End of file cabal.php */
/* Location: ./application/controllers/cabal.php */