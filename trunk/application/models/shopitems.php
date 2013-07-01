<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopitems extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for temp_account
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('CashShop.dbo.ShopItems', $limit, $offset);
	}

	function GetWhere($where, $limit, $offset) {
		return $this->db->get_where('CashShop.dbo.ShopItems', $where, $limit, $offset);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('CashShop.dbo.ShopItems', $update, $where);
	}
//INSERT

//DELETE


#############################################################################################################################
	}
?>