<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temp_account extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for Captcha
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('Account.dbo.Temp_Account', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('Account.dbo.Temp_Account', $where ,$limit, $offset);
			}

#############################################################################################################################
//INSERT
		function insert($insert)
			{
				return $this->db->insert('Account.dbo.Temp_Account', $insert);
			}

#############################################################################################################################
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('Account.dbo.Temp_Account', $update, $where);
			}

#############################################################################################################################
//DELETE
		function delete($where)
			{
				return $this->db->delete('Account.dbo.Temp_Account', $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('Account.dbo.Temp_Account');
			}

#############################################################################################################################
	}
?>