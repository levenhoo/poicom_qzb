<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Log_model extends CI_Model{
	 
	function __construct(){
  		parent::__construct();
  		$this ->  Data_model -> setTable("tb_log");   
	}
	
	/*
	 * 读取日志
	 */
	function getLog($uid){

		$where = array('optUser'=>$uid);
		return $this ->  Data_model -> getData($where);  
	} 

	/*
	 * 写日志
	 */
	function setLog($type,$content){

		$uid = $this->session->userdata("LOGIN_USERID");
		$data = array('logType' => $type, 'optUser' => $uid , 'optContent' => $content,'optTime' => date("Y-m-d H:i:s"));
		$this-> Data_model -> addData($data); 
	}
	
	function setLogin($user){ 

		//$this->CI->Data_model->setTable('usergroup');
		//$usergroup = $this->CI->Data_model->getSingle(array('id'=>$user['usergroup']));
		$newdata = array(
				'LOGIN_USERID' => $user['id'],
				'LOGIN_USERNAME' => $user['userName'],
				'LOGIN_BALANCE' => $user['remainingSum'],				
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