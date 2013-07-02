<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_warehouse_table extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for temp_account
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('Server01.dbo.cabal_warehouse_table', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('Server01.dbo.cabal_warehouse_table', $where, $limit, $offset);
			}

		function getalz($usernum)
			{
				return $this->db->query("exec Server01.dbo.cabal_tool_GetWarehouseAlz '$usernum'");
			}

//UPDATE
		function update($update, $where) {
			return $this->db->update('Server01.dbo.cabal_warehouse_table', $update, $where);
		}

		function setalz($usernum, $alz, $reserved)
			{
				return $this->db->query("exec Server01.dbo.cabal_tool_SetWarehouseAlz '$usernum', '$alz', '$reserved'");
			}

//INSERT


//DELETE

#############################################################################################################################
	}
?>