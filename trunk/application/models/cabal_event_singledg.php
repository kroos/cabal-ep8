<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_event_singledg extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_event_singledg
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->order_by('passTime ASC')->get('Server01.dbo.cabal_event_singledg', $limit, $offset);
	}

	function GetWhere($where, $limit, $offset) {
		return $this->db->order_by('passTime ASC')->get_where('Server01.dbo.cabal_event_singledg', $where, $limit, $offset);
	}

//UPDATE

//INSERT


//DELETE

#############################################################################################################################
}
?>