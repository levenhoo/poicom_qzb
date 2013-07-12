<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	function __construct(){
  		parent::__construct();
	}	
	function login($username,$userpass){
		$query = $this->db->query("select id,userName,userPsw,userType,status from tb_user where userName='$username'");
		if($query->num_rows()>0){
			$user=$query->row_array();
			$uid=$user['id'];
			$username=$user['userName'];		
			$userpsw=$user['userPsw'];
			$usertype=$user['userType'];
			$status=$user['status'];
			if($status!=1){
				return "userunable";
			}
			if($userpass==$userpsw){
				$query = $this->db->query("select m.url from tb_authority a,tb_module m where a.moduleID=m.id and userID=$uid");
				$authority=$query->result_array();
				$moduleurls="|";
				foreach($authority as $key=>$item){
					$moduleurls=$moduleurls.$item['url']."|";
				}
				$moduleurls=$moduleurls."|";
				$session_array = array(
				'uid' => $uid,
				'username' => $username,
				'usertype' => $usertype,
				'status' => $status,
				'moduleurls' => $moduleurls,
				);
				$this->session->set_userdata($session_array);
				return "ok";
			}else{
				return "userpswerror";
			}
		}else{
			return "usernameerror";
		}
	}	
}