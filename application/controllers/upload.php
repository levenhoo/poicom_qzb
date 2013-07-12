<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
 
 function __construct()
 {
  parent::__construct();
    //$this->load->helper(array('form', 'url'));
 }
 
 function index()
 { 
    //$this->load->view('upload_form', array('error' => ' ' ));
 }


 function doupload(){

      $username = $_REQUEST["username"];
      $psd1 = $_REQUEST["psd1"];
      $psd2 = $_REQUEST["psd2"];
      $customer = $_REQUEST["customer"];
      $address = $_REQUEST["address"];
      $phone = $_REQUEST["phone"];
      $email = $_REQUEST["email"];
      $contacts = $_REQUEST["contacts"];
      $mobile = $_REQUEST["mobile"];
      $file_upload = $_REQUEST["upfile"];
      $fax = $_REQUEST["fax"];
      $zip = $_REQUEST["zip"];
      
      //$this->load->database();
      $query = $this->db->query("SELECT * FROM tb_customer where userName = '".$username."'   "); 
      
   

      if( $username == '' ) exit;

      if( $query -> num_rows() > 0 ){
        echo "<script>alert('".$username."已经被注册');</script>";
        exit;
      }
  

      $data = array('userName' => $username , 'userPsw' => $psd1 ,'customer' => $customer ,'address' => $address ,'phone' => $phone, 'fax' => $fax ,'zip' => $zip ,  'email' => $email ,'contacts' => $contacts ,'mobile' => $mobile  , 'certificateUrl' => $file_upload ,'regDate' =>  date('Y-m-d H:i:s')  ,'regIp' => $_SERVER['REMOTE_ADDR'] , 'status' => 1  );

   
     $id =  $this ->  Data_model->addData($data , 'tb_customer');


     if($id){
         echo '<script>location.href="index.php/user/view";</script>';
     }else{ 
        echo '<script>alert("注册失败");</script>';
     }
      

     
    
 }

 function do_upload()
 {
   
    $targetFolder = './uploads'; // Relative to the root
    $targetFileName = date("YmdHis");
    $verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
  $tempFile = $_FILES['Filedata']['tmp_name'];
  $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
  $targetFile = rtrim($targetPath,'/') . '/' . $targetFileName;
   
  // Validate the file type
  $fileTypes = array('txt','jpg','jpeg','gif','png'); // File extensions
  $fileParts = pathinfo($_FILES['Filedata']['name']); 

  $targetFileExtention = $fileParts["extension"] ;
  $targetFile .= '.'.$targetFileExtention;


  if (in_array($fileParts['extension'],$fileTypes)) {
    

    move_uploaded_file($tempFile,$targetFile);


    //--------  check exists  ---------

    if (file_exists( $targetFile )  ) {      
      echo "$targetFileName.".$targetFileExtention;
    } else {
      echo 'fail';
      exit;
    }  
    
  } else {
    echo '不支持的文件类型';
  }
}
    
 } 
}
?>