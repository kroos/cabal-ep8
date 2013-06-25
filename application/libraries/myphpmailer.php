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
				$this->SMTPAuth = $CI->config->item('smtp_auth');							//enable SMTP authentication, TRUE or FALSE
				$this->Host = $CI->config->item('smtp_server');								//smtp server
				$this->Port = $CI->config->item('smtp_port');								//change this port if you are using different port than mine
				$this->SMTPSecure = $CI->config->item('smtp_secure');						//tls or ssl
				$this->SMTPDebug = $CI->config->item('mailer_debug');						//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
				$this->Debugoutput = 'html';												//Ask for HTML-friendly debug output
				$this->IsHTML(TRUE);

				$this->Username = $CI->config->item('mailer_username');						//email account username
				$this->Password = $CI->config->item('mailer_password');						//email account password
			}
	}
?>