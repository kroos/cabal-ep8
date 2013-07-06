<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_GM_ip_table extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_GM_ip_table
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('Account.dbo.cabal_GM_ip_table', $limit, $offset);
	}

	function GetWhere($where , $limit, $offset) {
		return $this->db->get_where('Account.dbo.cabal_GM_ip_table', $where ,$limit, $offset);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('Account.dbo.cabal_GM_ip_table', $update, $where);
	}


//INSERT
	function add($from, $to) {
		return $this->db->query("exec Account.dbo.cabal_addgmip '$from', '$to'");
	}

//DELETE
	function delete($where) {
		return $this->db->delete('Account.dbo.cabal_GM_ip_table', $where);
	}
#############################################################################################################################
}
?>