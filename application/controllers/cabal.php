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

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->input->post('withdraw', TRUE)) {
			$this->form_validation->set_rules('alzwithdraw', 'Alz Withdraw', 'trim|required|is_natural_no_zero|xss_clean');
		} else {
			if ($this->input->post('deposit', TRUE)) {
				$this->form_validation->set_rules('alzdeposit', 'Alz Deposit', 'trim|required|is_natural_no_zero|xss_clean');
			}
		}

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('withdraw', TRUE)) {
				$withdraw = $this->input->post('alzwithdraw', TRUE);
				$walz = $this->cabal_warehouse_table->getalz($this->session->userdata('id_user'))->row()->Alz - $withdraw;
				if ($walz < 0) {
					$data['info'] = 'Sorry, you withdraw more than you have in your warehouse';
				} else {
					$r = $this->cabal_warehouse_table->update(array('Alz' => $walz), array('UserNum' => $this->session->userdata('id_user')));
					$p = $this->bank->get_alz($this->session->userdata('id_user'))->row()->Alz + $withdraw;
					$m = $this->bank->update_alz($this->session->userdata('id_user'), $p);
					if (!$r && !$m) {
						$data['info'] = 'Sorry, internal server error. Please try again later';
					} else {
						$data['info'] = 'Success withdraw from warehouse to the bank';
					}
				}
			} else {
				if ($this->input->post('deposit', TRUE)) {
					$deposit = $this->input->post('alzdeposit', TRUE);
					$r = $this->bank->get_alz($this->session->userdata('id_user'))->row()->Alz - $deposit;
					if ($r < 0) {
						$data['info'] = 'Sorry, you withdraw more than you have in your bank.';
					} else {
						$b = $this->cabal_warehouse_table->getalz($this->session->userdata('id_user'))->row()->Alz + $deposit;
						$n = $this->bank->update_alz($this->session->userdata('id_user'), $r);
						$n1 = $this->cabal_warehouse_table->update(array('Alz' => $b), array('UserNum' => $this->session->userdata('id_user')));
						if (!$n && !$n1) {
							$data['info'] = 'Sorry, internal server error. Please try again later';
						} else {
							$data['info'] = 'Success withdraw from bank to the warehouse';
						}
					}
				}
			}
		}
		$data['warehouse'] = $this->cabal_warehouse_table->getalz($this->session->userdata('id_user'))->row();
		$data['bank'] = $this->bank->get_alz($this->session->userdata('id_user'))->row();
		$this->load->view('user/account', $data);
	}

	public function rebirth() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('rebirth', TRUE)) {
				$char = $this->input->post('character', TRUE);

				$t = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $char), NULL, NULL);

				//--------------------check level rebirth----------------------------
				$rblvl = $t->row()->Rebirth;

				//--------------------check char level--------------------------
				$charlvl = $t->row()->LEV;

				//--------------------check online----------------------------------
				$rbonline = $t->row()->Login;
				//echo $rbonline.' rbonline<br />';

				//--------------------check wz----------------------------------
				$t1 = $this->bank->get_alz($this->session->userdata('id_user'));
				$rbwz = $t1->row()->Alz;

				//---------------------------rebirth operation----------------------------------------------------
				//initializing lvl to rebirth
				$charlvlforrb = $rblvl + $this->config->item('rebirth_level');
				//initializing rebirth lvl
				$rblvlforrb = $rblvl + 1;
				//initializing wz for rebirth
				$wzforrb = $this->config->item('rebirth_wz') * $rblvl;
				//balance wz
				$sqlwz = $rbwz - $wzforrb;
				$sqlrblvl = $rblvl + 1;

				//check online
				if ($rbonline < 1) {
					//1st we check lvl
					if ($charlvl >= $charlvlforrb) {
						//then we check its wz
						if ($rbwz >= $wzforrb) {
							//change the exp value to 0
							$rssuccess1 = $this->bank->update_alz($char, $sqlwz);
							$rssuccess = $this->cabal_character_table->update(array('LEV' => 1, 'EXP' => 0, 'Rebirth' => $sqlrblvl), array('CharacterIdx' => $char));
							if (!$rssuccess && !$rssuccess) {
								$data['info'] = 'Sorry, internal server error, please try again later';
							} else {
								$data['info'] = "Successfully rebirth";
							}
						} else {
							$data['info'] = "You need at least $wzforrb Alz for rebirth level $rblvl";
						}
					} else {
						$data['info'] = "You need at least level $charlvlforrb for rebirth level $rblvl";
					}
				} else {
					$data['info'] = 'Character online. Please logoff from game and try again';
				}
			}
		}
		$data['query'] = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and (({$this->session->userdata('id_user')} * 8) + 5)", NULL, NULL);
		$this->load->view('user/rebirth', $data);
	}

	public function reset_rebirth() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('reset_rebirth', TRUE)) {
				$char = $this->input->post('character', TRUE);

				$t = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $char), NULL, NULL);

				//--------------------check level rebirth----------------------------
				$rblvl = $t->row()->Rebirth;

				//--------------------check char level--------------------------
				$charlvl = $t->row()->LEV;

				//--------------------check online----------------------------------
				$rbonline = $t->row()->Login;
				//echo $rbonline.' rbonline<br />';

				//--------------------check wz----------------------------------
				$t1 = $this->bank->get_alz($this->session->userdata('id_user'));
				$rbwz = $t1->row()->Alz;

				//---------------------------rebirth operation----------------------------------------------------
				//initializing lvl to rebirth
				$charlvlforrb = $rblvl + $this->config->item('rebirth_level');
				//initializing rebirth lvl
				$rblvlforrb = $rblvl + 1;
				//initializing wz for rebirth
				$wzforrb = $this->config->item('rebirth_wz') * $rblvl;
				//balance wz
				$sqlwz = $rbwz - $wzforrb;
				$sqlrblvl = $rblvl + 1;

				//---------------------------reset rebirth operation----------------------------------------------------
				//check online
				if ($rbonline < 1) {
					//1st we check rb times, it should be no more than 2 times rb
					if ($rblvl < $this->config->item('rrebirthcapped')) {
						//1st we check rebirth level
						if ($rblvl >= $this->config->item('rebirth_count')) {
							//then we check the wz
							if ($rbwz >= $this->config->item('alzresetrebirth')) {

								//initialize wz balance
								$wz = $rbwz - $this->config->item('alzresetrebirth');

								//initialize reset rb times
								$resetrb = $rblvl + 1;
								$rson1 = $this->bank->update_alz($char, $wz);

								$rson = $this->cabal_character_table->update(array('Rebirth' => 0, 'Reset' => $resetrb), array('CharacterIdx' => $char));
								if (!$rson && !$rson1) {
									$data['info'] = 'Sorry, internal server error, please try again later';
								} else {
									$data['info'] = 'Successful reset rebirth';
								}
							} else {
								$data['info'] = "Insufficient Alz, your character only have $rbwz Alz";
							}
						} else {
							$data['info'] = "Character rebirth level is $rblvl, Character needs to have at least rebirth level ".$this->config->item('rebirth_count')." to reset its rebirth";
						}
					} else {
						$data['info'] = 'You are now a god in this server, you cant reset rebirth anymore';
					}
				} else {
					$data['info'] = 'Character online. Please logoff from game and try again';
				}
			}
		}
		$data['query'] = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and (({$this->session->userdata('id_user')} * 8) + 5)", NULL, NULL);
		$this->load->view('user/reset_rebirth', $data);
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