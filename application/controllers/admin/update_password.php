<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update_password extends CI_Controller {
	var $moduleurl='admin/update_password';	
	var $table="tb_user";
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/check_model');
		$this->Data_model->setTable($this->table);
	}

	public function index(){
		$res = array(
				'moduleurl'=>$this->moduleurl
		);
		
		$this->load->view($this->moduleurl,$res);
	}


	public function save(){
		$post = $this->input->post(NULL,TRUE);
		$uid=$this->session->userdata('uid');
		$user = $this->Data_model->getSingle(array('id'=>$uid));
		$userpsw=$post['userpsw'];
		if($user['userPsw']!=md5($post['olduserpsw'])){
			show_jsonmsg(array('status'=>207,'remsg'=>lang('user_oldpasserror')));
		}
		$data = array(
				'userPsw'=>md5($userpsw)
		);
		$this->Data_model->editData(array('id'=>$uid),$data);
		show_jsonmsg(array('status'=>207,'remsg'=>lang('user_updpasssuccess').$userpsw));
	}

	
}