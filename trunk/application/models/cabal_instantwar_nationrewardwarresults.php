<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_instantwar_nationrewardwarresults extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_event_singledg
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('Server01.dbo.cabal_instantwar_nationrewardwarresults', $limit, $offset);
	}

	function GetWhere($where, $limit, $offset) {
		return $this->db->get_where('Server01.dbo.cabal_instantwar_nationrewardwarresults', $where, $limit, $offset);
	}

//UPDATE

//INSERT


//DELETE

#############################################################################################################################
}
?>