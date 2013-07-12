<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model{
	function __construct(){
  		parent::__construct();
	}	
	function get_module($id){//获取模块相关信息
		$query = $this->db->query("select * from tb_module where id=$id");
		$module=$query->row_array();
		return $module;
	}
	function get_module_list($id){//获取模块列表，主要用是头部的菜单
		$uid=$this->session->userdata('uid');
		$usertype=$this->session->userdata('usertype');
		if($usertype==0){
			$query = $this->db->query("select id,moduleName,url from tb_module where parentID=$id order by id asc");
		}else{
			$query = $this->db->query("select a.id,a.moduleName,url from tb_module a,tb_authority b where a.parentID=$id and b.userID=$uid and a.id=b.moduleID order by id asc");
		}
		$list=$query->result_array(); 
		return $list;
	}

	function get_module_tree($id){//获取模块树形结构，主要用是左侧的菜单
		$uid=$this->session->userdata('uid');
		$usertype=$this->session->userdata('usertype');
		$lefttree="";
		$module=$this->get_module($id);
		$level=$module['level'];
		if($usertype==0){	
			if($level==1){
				$lefttree="<tr><td onclick='seton(this,\"".site_url($module['url'])."\");'><span><a href='javascript:void(0)'>".$module['moduleName']."</a></span></td></tr>";
			}
			if($level==2){
				$lefttree="<tr><td><b class='mtop'>".$module['moduleName']."</b></td></tr>";
				$query = $this->db->query("select id,moduleName,url from tb_module where parentID=$id order by id asc");
				$modulelist=$query->result_array();
				foreach($modulelist as $key=>$item){
					$lefttree=$lefttree."<tr><td onclick='seton(this,\"".site_url($item['url'])."\");'><span><a href='javascript:void(0)'>".$item['moduleName']."</a></span></td></tr>";
				}
			}
			if($level==3){
				$query = $this->db->query("select id,moduleName,url from tb_module where parentID=$id order by id asc");
				$modulelist=$query->result_array();
				foreach($modulelist as $key=>$item){
					$lefttree=$lefttree."<tr><td><b class='mtop'>".$item['moduleName']."</b></td></tr>";
					$query = $this->db->query("select id,moduleName,url,level from tb_module where parentID=".$item['id']."");
					$modulelist2=$query->result_array();
					foreach($modulelist2 as $key=>$item2){
						$lefttree=$lefttree."<tr><td onclick='seton(this,\"".site_url($item2['url'])."\");'><span><a href='javascript:void(0)'>".$item2['moduleName']."</a></span></td></tr>";

					}
				}
			}
		}else{
			if($level==1){
				$lefttree="<tr><td onclick='seton(this,\"".site_url($module['url'])."\");'><span><a href='javascript:void(0)'>".$module['moduleName']."</a></span></td></tr>";
			}
			if($level==2){
				$lefttree="<tr><td><b class='mtop'>".$module['moduleName']."</b></td></tr>";
				$query = $this->db->query("select a.id,a.moduleName,a.url from tb_module a,tb_authority b where a.parentID=$id and b.userID=$uid and a.id=b.moduleID order by a.id asc");
				$modulelist=$query->result_array();
				foreach($modulelist as $key=>$item){
					$lefttree=$lefttree."<tr><td onclick='seton(this,\"".site_url($item['url'])."\");'><span><a href='javascript:void(0)'>".$item['moduleName']."</a></span></td></tr>";
				}
			}
			if($level==3){
				$query = $this->db->query("select a.id,a.moduleName,a.url from tb_module a,tb_authority b where a.parentID=$id and b.userID=$uid and a.id=b.moduleID order by a.id asc");
				$modulelist=$query->result_array();
				foreach($modulelist as $key=>$item){
					$lefttree=$lefttree."<tr><td><b class='mtop'>".$item['moduleName']."</b></td></tr>";
					$query = $this->db->query("select a.id,a.moduleName,a.url from tb_module a,tb_authority b where a.parentID=".$item['id']." and b.userID=$uid and a.id=b.moduleID order by a.id asc");
					$modulelist2=$query->result_array();
					foreach($modulelist2 as $key=>$item2){
						$lefttree=$lefttree."<tr><td onclick='seton(this,\"".site_url($item2['url'])."\");'><span><a href='javascript:void(0)'>".$item2['moduleName']."</a></span></td></tr>";

					}
				}
			}
		}
		return $lefttree;
	}
}