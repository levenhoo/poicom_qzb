<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Controller{ 


		function __construct()
		 {
		  parent::__construct();
	 
		 }

		 



		function index($test="")
		{  
			$this->load->view('login' );  
		}

		function register(){
			 $this->load->view('register' ); 
		}

		function quit(){
			$this->session->sess_destroy();
			echo "<script>location.href='/index.php/user/index'</script>";
		}
		function login(){

			$username = $_REQUEST["username"];
			$psd1 = $_REQUEST["psd1"];

				$data = array('userName' =>  $username  , 'userPsw' => $psd1 );
				$this -> Data_model->setTable("tb_customer");
				$query = $this-> Data_model ->getData($data); 

			//print_r(   $query  );

			if( count( $query) == 1 ){
				#code....... 
				 	$user = array('id' => $query[0]['id'] , 'userName' => $query[0]['userName'] , 'remainingSum' => $query[0]['remainingSum']  );
				 	$this-> Customer_model-> setLogin($user);

				 	//日志
				 	$this -> load -> model("Log_model");
				 	$this -> Log_model -> setLog(1,'登陆成功');
					echo "<script>alert('".$username."登陆成功');location.href='/index.php/user/view/".$query[0]['id']."'</script>";
				}else{
				echo "<script>alert('".$username."登陆失败');</script>";		
			}

		} 

		function profile(){ 
			
			$uid = $this->session->userdata('LOGIN_USERID'); 
			$where = array('id' => $uid );
			$data["user"] = $this -> Data_model -> getSingle( $where ,"tb_customer");
			$this -> load -> view("profile",$data);
		}

	
		public function upprofile(){ 
       
			$customer = $_REQUEST["customer"];
			$address = $_REQUEST["address"];
			$phone = $_REQUEST["phone"];
			$email = $_REQUEST["email"];
			$contacts = $_REQUEST["contacts"];
			$mobile = $_REQUEST["mobile"]; 
			$fax = $_REQUEST["fax"];
			$zip = $_REQUEST["zip"]; 
   
			$data = array( 'customer' => $customer ,'address' => $address ,'phone' => $phone, 'fax' => $fax ,'zip' => $zip ,  'email' => $email ,'contacts' => $contacts ,'mobile' => $mobile  ,   ); 
			$where = array( 'id' => $this->session->userdata("LOGIN_USERID") );
			$this ->  Data_model->editData( $where , $data , 'tb_customer'); 

			echo '<script>location.href="/index.php/user/view";</script>';
		    
 		}



 			function password(){ 
			
			//$uid = $this->session->userdata('LOGIN_USERID'); 
	   
			$this -> load -> view("password");
		}

		function uppassword(){ 
			
			$uid = $this->session->userdata('LOGIN_USERID');  
			$opwd = $_REQUEST["opwd"];
			$psd1 = $_REQUEST["psd1"];

			$where = array('id' => $uid , 'userPsw' => $opwd );
			$data  = array( 'userPsw' => $psd1   ); 			
		    $result = $this -> Data_model -> editData( $where , $data , 'tb_customer');  
			 
			if( $result == 1 )
				echo '<script>location.href="/index.php/user/view";</script>';
			else
				echo "<script>alert('修改密码错误');</script>";		
		}





		function view()
		{  
			if(  1==1 )
			{
				$this->load->view('account'); 	

			}
			else
			{
				$this->load->view('login' );  
			}

			
		}	
			 

		 


	} 

?>