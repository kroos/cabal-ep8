<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_charge_auth extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_charge_auth
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('Account.dbo.cabal_charge_auth', $limit, $offset);
	}

	function GetWhere($where, $limit, $offset) {
		return $this->db->get_where('Account.dbo.cabal_charge_auth', $where, $limit, $offset);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('Account.dbo.cabal_charge_auth', $update, $where);
	}

	function update_acc($usernum, $type, $date, $servicekind) {
		return $this->db->where(array('UserNum' => $usernum))->update('cabal_charge_auth', array('Type' => $type, 'ExpireDate' => $date, 'ServiceKind' => $servicekind));
	}

//INSERT

//DELETE

#############################################################################################################################
}
?>