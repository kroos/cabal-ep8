<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################

//form validation through controller
//format
/*
$config = array	( 
					'controller/function' => array
					( 
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							)
					)
				);
*/
##################################################################################################
$config = array	( 
					'welcome/emailer' => array
					( 
						array
							(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'editor',
								'label' => 'Email Text',
								'rules' => 'trim|required|xss_clean'
							),
					)
				);
/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
