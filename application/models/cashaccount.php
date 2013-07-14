<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashaccount extends CI_Model 
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
				return $this->db->get('CabalCash.dbo.CashAccount', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('CabalCash.dbo.CashAccount', $where ,$limit, $offset);
			}

#############################################################################################################################
//INSERT
		function insert($insert)
			{
				return $this->db->insert('CabalCash.dbo.CashAccount', $insert);
			}

#############################################################################################################################
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('CabalCash.dbo.CashAccount', $update, $where);
			}

#############################################################################################################################
//DELETE
		function delete($where)
			{
				return $this->db->delete('CabalCash.dbo.CashAccount', $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('CabalCash.dbo.CashAccount');
			}

#############################################################################################################################
	}
?>