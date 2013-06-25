<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_record_combo extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for cabal_record_combo
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->order_by('cntcombo DESC')->get('Server01.dbo.cabal_record_combo', $limit, $offset);
	}

//UPDATE

//INSERT


//DELETE

#############################################################################################################################
}
?>