<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpmailer/class.phpmailer.php');

class Myphpmailer extends PHPMailer
	{
		function __construct()
			{
				// Call parent constructor
				parent::__construct();

				//callback config from Codeigniter
				$CI =& get_instance();

				$this->IsSMTP();
				$this->SMTPAuth = $CI->config->item('SMTP_auth');							//enable SMTP authentication, TRUE or FALSE
				$this->Host = $CI->config->item('smtp_server');								//smtp server
				$this->Port = $CI->config->item('smtp_port');								//change this port if you are using different port than mine
				$this->SMTPSecure = $CI->config->item('SMTP_Secure');						//tls or ssl

				$this->Username = $CI->config->item('username');							//email account username
				$this->Password = $CI->config->item('password');							//email account password
			}
	}
?>