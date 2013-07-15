<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	var $moduleurl='admin/order';
	var $moduleview='admin/order_view';
	var $table="tb_order";
	function __construct(){
		parent::__construct();	
		$this->load->model('admin/check_model');
		$this->Data_model->setTable($this->table);
	}

	public function index(){
		$post = $this->input->post(NULL,TRUE);
		$search['ordernum']=trim($post['ordernum']);
		$search['customerid']=trim($post['customerid']);
		$search['servicetype']=trim($post['servicetype']);
		$search['ordertype']=trim($post['ordertype']);
		$search['paystatus']=trim($post['paystatus']);
		$search['auditstatus']=trim($post['auditstatus']);
		$getwhere = array();
		if($search['ordernum']!=""){
			$getwhere['tb_order.orderNum'.' like']='%'.$search['ordernum'].'%';
		}
		if($search['customerid']!=""){
			$getwhere['tb_order.customerID']=$search['customerid'];
		}
		if($search['servicetype']!=""){
			$getwhere['tb_order.serviceType']=$search['servicetype'];
		}
		if($search['ordertype']!=""){
			$getwhere['tb_order.orderType']=$search['ordertype'];
		}
		if($search['paystatus']!=""){
			$getwhere['tb_order.payStatus']=$search['paystatus'];
		}
		if($search['auditstatus']!=""){
			$getwhere['tb_order.auditStatus']=$search['auditstatus'];
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>12
		);
		$this->Data_model->setSelect('tb_customer.customer,tb_order.*');
		$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_order.customerID','LEFT');
		$data = $this->Data_model->getData($getwhere,'tb_order.id desc',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
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
			if($item['payStatus']==1&&$item['auditStatus']==2){
				$disabled="";
			}else{
				$disabled="disabled";
			}
			$liststr .="<tr id='tid_".$item['id']."'>
			<td align='center'>".$item['orderNum']."</td>
			<td align='center'>".$item['customer']."</td>
			<td align='center'>".$this->_getservice($item['serviceID'],$item['serviceType'])."</td>
			<td align='center'>".lang('servicetype'.$item['serviceType'])."</td>
			<td align='center'>".lang('ordertype'.$item['orderType'])."</td>
			<td align='center'>".$item['orderMoney']."</td>
			<td align='center'>".lang('pay_status'.$item['payStatus'])."</td>
			<td align='center'>".$item['createTime']."</td>
			<td align='center'>".$item['payTime']."</td>
			<td align='center'>".lang('audit_status'.$item['auditStatus'])."</td>
			<td align='center'>&nbsp;&nbsp;<a title='查看' href=javascript:submitTo('".site_url($this->moduleurl.'/view/'.$item['id'])."','view')><img src='".base_url('images/ico_view.gif')."'></a>&nbsp;&nbsp;";
			if($item['payStatus']==1&&$item['auditStatus']==2){
				$liststr .="<a title='审核' href=javascript:submitTo('".site_url($this->moduleurl.'/audit/'.$item['id'])."','saudit','".$item['id']."')><img src='".base_url('images/ico_audit.gif')."'></a>&nbsp;&nbsp;";
			}
			$liststr .="</td></tr>";
		}
		return $liststr;
	}

	private function _getservice($serviceid,$servicetype){
		 if($servicetype==1){
			$this->Data_model->setSelect('prjName');
			$service=$this->Data_model->getSingle(array('id'=>$serviceid),'tb_voiceservice');
			$servicename=$service['prjName'];
		 }
		 return $servicename;
	}


	public function view(){
		$id = $this->uri->segment(4);
		$this->Data_model->setSelect('tb_customer.customer,tb_order.*');
		$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_order.customerID','LEFT');
		if($id>0&&$view = $this->Data_model->getSingle(array('tb_order.id'=>$id))){
			$res = array(
					'moduleurl'=>$this->moduleurl,
					'view'=>$view
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->moduleview,$res,true)));
		}else{
			show_jsonmsg(array('status'=>203));
		}
	}

	public function audit(){
		$id = $this->input->post('optid',true);
		if($id){
			$data['auditStatus'] = 1;
			$datawhere='id ='.$id.'';
			$this->Data_model->editData($datawhere,$data);
			$this->Data_model->setSelect('tb_customer.customer,tb_order.*');
			$this->Data_model->setJoin('tb_customer','tb_customer.id=tb_order.customerID','LEFT');
			show_jsonmsg(array('status'=>200,'id'=>$id,'remsg'=>$this->_setlist($this->Data_model->getSingle(array('tb_order.id'=>$id)),false)));
		}else{
			show_jsonmsg(array('status'=>203));
		}
	}
}