<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voiceservice extends CI_Controller {
	var $moduleurl='admin/voiceservice';
	var $moduleview='admin/voiceservice_view';	
	var $table="tb_voiceservice";
	function __construct(){
		parent::__construct();	
		$this->load->model('admin/check_model');
		$this->Data_model->setTable($this->table);
	}

	public function index(){
		$post = $this->input->post(NULL,TRUE);
		$search['prjnum']=trim($post['prjnum']);
		$search['prjname']=trim($post['prjname']);
		$search['customerid']=trim($post['customerid']);
		$search['pagingtype']=trim($post['pagingtype']);
		$search['prjtype']=trim($post['prjtype']);
		$search['status']=trim($post['status']);
		$getwhere = array();
		if($search['prjnum']!=""){
			$getwhere['tb_voiceservice.prjNum'.' like']='%'.$search['prjnum'].'%';
		}
		if($search['prjname']!=""){
			$getwhere['tb_voiceservice.prjName'.' like']='%'.$search['prjname'].'%';
		}
		if($search['customerid']!=""){
			$getwhere['tb_voiceservice.customerID']=$search['customerid'];
		}
		if($search['pagingtype']!=""){
			$getwhere['tb_voiceservice.pagingtype']=$search['pagingtype'];
		}
		if($search['prjtype']!=""){
			$getwhere['tb_voiceservice.prjType']=$search['prjtype'];
		}
		if($search['status']!=""){
			$getwhere['tb_voiceservice.status']=$search['status'];
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>12
		);
		$this->Data_model->setSelect('tb_customer.customer,tb_voiceservice.*');
		$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_voiceservice.customerID','LEFT');
		$data = $this->Data_model->getData($getwhere,'id desc',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
		$customeridlist = $this->Data_model->getData('status = 2','id desc',0,0,'tb_customer');
		$pagestr=show_page($pagearr,$search);	
		$liststr=$this->_setlist($data,true);
		$res = array(
				'search'=>$search,
				'pagestr'=>$pagestr,
				'liststr'=>$liststr,
				'customeridlist'=>$customeridlist,
				'moduleurl'=>$this->moduleurl
		);
		$this->load->view($this->moduleurl,$res);
	}

	private function _setlist($data,$ismultiple=true){
		$listdata = $ismultiple?$data:($listdata[0]=$data);
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
			<td align='center'>".$item['prjNum']."</td>
			<td align='center'>".$item['prjName']."</td>
			<td align='center'>".$item['customer']."</td>
			<td align='center'>".lang('pagingtype'.$item['pagingType'])."</td>
			<td align='center'>".lang('prjtype'.$item['prjType'])."</td>
			<td align='center'>".$item['extNum']."</td>
			<td align='center'>".$item['lineNum']."</td>
			<td align='center'>".lang('shownum'.$item['showNum'])."</td>
			<td align='center'>".$item['durationNum'].lang('durationtype'.$item['durationType'])."</td>
			<td align='center'>".$item['totalCost']."</td>
			<td align='center'>".$item['billingDate']."</td>
			<td align='center'>".$item['endDate']."</td>
			<td align='center'>".lang('voiceservice_status'.$item['status'])."</td>
			<td align='center'>&nbsp;&nbsp;<a title='管理' href=javascript:submitTo('".site_url($this->moduleurl.'/manager/'.$item['id'])."','manager')><img src='".base_url('images/ico_manager.gif')."'></a>&nbsp;&nbsp;</td>
			</tr>";
		}
		return $liststr;
	}

	public function manager(){
		$id = $this->uri->segment(4);
		if($id>0){
			$this->Data_model->setSelect('tb_customer.customer,tb_voiceservice.*');
			$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_voiceservice.customerID','LEFT');
			$view = $this->Data_model->getSingle(array('tb_voiceservice.id'=>$id));
			$res = array(
					'moduleurl'=>$this->moduleurl,
					'view'=>$view
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
		}else{
			show_jsonmsg(array('status'=>203));
		}
		/*
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
				$res = array(
						'moduleurl'=>$this->moduleurl,
						'view'=>$view
				);
				show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
			}else{
				show_jsonmsg(array('status'=>203));
			}
		}
		*/
	}
}