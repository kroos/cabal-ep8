<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Model 
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
				return $this->db->get('Account.dbo.Captcha', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('Account.dbo.Captcha', $where ,$limit, $offset);
			}

#############################################################################################################################
//INSERT
		function insert($insert)
			{
				return $this->db->insert('Account.dbo.Captcha', $insert);
			}

#############################################################################################################################
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('Account.dbo.Captcha', $update, $where);
			}

#############################################################################################################################
//DELETE
		function delete($where)
			{
				return $this->db->delete('Account.dbo.Captcha', $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('Account.dbo.Captcha');
			}

#############################################################################################################################
	}
?>