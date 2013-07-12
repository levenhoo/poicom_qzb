<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Check_model extends CI_Model{
	function __construct(){
  		parent::__construct();
		$uid = $this->session->userdata('uid');
		$usertype = $this->session->userdata('usertype');
		if(!$uid){
			redirect(site_url('admin/login'));
		}
		if($usertype!=0){
			$url=$this->uri->uri_string();
			$urlarr=explode("/",$url);
			$url=$urlarr[0]."/".$urlarr[1];
			if($url!="admin/main"){
				$moduleurls=$this->session->userdata('moduleurls');
				if(strpos($moduleurls,$url)==""){
					echo "您没有该模块的使用权限！";exit;
				}
			}
		}
	}
}