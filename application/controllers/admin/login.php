<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('captcha');
		$this->load->model('admin/login_model');
	}
	
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function checklogin()//检测用户登录信息
	{
		$post = $this->input->post(NULL,TRUE);
		$username = trim($post['username']);
		$userpsw = md5(trim($post['userpsw']));
		$captcha = trim($post['captcha']);
		if(!$this->captcha->check($captcha)){
			echo 'captchaerror';exit;
		}
		echo $this->login_model->login($username,$userpsw);exit;
	}

	public function show_captcha()//生成验证码图片
	{
        echo $this->captcha->show();
    }

	public function logout()//退出系统
	{
		$session_array = array(
		'uid' => '',
		'username' => '',
		'usertype' => '',
		'status' => '',
		'moduleurls' => '',
		);
		$this->session->unset_userdata($session_array);
		redirect(site_url('admin/login'));
    }
}