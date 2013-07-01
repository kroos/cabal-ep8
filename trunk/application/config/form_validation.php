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
					'welcome/index' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
							)
					),
					'welcome/register' => array
					(
						array
						(
							'field' => 'username',
							'label' => 'Username',
							'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|is_unique[cabal_auth_table.ID]|xss_clean'
						),
						array
						(
							'field' => 'password1',
							'label' => 'Password',
							'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
						),
						array
						(
							'field' => 'password2',
							'label' => 'Retype Password',
							'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|matches[password1]|xss_clean'
						),
						array
						(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email|is_unique[cabal_auth_table.Email]|xss_clean'
						),
						array
						(
							'field' => 'verify',
							'label' => 'Image Verification',
							'rules' => 'trim|required|is_natural|numeric|exact_length[5]|xss_clean'
						),
					),
					'welcome/resetp' =>array
					(
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|xss_clean'
							)
					),
					'welcome/topsd' => array
					(
						array
							(
								'field' => 'dungeon',
								'label' => 'Dungeon',
								'rules' => 'trim|required|xss_clean'
							),
					),
					'welcome/topgd' => array
					(
						array
							(
								'field' => 'dungeon',
								'label' => 'Dungeon',
								'rules' => 'trim|required|xss_clean'
							),
					),
					'shop/detail' => array
					(
						array
							(
								'field' => 'qty',
								'label' => 'Quantity',
								'rules' => 'trim|required|max_length[5]|greater_than[-1]|is_natural|xss_clean'
							),
					),
					'cabal/change_password' => array
					(
						array
							(
								'field' => 'currpasswd',
								'label' => 'Current Password',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
							),
						array
							(
								'field' => 'newpasswd',
								'label' => 'New Password',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|xss_clean'
							),
						array
							(
								'field' => 'rnewpasswd',
								'label' => 'Retype New Password',
								'rules' => 'trim|required|alpha_dash|max_length[8]|min_length[6]|matches[newpasswd]|xss_clean'
							),
					),
				);
/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
