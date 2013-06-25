<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
	{

		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				//mesti ikut peraturan ni..
				//user mesti log on kalau tidak redirect to index
				if ($this->session->userdata('logged_in') === TRUE)
					{
						redirect('/cabal/index', 'location');
					}
			}

		public function index()
			{
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
				{
					if($this->input->post('submit', TRUE))
					{
						$username = $this->input->post('username', TRUE);
						$password = $this->input->post('password', TRUE);
						
						$er = $this->cabal_auth_table->account($username, $password, $this->input->ip_address());
						$result = $er->row()->Result;
						if($result == 3){
							//SET @SUCCESS = 0
							//SET @NOT_FOUND_ID = 1
							//SET @BLOCK_ID = 2
							//SET @BLOCK_IP = 3
							$data['info'] = 'Your IP Address have been blocked. Please refer to the administrator';
						} else {
							if($result == 2) {
								$data['info'] = 'Your account have been blocked. Please refer to your administrator';
							} else {
								if($result == 1) {
									$data['info'] = 'Please check back your username and your password';
								} else {
									if($result == 0) {
										//success login
										$kl = $this->cabal_auth_table->GetWhere(array('ID' => $username), NULL, NULL);
										$usernum = $kl->row()->UserNum;
										$authkey = $kl->row()->AuthKey;
										$user = array(
														'authkey' => $authkey,
														'id_user' => $usernum,
														'username' => $username,
														'password' => $password,
														'logged_in' => TRUE
														);
										$this->session->set_userdata($user);
										redirect('cabal/index', 'location');
									}
								}
							}
						}
					}
				}
				$this->load->view('login', @$data);
			}

		public function donate() {
			$this->load->view('donate');
		}

		public function register() {
			//load helper captcha
			$this->load->helper('captcha');
			$this->load->model('captcha');
			$vals = array(
							'word' => rand(10000, 99999),
							'img_path' => './images/captcha/',
							'img_url' => base_url().'images/captcha/',
							//'font_path' => './path/to/fonts/texb.ttf',
							'img_width' => 150,
							'img_height' => 30,
							'expiration' => 1800
						);
				$data['cap'] = create_captcha($vals);
				//echo $data['cap']['word'];
				$this->captcha->insert(array('captcha_time' => $data['cap']['time'], 'ip_address' => $this->input->ip_address(), 'word' => $data['cap']['word']));

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE) {
					if($this->input->post('create_acc', TRUE)) {
						$username = $this->input->post('username', TRUE);
						$password1 = $this->input->post('password1', TRUE);
						$verify = $this->input->post('verify', TRUE);
						$email = $this->input->post('email', TRUE);
						if($username == $password1) {
							$data['info'] = 'Sorry, your username and your password is the same. Please choose another username or password';
							$this->captcha->delete(array('word' => $verify));
						} else {
							//we need to check the capthca
							$expiration = time()-1800; // Two hour limit
							//delete captcha 2 hours ago
							$this->captcha->delete(array('captcha_time <' => $expiration));							//check the new 1
							$check = $this->captcha->GetWhere(array('word' => $verify, 'ip_address' => $this->input->ip_address(), 'captcha_time >' => $expiration ), NULL, NULL)->num_rows();
							//echo $check.' check<br />';
							if($check == 0) {
								$data['info'] = 'You must submit the word that appears in the image';
								$this->captcha->delete(array('word' => $verify));
							} else {
								if($this->config->item('mailreg') == TRUE) {

									$this->load->helper('date');
									//insert into temporary account table
									$passkey = md5(uniqid(rand()));
									$date = mssqldate();

									//load model temp_account
									$this->load->model('temp_account');
									$arr = array(
													'Username' => $username,
													'Password' => $password1,
													'Email' => $email,
													'Passkey' => $passkey,
													'Date' => $date
												);
									$qu = $this->temp_account->insert($arr);
									if (!$qu) {
										$data['info'] = 'Error creating temporary account. Please try again later';
										$this->captcha->delete(array('word' => $verify));
									} else {
										//send mail to activate
										$subject = $this->config->item('server').' Private Server Activation Link For '.$username.' Account';
										$message = "<html>
													<head>
													<meta http-equiv='Content-Language' content='en-us'>
													<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
													<meta name='ProgId' content='FrontPage.Editor.Document'>
													<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
													<title>".$this->config->item('server')." Private Server Activation Link.</title>
													</head>
													<body>
													<p align='center'>Your username : $username</p>";
										$message .= "<p align='center'>This is your password : $password1</p>";
										$message .=	"<p align='center'><a href='".site_url()."'>".$this->config->item('server')." Private Server Account Management Tools</a></p>
													<p align='center'><a href='".site_url("welcome/activate/$passkey")."'>Click Here To Activate Your Account.</a></p>
													<p align='center'>You are receiving this e-mail because a user with an IP address of ".$this->input->ip_address()." signed up on <a href='".base_url()."'>".$this->config->item('server')." Private Server Account Management Tools</a> using your e-mail address. If this was not you, simply ignore this e-mail, and no further messages will be sent.</p>
													</body></html>";

										//load mailer
										$this->load->library(array('mypop3', 'myphpmailer'));

										$this->myphpmailer->AddReplyTo($this->config->item('from'), $this->config->item('from_name'));		//reply from who
										$this->myphpmailer->SetFrom($this->config->item('from'), $this->config->item('from_name'));			//from who?
										$this->myphpmailer->AddAddress($email, $username);														//recipient
		
										$this->myphpmailer->Subject = $subject;
										$this->myphpmailer->MsgHTML($message);
										$this->myphpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test
	
										if (!$this->myphpmailer->Send()) {
											$data['info'] = $this->myphpmailer->ErrorInfo;
											$this->captcha->delete(array('word' => $verify));
										} else {
											$data['info'] = 'Success sending activation email. Please activate your account through your email';
											$this->captcha->delete(array('word' => $verify));
										}
									}
								} else {
									//direct create account
									$rs = $this->cabal_auth_table->create($username, $password1, $email, 'none', 'none', $this->input->ip_address());
									if($rs) {
										$data['info'] = 'Success create account. Have fun !!';
										$this->captcha->delete(array('word' => $verify));
									} else {
										$data['info'] = 'Account creation fail. Please try again later';
										$this->captcha->delete(array('word' => $verify));
									}
								}
							}
						}
					}
				}
			$this->load->view('register', $data);
		}

		public function resetp() {
			$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post('forgot_password', TRUE)) {
					$username = $this->input->post('username', TRUE);
					$email = $this->input->post('email', TRUE);

					$df = $this->cabal_auth_table->GetWhere(array('Email' => $email, 'ID' => $username), NULL, NULL);

					if($df->num_rows() == 1) {
						//load password generator
						$this->load->helper(array('password'));
						$password = generatePassword(6, 1);

						//update password 1st
						$cv = $this->db->query("UPDATE Account.dbo.cabal_auth_table SET Password = CONVERT(VARBINARY(MAX), pwdencrypt('$password')) WHERE Email = '$email'");
						//echo $this->db->last_query();

						if ($cv) {
							if ($this->config->item('mailreg') == TRUE) {
								//send email
								$subject = 'Your Password For '.$this->config->item('server').' Private Server';
								$message = "<html>
											<head>
											<meta http-equiv='Content-Language' content='en-us'>
											<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
											<meta name='ProgId' content='FrontPage.Editor.Document'>
											<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
											<title>".$this->config->item('server')." Password Retrieval</title>
											</head>
											<body>
											<p align='center'>Your username : ".$username."</p>";
								$message .= "<p align='center'>This is your password for ".$this->config->item('server')." Private Server : ".$password."</p>";
								$message .=	"<p align='center'><a href='".base_url()."'>".$this->config->item('server')." Private Server Account Management Tools</a></p>
											</body>
											</html>";
								//load mailer
								$this->load->library(array('mypop3', 'myphpmailer'));
								$this->myphpmailer->AddReplyTo($this->config->item('from'), $this->config->item('from_name'));			//reply from who
								$this->myphpmailer->SetFrom($this->config->item('from'), $this->config->item('from_name'));				//from who?

								$this->myphpmailer->AddAddress($email, $username);														//recipient

								$this->myphpmailer->Subject = $subject;
								$this->myphpmailer->MsgHTML($message);
								$this->myphpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test
								if (!$this->myphpmailer->Send()) {
									$data['info'] = $this->myphpmailer->ErrorInfo;
								} else {
									$data['info'] = 'Please check your email. Your new password is inside the email';
								}
							} else {
								//dont send email.... daaaaaa.......
								$data['info'] = 'Please see administrator and tell him i dont have any method to tell you your new password except than email. Otherwise it will breach the security and your account might be compromised. Thank you '.$password;
							}
						} else {
							$data['info'] = 'Sorry, cant reset your password at the moment. Please try again later';
						}
					} else {
						$data['info'] = 'Please check your username and your email. We did not found such record.';
					}
				}
			}
			$this->load->view('resetp', @$data);
		}

		public function status() {
			$this->load->helper('port');
			$data['channels'] = $this->config->item('channels');
			$this->load->view('status', $data);
		}

		public function online() {
			$this->load->helper('cabaltime');
			$data['map'] = $this->config->item('map');
			$data['query'] = $this->cabal_character_table->GetWhere(array('Login >' => 0), NULL, NULL);
			$this->load->view('player_online', $data);
		}

		public function topchar() {
			$this->load->helper('decodecabalstyle');
			$data['query'] = $this->cabal_character_table->GetAll(NULL, NULL);
			$this->load->view('topchar', $data);
		}

		public function topcombo() {
			$this->load->model('cabal_record_combo');
			$data['query'] = $this->cabal_record_combo->GetAll(NULL, NULL);
			$this->load->view('topcombo', $data);
		}

		public function topsd() {
			$this->load->model('cabal_event_singledg');
			$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post('sd', TRUE)) {
					$sd = $this->input->post('dungeon', TRUE);
					$data['query'] = $this->cabal_event_singledg->GetWhere(array('dungeounName' => $sd), NULL, NULL);
				}
			}
			$data['info'] = '';
			$this->load->view('topsd', $data);
		}

		public function topgd() {
			$this->load->model('cabal_event_partydg');
			$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
			if ($this->form_validation->run() == TRUE) {
				if($this->input->post('gd', TRUE)) {
					$gd = $this->input->post('dungeon', TRUE);
					$data['query'] = $this->cabal_event_partydg->GetWhere(array('dungeounName' => $gd), NULL, NULL);
				}
			}
			$data['info'] = '';
			$this->load->view('topgd', $data);
		}

		public function nationwar() {
			$this->load->model('cabal_instantwar_nationrewardwarresults');
			$this->load->helper('decodecabalstyle');
			$data['query'] = $this->cabal_instantwar_nationrewardwarresults->GetAll(NULL, NULL);
			$this->load->view('nationwar', $data);
		}

		public function activate() {
			$this->load->model('temp_account');
			$activate = $this->uri->segment(3, 0);

			$y = $this->temp_account->GetWhere(array('Passkey' => $activate), NULL, NULL);

			$data['info'] = '';

			if($y->num_rows() != 1) {
				$data['info'] = 'Sorry, i can\'t find your activation code, probably your account have been activated or you didn\'t register at all';
			} else {
				if ($y->num_rows() == 1) {
					$username = $y->row()->Username;		//case sencitive
					$password = $y->row()->Password;
					$email = $y->row()->Email;

					$u = $this->cabal_auth_table->GetWhere(array('ID' => $username), NULL, NULL);
					$ue = $this->cabal_auth_table->GetWhere(array('Email' => $email), NULL, NULL);
					if($u->num_rows() == 1 || $ue->num_rows() == 1) {
						$data['info'] = 'Your username or your email have been registered. Please register again using another username or with another email';
					} else {
						$p = $this->cabal_auth_table->create($username, $password, $email, 'none', 'none', $this->input->ip_address());
						if (!$p) {
							$data['info'] = 'Error creating account account, please try again later';
						} else {
							$this->temp_account->delete(array('Passkey' => $activate));
							$data['info'] = 'Congratulations!! Your account have been activated.<br>Have fun in our server!';
						}
					}
				}
			}
			$this->load->view('activate', $data);
		}
#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('error/404');
			}

#############################################################################################################################
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */