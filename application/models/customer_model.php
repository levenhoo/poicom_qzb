<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_model extends CI_Model{
	var $CI;
	function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();
	}
	
	/*function login($username,$userpass){
		$this->CI->Data_model->setTable('user');
		$user = $this->CI->Data_model->getSingle(array('username'=>$username));
		if(isset($user['status'])&&$user['status']==1&&$user['password']==md5pass($userpass,$user['salt'])){
			$this->CI->Data_model->editData(array('id'=>$user['id']),array('logincount'=>$user['logincount']+1,'lasttime'=>time()));
			$this->setLogin($user);
			return true;
		}else{
			return false;
		}
	}*/
	
	function setLogin($user){ 

		//$this->CI->Data_model->setTable('usergroup');
		//$usergroup = $this->CI->Data_model->getSingle(array('id'=>$user['usergroup']));
		$newdata = array(
				'LOGIN_USERID' => $user['id'],
				'LOGIN_USERNAME' => $user['userName'],
				'LOGIN_BALANCE' => $user['remainingSum'],
				/*'LOGIN_USERNAME' => $user['username'],*/
		);
		$this->CI->session->set_userdata($newdata);
	}
	
	function setBalance($uid,$money)
	{		
		$where = array('id' => $uid, );
		$data = array('remainingSum' => ( $money ), );
		$this-> Data_model -> editData($where,$data,'tb_customer'); 
		$this->session->set_userdata('LOGIN_BALANCE', $money);
		

	}

	function getBalance($uid)
	{
		$where = array('id' => $uid );  
		$this ->  Data_model -> setSelect('remainingSum');  
	   	$amount = $this ->  Data_model -> getSingle($where,'tb_customer');  
	   	return $amount["remainingSum"] ;
	}


	function logout(){
		$userdata = array(
				'uid' => '',
				'usergroup' => '',
				'username' => '',
		);
		$this->CI->session->unset_userdata($userdata);
	}
	
	
}