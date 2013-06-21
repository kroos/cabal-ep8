<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpmailer/class.pop3.php');

class Mypop3 extends POP3
	{
		function __construct()
			{
				// Call parent constructor
				parent::__construct();

				//callback config from Codeigniter
				$CI =& get_instance();

				$this->Authorise($CI->config->item('pop3_server'), $CI->config->item('pop3_port'), 30, $CI->config->item('username'), $CI->config->item('password'), 1);
			}
	}
?>