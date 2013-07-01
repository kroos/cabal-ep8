<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabal_auth_table extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for Cabal_auth_table
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('Account.dbo.cabal_auth_table', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('Account.dbo.cabal_auth_table', $where ,$limit, $offset);
			}

		function account($id, $password, $ip)
			{
				return $this->db->query("exec Account.dbo.cabalapp_check_account '$id', '$password', '$ip'");
			}

		function shopauth($usernum, $ip, $authkey) {
			return $this->db->query("exec Account.dbo.cabal_shop_check_authkey $usernum, '$ip', '$authkey'");
		}

//UPDATE
		function update($update, $where)
			{
				return $this->db->update('Account.dbo.cabal_auth_table', $update, $where);
			}

		function passwd($passwd, $usernum) {
			return $this->db->query("UPDATE Account.dbo.cabal_auth_table SET Password = pwdencrypt('$passwd') WHERE UserNum = $usernum");
		}
//INSERT
		function create($id, $password, $email, $question, $answer, $ip)
			{
				return $this->db->query("exec Account.dbo.cabal_tool_registerAccount_web '$id', '$password', '$email', '$question', '$answer', '$ip'");
			}

//DELETE

#############################################################################################################################
	}
?>