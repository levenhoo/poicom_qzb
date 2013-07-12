<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	var $moduleurl='admin/user';	
	var $moduleview='admin/user_view';
	var $modulegrant='admin/user_grant';
	var $table="tb_user";
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/check_model');
		$this->Data_model->setTable($this->table);
		$this->load->model('admin/user_model');
	}

	public function index(){
		$post = $this->input->post(NULL,TRUE);
		$search['username']=trim($post['username']);
		$getwhere = array();
		$getwhere['userType'.' !=']=0;
		if($search['username']!=""){
			$getwhere['userName'.' like']='%'.$search['username'].'%';
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>12
		);
		$data = $this->Data_model->getData($getwhere,'id desc',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
		$pagestr=show_page($pagearr,$search);	
		$liststr=$this->_setlist($data,true);
		$res = array(
				'search'=>$search,
				'pagestr'=>$pagestr,
				'liststr'=>$liststr,
				'moduleurl'=>$this->moduleurl
		);
		$this->load->view($this->moduleurl,$res);
	}

	private function _setlist($data,$ismultiple=true){
		if($ismultiple){
			$listdata = $data;
		}else{
			$listdata = array(0=>$data);
		}
		$liststr = '';
		foreach($listdata as $key=>$item){
			$item['func'] = '';
			$disabled = "";//$item['id']==1?'disabled':'';
			$liststr .="<tr id='tid_".$item['id']."'>
			<td width=30 align='center'><input type=checkbox name='optid[]'".$disabled." value=".$item['id']."></td>
			<td align='center'>".$item['userName']."</td>
			<td align='center'>".lang('usertype'.$item['userType'])."</td>
			<td align='center'>".$item['realName']."</td>
			<td align='center'>".lang('sex'.$item['sex'])."</td>
			<td align='center'>".$item['mobile']."</td>
			<td align='center'>".lang('login_status'.$item['status'])."</td>
			<td align='center'>".$item['optUser']."</td>
			<td align='center'>".$item['optTime']."</td>
			<td align='center'><a title='授权' href=javascript:submitTo('".site_url($this->moduleurl.'/grant/'.$item['id'])."','grant','".$item['id']."')><img src='".base_url('images/ico_grant.gif')."'></a>&nbsp;&nbsp;<a title='编辑' href=javascript:submitTo('".site_url($this->moduleurl.'/edit/'.$item['id'])."','edit')><img src='".base_url('images/ico_edit.gif')."'></a>&nbsp;&nbsp;<a title='删除' href=javascript:submitTo('".site_url($this->moduleurl.'/del/'.$item['id'])."','sdel','".$item['id']."')><img src='".base_url('images/ico_del.gif')."'></a></td>
			</tr>";
		}
		return $liststr;
	}

	public function add(){
		$post = $this->input->post(NULL,TRUE);
		if($post['action']==site_url($this->moduleurl)){
			if($this->Data_model->getSingle(array('userName'=>$post['username']))){
				show_jsonmsg(array('status'=>206));
			}
			$data['userName'] = $post['username'];
			$data['userType'] = $post['usertype'];
			$data['userPsw'] = md5($post['userpsw']);
			$data['realName'] = $post['realname'];
			$data['sex'] = $post['sex'];
			$data['mobile'] = $post['mobile'];
			$data['status'] = $post['status'];
			$data['remark'] = $post['remark'];
			$data['optUser'] = $this->session->userdata('username');
			$data['optTime'] =  date('Y-m-d H:i:s',time());
			$this->Data_model->addData($data);
			show_jsonmsg(array('status'=>200,'remsg'=>''));
		}else{
			$res = array(
					'moduleurl'=>$this->moduleurl	
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
		}
	}

	public function edit(){
		$post = $this->input->post(NULL,TRUE);
		if($post['id']&&$post['action']==site_url($this->moduleurl)){
			$data['userType'] = $post['usertype'];
			if($post['userpsw']!=''){
				$data['userPsw'] = md5($post['userpsw']);
			}
			$data['realName'] = $post['realname'];
			$data['sex'] = $post['sex'];
			$data['mobile'] = $post['mobile'];
			$data['status'] = $post['status'];
			$data['remark'] = $post['remark'];
			$datawhere = array('id'=>$post['id']);
			$this->Data_model->editData($datawhere,$data);
			show_jsonmsg(array('status'=>200,'id'=>$post['id'],'remsg'=>$this->_setlist($this->Data_model->getSingle(array('id'=>$post['id'])),false)));
		}else{
			$id = $this->uri->segment(4);
			if($id>0&&$view = $this->Data_model->getSingle(array('id'=>$id))){
				$view = $this->Data_model->getSingle(array('id'=>$id));
				$res = array(
						'moduleurl'=>$this->moduleurl,
						'view'=>$view
				);
				show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
			}else{
				show_jsonmsg(array('status'=>203));
			}
		}
	}

	public function del(){
		$ids = $this->input->post('optid',true);
		if($ids){
			$this->Data_model->delData($ids);
			$this->Data_model->setTable('tb_authority');
			$this->Data_model->delData($ids,'','userID');
			show_jsonmsg(array('status'=>200,'remsg'=>lang('delok'),'ids'=>$ids));
		}else{
			show_jsonmsg(array('status'=>203));
		}
	}

	public function grant(){
		$post = $this->input->post(NULL,TRUE);		
		if($post['id']&&$post['action']==site_url($this->moduleurl)){
			$id=$post['id'];
			$moduleids = $post['moduleids'];
			$changes = $post['changes'];
			if($changes!=""){
				$this->Data_model->setTable('tb_authority');
				$this->Data_model->delData($id,'','userID');
				$moduleidsarr=explode(",",$moduleids);
				for($i=0;$i<count($moduleidsarr);$i++){
					if($moduleidsarr[$i]!=""){
						$data['userID'] = $id;
						$data['moduleID'] = $moduleidsarr[$i];
						$this->Data_model->addData($data);
					}
				}

			}
			show_jsonmsg(array('status'=>200,'remsg'=>''));
		}else{
			$id = $this->uri->segment(4);
			if($id>0){
				$jsonstr=$this->user_model->grant_json($id);
				$res = array(
						'id'=>$id,
						'moduleurl'=>$this->moduleurl,
						'jsonstr'=>$jsonstr
				);
				show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->modulegrant,$res,true)));
			}else{
				show_jsonmsg(array('status'=>203));
			}
		}
	}
}