<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_character_table extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for cabal_character_table
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('Server01.dbo.cabal_character_table', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('Server01.dbo.cabal_character_table', $where ,$limit, $offset);
			}

//UPDATE


//INSERT

//DELETE

#############################################################################################################################
	}
?>