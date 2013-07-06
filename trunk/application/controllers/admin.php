<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();
		//mesti ikut peraturan ni..
		//user mesti log on kalau tidak redirect to index
		$gm = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and ({$this->session->userdata('id_user')} * 8 + 5) AND Nation = 3", NULL, NULL);
		if ($this->session->userdata('logged_in') === FALSE  && ($gm->num_rows() < 1) ) {
			redirect('/welcome/index', 'location');
		}

		//load model
		$this->load->model(array('cabal_charge_auth', 'bank'));
	}

#############################################################################################################################
	public function index() {
		$this->load->view('admin/home');
	}

	public function online_chars() {
		//load helper
		$this->load->helper(array('date', 'cabaltime'));

		$data['query'] = $this->cabal_character_table->GetWhere(array('Login >' => 0), NULL, NULL);
		$this->load->view('admin/online_chars', $data);
	}

	public function char_offline() {
		$bil = $this->uri->segment(3, 0);
		if (is_numeric($bil)) {
			$da = $this->cabal_character_table->update(array('Login' => 0), array('CharacterIdx' => $bil));
			if($da) {
				redirect('admin/online_chars', 'location');
			} else {
				$data['info'] = 'Please try again later';
				$this->load->view('admin/online_chars', $data);
			}
		}
	}

	public function info_account() {
		$this->load->helper(array('date', 'cabaltime'));

		$data['type'] = $this->config->item('Type');
		$data['servicekind'] = $this->config->item('ServiceKind');

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('search', TRUE)) {
				$char = $this->input->post('char', TRUE);

				$data['query'] = $this->cabal_character_table->GetWhere("Name LIKE '%$char%'", NULL, NULL);
				$valid = $data['query']->num_rows();
				if ($valid == 1) {
					$charidx = $data['query']->row()->CharacterIdx;
					$f = fmod($charidx, 8);
					if (0 <= $f && $f <= 5) {
						$usernum = ($charidx - $f) / 8;
						$data['acc'] = $this->cabal_auth_table->GetWhere(array('UserNum' => $usernum), NULL, NULL);
						$data['auth'] = $this->cabal_charge_auth->GetWhere(array('UserNum' => $usernum), NULL, NULL);
						$data['char'] = $this->cabal_character_table->GetWhere("CharacterIdx between ($usernum * 8) and (($usernum * 8) + 5)", NULL, NULL);
					} else {
						$data['info'] = '';
					}
				} else {

				}
			}
		}
		$this->load->view('admin/info_account', $data);
	}

	public function edit_account() {
		$data['Type'] = $this->config->item('Type');
		$data['ServiceKind'] = $this->config->item('ServiceKind');

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('changeacc', TRUE)) {

				$char = $this->input->post('char', TRUE);
				$type = $this->input->post('type', TRUE);
				$servicekind = $this->input->post('servicekind', TRUE);
				$date = $this->input->post('date', TRUE);

				if ($type == 0 && $servicekind != 0) {
					$data['info'] = 'I cant change account ServiceKind other than <strong>'.$data['ServiceKind'][0].'</strong> if you choose account Type <strong>'.$data['Type'][0].'</strong>';
				} else {
					$da = $this->cabal_character_table->GetWhere(array('Name' => $char), NULL, NULL);
					if ($da->num_rows() < 1) {
						$data['info'] = 'Sorry, I cant find the character that you are looking for';
					} else {
						if ($da->num_rows() == 1) {
							$charidx = $da->row()->CharacterIdx;
							$f = fmod($charidx, 8);
							if (0 <= $f && $f <= 5) {
								$usernum = ($charidx - $f) / 8;
								$r = $this->cabal_charge_auth->update(array('Type' => $type, 'ExpireDate' => $date, 'ServiceKind' => $servicekind), array('UserNum' => $usernum));
								if($r) {
									$data['info'] = 'Success update data';
								} else {
									$data['info'] = 'Cant update the data. Please try again later';
								}
							}
						}
					}
				}
			}
		}
		$this->load->view('admin/edit_account', $data);
	}

	public function hackuserlog() {
		$this->load->model('cabal_hackuser_list');
		$data['query'] = $this->cabal_hackuser_list->GetAll(NULL, NULL);
		$this->load->view('admin/hackuserlog', $data);
	}

	public function del_hackuserlog() {
		$r = $this->cabal_hackuser_list->truncate();
		if($r) {
			$data['info'] = 'Successfully clear the log';
		} else {
			$data['info'] = 'Unable to delete all the logs. Please try again later';
		}
		$this->load->view('admin/hackuserlog', $data);
	}

	public function ban_account() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('banacc', TRUE)) {
				$char = $this->input->post('char', TRUE);
				$date = $this->input->post('date', TRUE);
				$data['query'] = $this->cabal_character_table->GetWhere(array('Name' => $char), NULL, NULL);
				$valid = $data['query']->num_rows();
				if ($valid == 1) {
					$charidx = $data['query']->row()->CharacterIdx;
					$f = fmod($charidx, 8);
					if (0 <= $f && $f <= 5) {
						$usernum = ($charidx - $f) / 8;
						$r = $this->cabal_auth_table->ban($usernum, $date, '2');
						if($r) {
							$data['info'] = 'Account banned';
						} else {
							$data['info'] = 'Cant ban the account. Please try again later';
						}
					}
				} else {
					$data['info'] = 'Sorry, I cant find '.$char.'. Make sure your spelling is correct or the character might been deleted';
				}
			}
		}
		$this->load->view('admin/ban_account', @$data);
	}

	public function unban_account() {
		$data['query'] = $this->cabal_auth_table->GetWhere(array('AuthType <>' => 1), NULL, NULL);
		$this->load->view('admin/unban_account', $data);
	}

	public function unban_user() {
		$usernum = $this->uri->segment(3, 0);
		if (is_numeric($usernum)) {
			$t = $this->cabal_auth_table->unban_user($usernum);
			if($t) {
				redirect('admin/unban_account', 'location');
			} else {
				$data['info'] = 'Please try again later';
			}
		} else {
			redirect(base_url(), 'location');
		}
	}

	public function char_stats_search() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('search', TRUE)) {
				$char = $this->input->post('char', TRUE);
				$data['query'] = $this->cabal_character_table->GetWhere(array('Name' => $char), NULL, NULL);
				$valid = $data['query']->num_rows();
				if ($valid == 1) {
					$charidx = $data['query']->row()->CharacterIdx;
					redirect('admin/char_stats/'.$charidx, 'location');
				} else {
					$data['info'] = 'Sorry, I cant find '.$char.'. Make sure your spelling is correct or the character might been deleted';
				}
			}
		}
		$this->load->view('admin/char_stats_search', @$data);
	}

	public function char_stats() {
		$this->load->helper('decodecabalstyle');
		$charidx = $this->uri->segment(3, 0);
		if (is_numeric($charidx)) {
			$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post('submit', TRUE)) {
					$str = $this->input->post('str', TRUE);
					$dex = $this->input->post('dex', TRUE);
					$int = $this->input->post('int', TRUE);
					$pnt = $this->input->post('pnt', TRUE);
					$rnk = $this->input->post('rnk', TRUE);
					$alz = $this->input->post('alz', TRUE);
					$style = $this->input->post('style', TRUE);
					$wc = $this->input->post('wc', TRUE);
					$mc = $this->input->post('mc', TRUE);
					$rp = $this->input->post('rp', TRUE);
					$reput = $this->input->post('reput', TRUE);
					$nat = $this->input->post('nat', TRUE);
					$rb = $this->input->post('rb', TRUE);
					$rs = $this->input->post('rs', TRUE);

					$style1 = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $charidx), NULL, NULL)->row()->Style;
					$str1 = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $charidx), NULL, NULL)->row()->STR;
					$dex1 = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $charidx), NULL, NULL)->row()->DEX;
					$int1 = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $charidx), NULL, NULL)->row()->INT;
					$where = array('CharacterIdx' => $charidx);
					$update = array(
										'STR' => ($str1 + $str),
										'DEX' => ($dex1 + $dex),
										'INT' => ($int1 + $int),
										'PNT' => $pnt,
										'Rank' => $rnk,
										'Alz' => $alz,
										'Style' => ($style1 + $style),
										'WarpBField' => $wc,
										'MapsBField' => $mc,
										'RP' => $rp,
										'Reputation' => $reput,
										'Nation' => $nat,
										'Rebirth' => $rb,
										'Reset' => $rs
									);
					$l = $this->cabal_character_table->update($update, $where);
					if($l) {
						$data['info'] = 'Success update the data';
					} else {
						$data['info'] = 'Unable to update the data. Please try again later';
					}
				}
			}
			$data['query'] = $this->cabal_character_table->GetWhere(array('CharacterIdx' => $charidx), NULL, NULL);
			$this->load->view('admin/char_stats', $data);
		}
	}

	public function gmip() {
		$this->load->model('cabal_GM_ip_table');
		$this->load->helper('gmip');

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('save', TRUE)) {
				$from = $this->input->post('from', TRUE);
				$to = $this->input->post('to', TRUE);
				$l = $this->cabal_GM_ip_table->add($from, $to);
				if($l) {
					$data['info'] = 'Success insert new IP address';
				} else {
					$data['info'] = 'Errrr... could you please try it again later?';
				}
			}
		}
		$data['q'] = $this->cabal_GM_ip_table->GetAll(NULL, NULL);
		$this->load->view('admin/gmip', $data);
	}

	public function del_gmip() {
		$this->load->model('cabal_GM_ip_table');
		$fr = $this->uri->segment(3, 0);
		$to = $this->uri->segment(4, 0);
		if (is_numeric($fr) && is_numeric($to)) {
			$kp = $this->cabal_GM_ip_table->delete(array('fromip' => $fr, 'toip' => $to));
			if($kp) {
				redirect('admin/gmip', 'location');
			}
		}
	}

	public function block_ip() {
		$this->load->model('cabal_blockip_list');
		$this->load->helper('gmip');
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('save', TRUE)) {
				$from = $this->input->post('from', TRUE);
				$to = $this->input->post('to', TRUE);
				$l = $this->cabal_blockip_list->add($from, $to);
				if($l) {
					$data['info'] = 'Success insert block IP address';
				} else {
					$data['info'] = 'Errrr... could you please try it again later?';
				}
			}
		}
		$data['q'] = $this->cabal_blockip_list->GetAll(NULL, NULL);
		$this->load->view('admin/block_ip', $data);
	}

	public function del_blockip() {
		$this->load->model('cabal_blockip_list');
		$fr = $this->uri->segment(3, 0);
		$to = $this->uri->segment(4, 0);
		if (is_numeric($fr) && is_numeric($to)) {
			$kp = $this->cabal_blockip_list->delete(array('fromip' => $fr, 'toip' => $to));
			if($kp) {
				redirect('admin/block_ip', 'location');
			}
		}
	}
#############################################################################################################################
//error 404
		public function page_missing() {
			$this->load->view('error/404');
		}

#############################################################################################################################
}

/* End of file cabal.php */
/* Location: ./application/controllers/cabal.php */