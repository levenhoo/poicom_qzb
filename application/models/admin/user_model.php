<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
	function __construct(){
  		parent::__construct();
	}	
	function grant_json($id){//获取用户权限json
		$jsonstr='[';
		$query = $this->db->query("select id from  tb_authority where userID=$id and moduleID=0");
		if($query->num_rows()>0){$checkstatus="checked:true,";}else{$checkstatus="";}
		$jsonstr=$jsonstr.'{ id:0, pId:0, name:"系统功能",'.$checkstatus.' open:true},';
		$query = $this->db->query("select tb_module.id as id,tb_module.parentID as parentID,tb_module.moduleName as moduleName,tb_authority.id as checkstatus from tb_module left join tb_authority on tb_module.id=tb_authority.moduleID and tb_authority.userID=$id where tb_module.parentID=0 order by tb_module.id asc");
		$modulelist=$query->result_array();
		foreach($modulelist as $key=>$item){
			if($item['checkstatus']!=""){$checkstatus="checked:true,";}else{$checkstatus="";}
			$jsonstr=$jsonstr.'{ id:'.$item['id'].', pId:0, name:"'.$item['moduleName'].'",'.$checkstatus.' open:true},';
			$query2 = $this->db->query("select tb_module.id as id,tb_module.parentID as parentID,tb_module.moduleName as moduleName,tb_authority.id as checkstatus from tb_module left join tb_authority on tb_module.id=tb_authority.moduleID and tb_authority.userID=$id where tb_module.parentID=".$item['id']." order by tb_module.id asc");
			$modulelist2=$query2->result_array();
			foreach($modulelist2 as $key=>$item2){
				if($item2['checkstatus']!=""){$checkstatus="checked:true,";}else{$checkstatus="";}
				$jsonstr=$jsonstr.'{ id:'.$item2['id'].', pId:'.$item2['parentID'].', name:"'.$item2['moduleName'].'",'.$checkstatus.' open:true},';
				$query3 = $this->db->query("select tb_module.id as id,tb_module.parentID as parentID,tb_module.moduleName as moduleName,tb_authority.id as checkstatus from tb_module left join tb_authority on tb_module.id=tb_authority.moduleID and tb_authority.userID=$id where tb_module.parentID=".$item2['id']." order by tb_module.id asc");
				$modulelist3=$query3->result_array();
				foreach($modulelist3 as $key=>$item3){
					if($item3['checkstatus']!=""){$checkstatus="checked:true,";}else{$checkstatus="";}
					$jsonstr=$jsonstr.'{ id:'.$item3['id'].', pId:'.$item3['parentID'].', name:"'.$item3['moduleName'].'",'.$checkstatus.' open:true},';
					$query4 = $this->db->query("select tb_module.id as id,tb_module.parentID as parentID,tb_module.moduleName as moduleName,tb_authority.id as checkstatus from tb_module left join tb_authority on tb_module.id=tb_authority.moduleID and tb_authority.userID=$id where tb_module.parentID=".$item3['id']." order by tb_module.id asc");
					$modulelist4=$query4->result_array();
					foreach($modulelist4 as $key=>$item4){
						if($item4['checkstatus']!=""){$checkstatus="checked:true,";}else{$checkstatus="";}
						$jsonstr=$jsonstr.'{ id:'.$item4['id'].', pId:'.$item4['parentID'].', name:"'.$item4['moduleName'].'",'.$checkstatus.' open:true},';
					}
				}
			}
		}
		$jsonstr=$jsonstr.']';
		return $jsonstr;
	}
}