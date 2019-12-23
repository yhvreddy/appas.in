<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class User_page extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->load->model('Model_default');
    }
	
	public function index()
	{
		$this->loginPage();
	}

	public function loginPage()
	{
		$data['pagetitle']	=	'Admin login page';
		$this->load->view('cpanel/login_page');
	}

	public function registerPage()
	{
		$data['pagetitle']	=	'New register page';
		$this->load->view('cpanel/register_page');
	}
	
	public function saveRegisterDetails()
	{
		extract($_REQUEST);
		//$this->print_r($_REQUEST);
		//check user details is existing or not
		$checkusermobile = $this->Model_default->select_data('meat_reg_users',array('mobile'=>$mobile));
		if(count($checkusermobile) != 0){
			//already mobile is there.
			$this->session->set_flashdata('failed', 'Mobile Number is already registered.');
				redirect(base_url('cpanel/user/register'));
		}else{
			$checkuseremail = $this->Model_default->select_data('meat_reg_users',array('email_id'=>$email));
			if(count($checkuseremail) != 0){
				//already email is there.
				$this->session->set_flashdata('failed', 'Mail id already registered.');
				redirect(base_url('cpanel/user/register'));
			}else{
				//register new user
				$insertdata = 	array(
									'reg_name'	=>	$Name,
									'email_id'	=>	$email,
									'mobile'	=>	$mobile,
									'password'	=>	$pass,
									'otp'		=>	rand(1000,9999),
									'updated'	=>	date('Y-m-d H:i:s')
								);
				$insernewrecord	=	$this->Model_default->insert_data('meat_reg_users',$insertdata);
				if($insernewrecord != 0){
					$this->session->set_flashdata('success', 'New User Successfully Register');
					redirect(base_url('cpanel/login'));
				}else{
					$this->session->set_flashdata('failed', 'Failed To Register New Account');
					redirect(base_url('cpanel/user/register'));
				}
			}
		}
	}
	
	public function userLoginDetails(){
		extract($_REQUEST);
		
		$checkuser_id = $this->Model_default->select_data('meat_reg_users',array('email_id'=>$login_id));
		if(count($checkuser_id) != 0){
			$password = $login_password;
			$logindetails = $this->Model_default->select_data('meat_reg_users',array('email_id'=>$login_id,'password'=>$password));
			if(count($logindetails) != 0){
				//$this->print_r($logindetails);
				$this->session->set_userdata('loginuserdata',$logindetails);
				$this->session->set_userdata('islogin',TRUE);
				$this->session->set_flashdata('success', 'Login success..!');
				redirect(base_url('cpanel/dashboard'));
			}else{
				$this->session->set_flashdata('failed', 'Login id or Password Incorrect..!');
				redirect(base_url('cpanel/login'));
			}
		}else{
			$this->session->set_flashdata('failed', 'Login user id not found..!');
			redirect(base_url('cpanel/login'));
		}
	}

	public function welcomePage(){
		$this->isLoggedIn();
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Dashboard Page';
		//$this->print_r($userdata);
		//echo "<a href='".$this->logout()."'>Logout</a>";
		$this->manualLoadView('cpanel/header','cpanel/dashboard','cpanel/footer',$data);
	}


	public function registerUsersList(){
		$this->isLoggedIn();
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Regsiter Users List';
		$data['users']	=	$this->Model_default->select_data('meat_users',array('status'=>1),'created DESC');
		$this->manualLoadView('cpanel/header','cpanel/registeruserslist_page','cpanel/footer',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
}
