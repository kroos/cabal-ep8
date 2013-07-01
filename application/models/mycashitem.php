<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mycashitem extends CI_Model {
	function __construct() {
		parent::__construct();
	}
#############################################################################################################################
//CRUD for bank
//SELECT

//UPDATE

//INSERT
	function buy($UserNum, $ItemIdx, $ItemOpt, $DurationIdx) {
		return $this->db->query("exec CabalCash.dbo.up_AddMyCashItemByItem '$UserNum', '1', '{$this->config->item('svridx')}', '$ItemIdx', '$ItemOpt', '$DurationIdx'");
	}

//DELETE

#############################################################################################################################
}
?>