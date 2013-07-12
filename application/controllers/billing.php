<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Billing extends CI_Controller{ 

		var $table = "tb_trade";

		function __construct()
		 {
		 	parent::__construct(); 
		  	$this-> Data_model -> setTable("tb_trade") ;
		 }


		 function index()
		 {
		 	
			$uid = $this->session->userdata('LOGIN_USERID'); 
			$data["table"] = $this ->  Data_model -> getData("","id desc"); 			
		 	$this -> load -> view("billing",$data);
		 }

		 function charge()
		 {
		 	$this -> load -> view("charge");
		 }

		 /**
		  * 在线充值
		  */
		 function chargeSubmit()
		 {
		 	$money = $_REQUEST["money"]; 
		 	if($money > 0 ){

		 		$this -> load -> model("Customer_model");
			 	$uid = $this->session->userdata('LOGIN_USERID'); 
	   			$tradeNum = date("Ymd")."xxxx"; //交易号 
	   			
	   			$balance = $this -> Customer_model -> getBalance($uid);
	   			$total = ( $balance + $money ) ;
	   			//
	   			//充值记录
	   			//
				$data = array( 'tradeNum' => $tradeNum ,'tradeType' => 1 ,'income' => $money, 'pay' => 0 ,'remainingSum' => $total ,  'tradeTime' => date("Y-m-d H:i:s") ,'optUser' => $uid , 'customerID' => $uid  ,   );  
				//$this-> Data_model -> setTable("tb_trade") ;
				$this-> Data_model -> addData($data); 

				//
				//更新用户帐户余额
				//
				
				$this-> Customer_model -> setBalance($uid,$total);
		 		

		 		//日志
			 	$this -> load -> model("Log_model");
			 	$this -> Log_model -> setLog(2,"在线充值".$money."元");

				 
			}
		 	$this -> load -> view("account");
		 }

	}	 


?>