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
					'cabal/rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[1]|is_natural_no_zero|xss_clean'
							)
					),
					'cabal/reset_rebirth' => array
					(
						array
							(
								'field' => 'character',
								'label' => 'Character',
								'rules' => 'trim|required|min_length[1]|is_natural_no_zero|xss_clean'
							)
					),
					'admin/info_account' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|alpha_numeric|xss_clean'
							)
					),
					'admin/edit_account' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|alpha_numeric|xss_clean'
							),
						array
							(
								'field' => 'type',
								'label' => 'Account Type',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'servicekind',
								'label' => 'Account Service Kind',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'date',
								'label' => 'Expire Date',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'admin/ban_account' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|alpha_numeric|xss_clean'
							),
						array
							(
								'field' => 'date',
								'label' => 'Expiry Date',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'admin/char_stats_search' => array
					(
						array
							(
								'field' => 'char',
								'label' => 'Character',
								'rules' => 'trim|required|alpha_numeric|xss_clean'
							)
					),
					'admin/char_stats' => array
					(
						array
							(
								'field' => 'str',
								'label' => 'Strength',
								'rules' => 'trim|required|is_natural|max_length[7]|xss_clean'
							),
						array
							(
								'field' => 'dex',
								'label' => 'Dexterity',
								'rules' => 'trim|required|is_natural|max_length[7]|xss_clean'
							),
						array
							(
								'field' => 'int',
								'label' => 'Intelligence',
								'rules' => 'trim|required|is_natural|max_length[7]|xss_clean'
							),
						array
							(
								'field' => 'pnt',
								'label' => 'Extra Points',
								'rules' => 'trim|required|is_natural|max_length[7]|xss_clean'
							),
						array
							(
								'field' => 'rnk',
								'label' => 'Rank',
								'rules' => 'trim|required|is_natural|max_length[15]|xss_clean'
							),
						array
							(
								'field' => 'alz',
								'label' => 'Alz',
								'rules' => 'trim|required|is_natural|max_length[15]|xss_clean'
							),
						array
							(
								'field' => 'style',
								'label' => 'Style',
								'rules' => 'trim|required|is_natural|max_length[15]|xss_clean'
							),
						array
							(
								'field' => 'wc',
								'label' => 'Warp Code',
								'rules' => 'trim|required|is_natural|max_length[4]|xss_clean'
							),
						array
							(
								'field' => 'mc',
								'label' => 'Map Code',
								'rules' => 'trim|required|is_natural|max_length[4]|xss_clean'
							),
						array
							(
								'field' => 'rp',
								'label' => 'RP',
								'rules' => 'trim|required|is_natural|max_length[15]|xss_clean'
							),
						array
							(
								'field' => 'reput',
								'label' => 'Reputation',
								'rules' => 'trim|required|is_natural|max_length[15]|xss_clean'
							),
						array
							(
								'field' => 'nat',
								'label' => 'Nation',
								'rules' => 'trim|required|is_natural|max_length[2]|xss_clean'
							),
						array
							(
								'field' => 'rb',
								'label' => 'Rebirth',
								'rules' => 'trim|required|is_natural|max_length[2]|xss_clean'
							),
						array
							(
								'field' => 'rs',
								'label' => 'Reset',
								'rules' => 'trim|required|is_natural|max_length[2]|xss_clean'
							)
					),
					'admin/gmip' => array
					(
						array
							(
								'field' => 'from',
								'label' => 'From IP Address',
								'rules' => 'trim|required|valid_ip|xss_clean'
							),
						array
							(
								'field' => 'to',
								'label' => 'To IP Address',
								'rules' => 'trim|required|valid_ip|xss_clean'
							),
					),
					'admin/block_ip' => array
					(
						array
							(
								'field' => 'from',
								'label' => 'From IP Address',
								'rules' => 'trim|required|valid_ip|xss_clean'
							),
						array
							(
								'field' => 'to',
								'label' => 'To IP Address',
								'rules' => 'trim|required|valid_ip|xss_clean'
							),
					),
					'shopadmin/add_item' => array
					(
						array
							(
								'field' => 'item_name',
								'label' => 'Item Name',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'item_desc',
								'label' => 'Item Description',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'item_id',
								'label' => 'Item Id',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_opt',
								'label' => 'Item Option',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'iduration',
								'label' => 'Duration',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_img',
								'label' => 'Item Image',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'item_alz',
								'label' => 'Item Alz Cost',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_cat',
								'label' => 'Item Category',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_avail',
								'label' => 'Item Available',
								'rules' => 'trim|required|is_natural|xss_clean'
							)
					),
					'shopadmin/edit_item' => array
					(
						array
							(
								'field' => 'item_name',
								'label' => 'Item Name',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'item_desc',
								'label' => 'Item Description',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'item_id',
								'label' => 'Item Id',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_opt',
								'label' => 'Item Option',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'iduration',
								'label' => 'Duration',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_img',
								'label' => 'Item Image',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'item_alz',
								'label' => 'Item Alz Cost',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_cat',
								'label' => 'Item Category',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'item_avail',
								'label' => 'Item Available',
								'rules' => 'trim|required|is_natural|xss_clean'
							)
					),
					'shopadmin/category' => array
					(
						array
							(
								'field' => 'cat',
								'label' => 'Category',
								'rules' => 'trim|required|alpha_dash|xss_clean'
							)
					),
				);
/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
