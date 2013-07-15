<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standards_voice extends CI_Controller {
	var $moduleurl='admin/standards_voice';	
	var $moduleview='admin/standards_voice_view';
	var $table="tb_standards_voice";
	function __construct(){
		parent::__construct();	
		$this->load->model('admin/check_model');
		$this->Data_model->setTable($this->table);
	}

	public function index(){
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['customerid']=trim($post['customerid']);
		if($search['customerid']!=""){
			$getwhere['customerID']=$search['customerid'];
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>12
		);
		$this->Data_model->setSelect('tb_customer.customer,tb_standards_voice.*');
		$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_standards_voice.customerID','LEFT');
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
		if($ismultiple){
			$listdata = $data;
		}else{
			$listdata = array(0=>$data);
		}
		$liststr = '';
		foreach($listdata as $key=>$item){
			$item['func'] = '';
			$disabled = $item['customerID']==0?'disabled':'';
			$customer = $item['customerID']==0?'所有客户':$item['customer'];
			$liststr .="<tr id='tid_".$item['id']."'>
			<td width=30 align='center'><input type=checkbox name='optid[]'".$disabled." value=".$item['id']."></td>
			<td align='center'>".$customer."</td>
			<td align='center'>".$item['GSDcost']."</td>
			<td align='center'>".$item['GSMcost']."</td>
			<td align='center'>".$item['GSYcost']."</td>
			<td align='center'>".$item['XSDcost']."</td>
			<td align='center'>".$item['XSMcost']."</td>
			<td align='center'>".$item['XSYcost']."</td>
			<td align='center'>".$item['GZDcost']."</td>
			<td align='center'>".$item['GZMcost']."</td>
			<td align='center'>".$item['GZYcost']."</td>
			<td align='center'>".$item['XZDcost']."</td>
			<td align='center'>".$item['XZMcost']."</td>
			<td align='center'>".$item['XZYcost']."</td>
			<td align='center'><a href=javascript:submitTo('".site_url($this->moduleurl.'/edit/'.$item['id'])."','edit')><img src='".base_url('images/ico_edit.gif')."'></a>";
			if($item['customerID']!=0){
				$liststr .="&nbsp;&nbsp;<a href=javascript:submitTo('".site_url($this->moduleurl.'/del/'.$item['id'])."','sdel','".$item['id']."')><img src='".base_url('images/ico_del.gif')."'></a>";
			}
			$liststr .="</td></tr>";

		}
		return $liststr;
	}

	public function add(){
		$post = $this->input->post(NULL,TRUE);		
		$customerid=$post['customerid'];
		if($post['action']==site_url($this->moduleurl)){
			if($this->Data_model->getSingle(array('customerID'=>$customerid))){
				show_jsonmsg(array('status'=>206));
			}
			$data['customerID'] = $post['customerid'];
			$data['GSDcost'] = $post['gsdcost'];
			$data['GSMcost'] = $post['gsmcost'];
			$data['GSYcost'] = $post['gsycost'];
			$data['XSDcost'] = $post['xsdcost'];
			$data['XSMcost'] = $post['xsmcost'];
			$data['XSYcost'] = $post['xsycost'];
			$data['GZDcost'] = $post['gzdcost'];
			$data['GZMcost'] = $post['gzmcost'];
			$data['GZYcost'] = $post['gzycost'];
			$data['XZDcost'] = $post['xzdcost'];
			$data['XZMcost'] = $post['xzmcost'];
			$data['XZYcost'] = $post['xzycost'];
			$data['optUser'] = $this->session->userdata('username');
			$data['optTime'] =  date('Y-m-d H:i:s',time());
			$this->Data_model->addData($data);
			show_jsonmsg(array('status'=>200,'remsg'=>''));
		}else{
			$customeridlist = $this->Data_model->getData('status = 2','id desc',0,0,'tb_customer');
			$res = array(
					'moduleurl'=>$this->moduleurl,
					'customeridlist'=>$customeridlist
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
		}
	}

	public function edit(){
		$post = $this->input->post(NULL,TRUE);
		if($post['id']&&$post['action']==site_url($this->moduleurl)){
			$data['GSDcost'] = $post['gsdcost'];
			$data['GSMcost'] = $post['gsmcost'];
			$data['GSYcost'] = $post['gsycost'];
			$data['XSDcost'] = $post['xsdcost'];
			$data['XSMcost'] = $post['xsmcost'];
			$data['XSYcost'] = $post['xsycost'];
			$data['GZDcost'] = $post['gzdcost'];
			$data['GZMcost'] = $post['gzmcost'];
			$data['GZYcost'] = $post['gzycost'];
			$data['XZDcost'] = $post['xzdcost'];
			$data['XZMcost'] = $post['xzmcost'];
			$data['XZYcost'] = $post['xzycost'];
			$datawhere = array('id'=>$post['id']);
			$this->Data_model->editData($datawhere,$data);

			$this->Data_model->setTable($this->table);
			$this->Data_model->setSelect('tb_customer.customer,tb_standards_voice.*');
			$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_standards_voice.customerID','LEFT');
			show_jsonmsg(array('status'=>200,'id'=>$post['id'],'remsg'=>$this->_setlist($this->Data_model->getSingle(array('tb_standards_voice.id'=>$post['id'])),false)));
		}else{
			$id = $this->uri->segment(4);
			if($id>0&&$view = $this->Data_model->getSingle(array('id'=>$id))){
				$customeridlist = $this->Data_model->getData('status = 2','id desc',0,0,'tb_customer');
				$res = array(
						'moduleurl'=>$this->moduleurl,
						'customeridlist'=>$customeridlist,
						'view'=>$view,
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
			show_jsonmsg(array('status'=>200,'remsg'=>lang('delok'),'ids'=>$ids));
		}else{
			show_jsonmsg(array('status'=>203));
		}
	}
}