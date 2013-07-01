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

		//load model
		$this->load->model(array('cabal_charge_auth', 'bank'));
	}

#############################################################################################################################
	public function index() {
		$this->load->view('user/home');
	}

	public function donate() {
		$this->load->view('user/donate');
	}

	public function change_password() {
		$data['acc'] = $this->cabal_auth_table->GetWhere(array('UserNum' => $this->session->userdata('id_user')), NULL, NULL);
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('changepass', TRUE)) {
				$cpass = $this->input->post('currpasswd', TRUE);
				$npass = $this->input->post('newpasswd', TRUE);
				$rnpass = $this->input->post('rnewpasswd', TRUE);
				if($cpass == $npass) {
					$data['info'] = 'Are you going to change your password or not? Your current password and your new password is the same';
				} else {
					$df = $this->cabal_auth_table->passwd($npass, $this->session->userdata('id_user'));
					if($df) {
						$array = array('password' => $cpass);
						$this->session->set_userdata($array);
						$data['info'] = 'Success change password';
					} else {
						$data['info'] = 'Please try again. I cant change your password at the moment';
					}
				}
			}
		}
		$this->load->view('user/change_password', $data);
	}

	public function account() {
		$this->load->model('cabal_warehouse_table');
		$data['warehouse'] = $this->cabal_warehouse_table->getalz($this->session->userdata('id_user'))->row();
		$data['bank'] = $this->bank->get_alz($this->session->userdata('id_user'))->row();

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->input->post('withdraw', TRUE)) {
			$this->form_validation->set_rules('alzwithdraw', 'Alz Withdraw', 'trim|required|is_natural_no_zero|xss_clean');
		} else {
			if ($this->input->post('deposit', TRUE)) {
				$this->form_validation->set_rules('alzdeposit', 'Alz Deposit', 'trim|required|is_natural_no_zero|xss_clean');
			}
		}

		if ($this->form_validation->run() == TRUE) {
			
		}

		$this->load->view('user/account', $data);
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