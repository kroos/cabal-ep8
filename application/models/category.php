<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model 
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
				return $this->db->get('CashShop.dbo.Category', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('CashShop.dbo.Category', $where ,$limit, $offset);
			}

#############################################################################################################################
//INSERT
		function insert($insert)
			{
				return $this->db->insert('CashShop.dbo.Category', $insert);
			}

#############################################################################################################################
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('CashShop.dbo.Category', $update, $where);
			}

#############################################################################################################################
//DELETE
		function delete($where)
			{
				return $this->db->delete('CashShop.dbo.Category', $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('CashShop.dbo.Category');
			}

#############################################################################################################################
	}
?>