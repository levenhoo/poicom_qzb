<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin/check_model');
		$this->load->model('admin/main_model');
	}
	
	public function index()
	{		
		$this->load->view('admin/main');
	}

	public function main_top()
	{
		$this->load->vars('username',$this->session->userdata('username'));
		$list=$this->main_model->get_module_list(0);			
		$this->load->vars('list',$list);
		$this->load->view('admin/main_top');
	}

	public function main_left($id=0)
	{
		$lefttree=$this->main_model->get_module_tree($id);
		$this->load->vars('lefttree',$lefttree);
		$this->load->view('admin/main_left');
	}

	public function main_center()
	{
		$this->load->view('admin/main_center.php');
	}

	public function main_right()
	{
		$this->load->view('admin/main_right.php');
	}

	public function main_foot()
	{
		$this->load->view('admin/main_foot');
	}
}