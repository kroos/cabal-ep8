<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_blockip_list extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_blockip_list
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('Account.dbo.cabal_blockip_list', $limit, $offset);
	}

	function GetWhere($where , $limit, $offset) {
		return $this->db->get_where('Account.dbo.cabal_blockip_list', $where ,$limit, $offset);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('Account.dbo.cabal_blockip_list', $update, $where);
	}


//INSERT
	function add($from, $to) {
		return $this->db->query("exec Account.dbo.cabal_blockip '$from', '$to'");
	}

//DELETE
	function delete($where) {
		return $this->db->delete('Account.dbo.cabal_blockip_list', $where);
	}
#############################################################################################################################
}
?>