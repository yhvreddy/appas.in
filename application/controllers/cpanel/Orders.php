<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Orders extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
    }
	
	public function index(){
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Orders Page';
		$data['orders']	=	$this->Model_default->select_data('meat_cart_details',array('status'=>1),'updated DESC');
		$this->manualLoadView('cpanel/header','cpanel/orderproducts_page','cpanel/footer',$data);
	}

	public function updateOrderStatus()
	{
		$edit_id = $this->uri->segment(2);
		$status = $this->uri->segment(3);
		if(!empty($edit_id) && !empty($status)){
			$conduction = array('id'=>$edit_id);
			$updatedetails = array('order_status'=>$status);
			$update = $this->Model_default->update_data('meat_cart_details',$updatedetails,$conduction);
			if($update != 0){
				$this->session->set_flashdata('success','User as successfully Updated Status..!');
				redirect(base_url('cpanel/dashboard/orderslist'));
			}else{
				$this->session->set_flashdata('failed','User as failed to Update Status..!');
				redirect(base_url('cpanel/dashboard/orderslist'));
			}
		}else{
			$this->session->set_flashdata('failed','User as failed to Update Status..!');
			redirect(base_url('cpanel/dashboard/orderslist'));
		}
	}
}
