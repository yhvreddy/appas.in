<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Welcome extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->load->model('Model_default');
        $this->category = $this->Model_default->select_data('meat_categories',array('status'=>1),'updated ASC');
        $this->userdata = $this->session->userdata('userdata');
        $this->isAccess = $this->session->userdata('isloginAccess');
    }
	
	public function index()
	{
	    $data['page_title'] =   'Meat Site';
	    $data['banners']	=	$this->Model_default->select_data('meat_banners',array('status'=>1),'updated DESC');
	    $data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'updated ASC');
		$this->load->view('index',$data);
	}

    public function productsList()
    {
    	$category = $this->uri->segment(2);
		$category_name = $this->uri->segment(4);
		$subcategory = $this->uri->segment(4);
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'updated ASC');
        if((isset($category) && !empty($category) && is_numeric($category)) && (!isset($subcategory) && empty($subcategory))){
			$data['products'] = $this->Model_default->select_data('meat_products',array('status'=>1,'category_id'=>$category),'updated ASC');
			$data['submenus'] = $this->Model_default->select_data('meat_sub_categories',array('status'=>1,'category_id'=>$category),'updated ASC');
		}else if(isset($subcategory) && !empty($subcategory) && is_numeric($subcategory)){
			$data['products'] = $this->Model_default->select_data('meat_products',array('status'=>1,'category_id'=>$category,'sub_category_id'=>$subcategory),'updated ASC');
			$data['submenus'] = $this->Model_default->select_data('meat_sub_categories',array('status'=>1,'category_id'=>$category),'updated ASC');
		}else{
			$data['products'] = $this->Model_default->select_data('meat_products',array('status'=>1),'updated ASC');
			$data['submenus'] = $this->Model_default->select_data('meat_sub_categories',array('status'=>1),'updated ASC');
		}
    	$data['page_title'] =   $category_name.' Products';
        $this->load->view('products',$data);
    }

    public function productDetails()
    {
		$product_id = $this->uri->segment(2);
		$product_name = $this->uri->segment(3);
        $data['page_title'] =   $product_name.'product Details';
		$data['productdetails'] = $this->Model_default->select_data('meat_products',array('id'=>$product_id),'updated');
        $this->load->view('product_details',$data);   
    }

    public function checkOut()
	{
		$data['page_title'] =   'Checkout Details';
		$this->load->view('cart_checkout',$data);
	}

	public function termsCond()
    {
        $data['page_title'] =   'Terms Conditions';
        $this->load->view('terms-and-conditions',$data);
    }

    public function returnsDetails()
    {
        $data['page_title'] =   'Returns Details';
        $this->load->view('returns',$data);
    }

    public function privacyPolicy()
    {
        $data['page_title'] =   'Privacy Policy';
        $this->load->view('privacy-policy',$data);
    }

    public function about()
    {
        $data['page_title'] =   'About';
        $this->load->view('about',$data);
    }

	public function withoutlogincheck()
	{
		$data['page_title'] =   'Without Login Checkout';
		$this->load->view('withoutlogincheckout',$data);
	}

	public function loginRegister(){
		if($this->isAccess == 0) {
			$data['getrequest'] = $this->input->get('resetpassword');
			$data['page_title'] = 'Login or Register Account';
			$this->load->view('login_registeraccount', $data);
		}else{
			redirect(base_url());
		}
	}

	public function saveregisterData(){
		extract($_REQUEST);
		$checkmail = $this->Model_default->select_data('meat_users',array('mail_id'=>$mail_id));
		if(count($checkmail) != 0){
			$this->session->set_flashdata('failed_reg','User mail id as already registered..!');
			redirect(base_url('loginregister'));
		}else{
			//check mobile
			$checkmobile = $this->Model_default->select_data('meat_users',array('mobile'=>$MobileNum),'id DESC');
			if(count($checkmobile) != 0){
				$this->session->set_flashdata('failed_reg','User mobile number as already registered..!');
				redirect(base_url('loginregister'));
			}else{
				$insertdata = array('first_name'=>$FirstName,'last_name'=>$LastName,'mobile'=>$MobileNum,'mail_id'=>$mail_id,'password'=>$Password);
				$insert = $this->Model_default->insert_data('meat_users',$insertdata);
				if($insert != 0){
					$message= "Your Account as Successfully Created. Your Login Id : ".$mail_id." and Pasword : ".$Password." ..! ThankQ For Be With Us.";
					$to_email = $mail_id;
					$subject = 'Account as Successfully Created..!';
					$headers = 'From: appas888553@gmail.com';
					mail($to_email, $subject, $message, $headers);
					$this->session->set_flashdata('success_reg','User as successfully registered..!');
					redirect(base_url('loginregister'));
				}else{
					$this->session->set_flashdata('failed_reg','User as failed to register..!');
					redirect(base_url('loginregister'));
				}
			}
		}
	}

	public function userLoginAccount(){
		extract($_REQUEST);
		$checkloginId = $this->Model_default->query('select * from meat_users where mail_id = "'.$LoginId.'" or mobile = "'.$LoginId.'" AND status = 1');
		if(count($checkloginId) != 0){
			//password access
			$useraccess = $checkmail = $this->Model_default->query('select * from meat_users where ( mail_id = "'.$LoginId.'" or mobile = "'.$LoginId.'" ) AND password = "'.$Password.'" AND status = 1');
			if(count($useraccess) != 0){
				$session = array('isloginAccess'=>1,'userdata'=>$useraccess[0]);
				$this->session->set_userdata($session);
				$this->session->set_flashdata('success_login','User as successfully registered..!');
				redirect(base_url(''));
			}else{
				//$this->session->sess_destroy();
				$this->session->set_flashdata('failed_login','Failed to login ckeck user id or password..!');
				redirect(base_url('loginregister'));
			}

		}else{
			//$this->session->sess_destroy();
			$this->session->set_flashdata('failed_login','Failed to login ckeck user id or password..!');
			redirect(base_url('loginregister'));
		}
	}

	public function Resetpassword()
	{
		$registermail = $this->input->post('register_eMail_id');
		$Checkmail = $this->Model_default->query('select * from meat_users where mail_id = "'.$registermail.'"');
		if(count($Checkmail) != 0){
			//reset password
			$newpassword = $this->randomPassword();
			print_r($newpassword);
			$conduction = array('mail_id'=>$registermail);
			$updatedetails = array('password'=>$newpassword);
			$update = $this->Model_default->update_data('meat_users',$updatedetails,$conduction);
			if($update != 0){
				//mail function
				$message= "Your new password as been generated : ".$newpassword." *Please Login and Change password.!";
				$to_email = $registermail;
				$subject = 'Reset Password Request..!';
				$headers = 'From: appas888553@gmail.com';
				mail($to_email, $subject, $message, $headers);

				$this->session->set_flashdata('success_login','User as successfully generated Password..!');
				redirect(base_url('loginregister?resetpassword=success'));
			}else{
				$this->session->set_flashdata('failed_login','User as failed to generate Password..!');
				redirect(base_url('loginregister?resetpassword=failed'));
			}
		}else{
			$this->session->set_flashdata('failed_login','Please enter register eMail to reset password..!');
			redirect(base_url('loginregister?resetpassword=failed'));
		}
		//print_r($Checkmail);
	}

	//ramdom password
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	public function saveCartdata(){
		extract($_REQUEST);
		$totalamount = 0;
		//$this->print_r($_REQUEST);
		$order_id = time().'ID'.$this->userdata->id.'D'.rand(00,99);
		$cartdata = array();
		foreach ($this->cart->contents() as $items){
			$quty = $this->Model_default->select_data('meat_product_price_details',array('id'=>$items['options']['unit']),'updated ASC');
			$cartdata[] = array('product_name' => $items['name'],'product_id' => $items['id'],'quntity' => $items['qty'],'unit_id' => $items['options']['unit'],'unit_price' => $items['options']['unit_price'],'image' => $items['options']['product_img'],'category' => $items['options']['category'],'sub_category' => $items['options']['sub_category'],'price' => $items['price']);
			 //@$totalamount += $items['price'];
		}
		//$this->print_r($this->userdata);
		//$this->print_r($this->cart->contents());
		$saveorders = array('order_id' => $order_id,'user_id' => $this->userdata->id,'name' => $d_name,'mobile' => $mobile,'city' => $city,'landmark' => $landmark,'area' => $area,'pincode' => $pincode,'address' => $address,'cart_items' => serialize($cartdata),'amount' => $total_amount,'special_request' => $special_request, 'email' => $email_id);
		$insert = $this->Model_default->insert_data('meat_cart_details',$saveorders);
		if($insert != 0){
			$this->Model_default->update_data('meat_cart_details',array('status'=> 1,'order_status' => 1),array('id'=>$insert));
			$this->cart->destroy();
			$this->session->set_flashdata('success_reg','User as successfully registered..!');
			redirect(base_url('success'));
		}else{
			$this->Model_default->update_data('meat_cart_details',array('status'=> 1,'order_status' => 2),array('id'=>$insert));
			$this->session->set_flashdata('failed_reg','User as failed to register..!');
			redirect(base_url('failed'));
		}
	}


	/*
	 *  Add to cart
	 */
	public function addToCartProduct(){
		$this->load->library("cart");
		extract($_REQUEST);
		$priceqnty = $this->Model_default->select_data('meat_product_price_details',array('id'=>$product_quantity),'id DESC');
		$product = $this->Model_default->select_data('meat_products',array('id'=>$product_id),'id DESC');
		$category = $this->Model_default->select_data('meat_categories',array('id'=>$product[0]->category_id),'id DESC');
		if(!empty($product[0]->sub_category_id)){
			$subcategory = $this->Model_default->select_data('meat_sub_categories',array('id'=>$product[0]->sub_category_id),'id DESC');
			$sub_category = $subcategory[0]->sub_category_name;
		}else{
			$sub_category = '';
		}
		$qty = 1;
		$price = $priceqnty[0]->price * $qty;
		//
		$data = array(
			"id"          => $product_id,
			"name"        => $product_name,
			"qty"         => $qty,
			"options"     => array('unit'=>$product_quantity,'unit_price'=>$priceqnty[0]->price,'product_img'=>$product[0]->image,'category'=>$category[0]->category_name,'sub_category'=>$sub_category),
			"price"       => $price,
		);
		$this->cart->insert($data); //return rowid
		echo json_encode($this->productsCartlist());
	}


	public function productsCartlist()
	{
		$this->load->library("cart");
		$list = $this->cart->contents();
		//$cartdata = array('cart_products'=>$list,'count'=>count($list));
		return $list;
	}


	function productRemove()
	{
		$row_id = $_POST["row_id"];
		$data = array(
			'rowid'  => $row_id,
			'qty'  => 0
		);
		$data = $this->cart->update($data);
		if($data != 1){
			echo 0;
		}else{
			echo $data;
		}
	}

	public function CancelOrder(){
		$this->cart->destroy();
		redirect(base_url('products'));
	}

	public function productsCartCountlist()
	{
		$this->load->library("cart");
		$list = $this->cart->contents();
		?>

		<?php if($this->isAccess == 0){ ?>
			<a href="<?=base_url('loginregister')?>" style="text-decoration: none;color: #0b2e13">
				<?php if (count($list) != 0){?>
					<span class="CountIcon"><?=count($list)?></span>
				<?php } ?>
				<div class="p-relative cartIcon">
					<i class="material-icons icon-cart-fill d-flex"></i>
					<div class="cart-number"></div>
				</div>
			</a>
		<?php }else{ ?>
			<a href="<?=base_url('cart/checkout')?>" style="text-decoration: none;color: #0b2e13">
				<?php if (count($list) != 0){?>
					<span class="CountIcon"><?=count($list)?></span>
				<?php } ?>
				<div class="p-relative cartIcon">
					<i class="material-icons icon-cart-fill d-flex"></i>
					<div class="cart-number"></div>
				</div>
			</a>
		<?php } ?>

		<?php
	}
	

	public function editprofile()
    {
		if($this->isAccess != 0){
			$userdetails = $this->Model_default->select_data('meat_users',array('id'=>$this->userdata->id),'id DESC');
			$data['userdata'] = $userdetails[0];
			$data['page_title'] =   'Profile Details';
			$this->load->view('edit_profile',$data);
		}else{
			redirect(base_url());
		}
	}

	public function UpdateuserDetails()
	{
		extract($_REQUEST);
		$conduction = array('id'=>$edit_id);
		$updatedetails = array('first_name'=>$myOFName,'last_name'=>$myOLName,'mobile'=>$myPhone,'mail_id'=>$myEmail);
		$update = $this->Model_default->update_data('meat_users',$updatedetails,$conduction);
		// print_r($update);
		// exit;
		if($update != 0){
			$this->session->set_flashdata('success_reg','User as successfully Updated..!');
			redirect(base_url('user/profile'));
		}else{
			$this->session->set_flashdata('failed_reg','User as failed to Update..!');
			redirect(base_url('user/profile'));
		}
	}
	
	public function UpdateuserPassword()
	{
		extract($_REQUEST);
		// print_r($_REQUEST);
		// exit;
		$userdetails = $this->Model_default->select_data('meat_users',array('id'=>$edit_id),'id DESC');
		if($userdetails[0]->password == $oldpassword){
			$conduction = array('id'=>$edit_id);
			$updatedetails = array('password'=>$newpassword);
			$update = $this->Model_default->update_data('meat_users',$updatedetails,$conduction);
			if($update != 0){
				//$this->session->sess_destroy();
				$this->session->set_flashdata('success_reg','User as successfully Updated Password..!');
				redirect(base_url('user/profile'));
			}else{
				$this->session->set_flashdata('failed_reg','User as failed to Update Password..!');
				redirect(base_url('user/profile'));
			}
		}else{
			$this->session->set_flashdata('failed_reg','Please Enter Correct Old Password..!');
			redirect(base_url('user/profile'));
		}
	}

	public function myOrders()
	{
		if($this->isAccess != 0){
			$data['page_title'] =   'My Orders';
			$data['orders']	= $this->Model_default->select_data('meat_cart_details',array('status'=> 1,'user_id'=>$this->userdata->id),'id DESC');
			$this->load->view('my_orders',$data);
		}else{
			redirect(base_url());
		}
	}

	public function statusFailed(){
		$data['page_title'] =   'Failed';
		$this->load->view('failed_status',$data);
	}

	public function statusSuccess(){
		$data['page_title'] =   'Failed';
		$this->load->view('success_status',$data);
	}

	function logout()
	{
		$newdata = array(
			'userdata'  	=>	'',
			'isloginAccess' => 	0,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect(base_url());
	}
}