<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_hackuser_list extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for cabal_hackuser_list
//SELECT
	function GetAll($limit, $offset) {
		return $this->db->get('Account.dbo.cabal_hackuser_list', $limit, $offset);
	}

	function GetWhere($where , $limit, $offset) {
		return $this->db->get_where('Account.dbo.cabal_hackuser_list', $where ,$limit, $offset);
	}

//UPDATE
	function update($update, $where) {
		return $this->db->update('Account.dbo.cabal_hackuser_list', $update, $where);
	}

//INSERT
	function insert($insert) {
		return $this->db->insert('Account.dbo.cabal_hackuser_list', $insert);
	}

//DELETE
	function delete($update, $where) {
		return $this->db->delete('Account.dbo.cabal_hackuser_list', $delete, $where);
	}

//TRUNCATE
	function truncate() {
		return $this->db->query('truncate table Account.dbo.cabal_hackuser_list');
	}
#############################################################################################################################
	}
?>