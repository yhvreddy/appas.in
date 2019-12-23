<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Categories extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
    }
	
	public function Categories(){
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Banners Page';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/categories_page','cpanel/footer',$data);
	}

	public function saveCategories(){
		extract($_REQUEST);
		$path = 'uploads/Categories/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = '';
			}
		}else{
			$uploadedfile = '';
		}


		$insertdata = array('image'=>$uploadedfile,'category_name'=>$category_name,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->insert_data('meat_categories',$insertdata);
		if($insertbanners != 0){
			$this->successalert('Successfully Saved Category Details.','You have Save Category details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/categories'));
		}else{
			$this->failedalert('Failed to save Category Details.','Unable to save Category details or oops error..!');
			redirect(base_url('cpanel/dashboard/categories'));
		} 
	}

	public function editCategories(){
		$id = $this->uri->segment(4);
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Banners Page';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$data['categorydata']	=	$this->Model_default->select_data('meat_categories',array('status'=>1,'id'=>$id),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/categories_page','cpanel/footer',$data);
	}

	public function saveEditdetails(){
		extract($_REQUEST);
		// $this->print_r($_REQUEST);
		// $this->print_r($_FILES);
		// exit;
		$path = 'uploads/Categories/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = '';
			}
		}else{
			$uploadedfile = $uploaded_image;
		}


		$conduction	=	array('id'=>$edit_id);
		$insertdata = array('image'=>$uploadedfile,'category_name'=>$category_name,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->update_data('meat_categories',$insertdata,$conduction);
		if($insertbanners != 0){
			$this->successalert('Successfully Update Category Details.','You have Update Category details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/categories'));
		}else{
			$this->failedalert('Failed to Update Category Details.','Unable to Update Category details or oops error..!');
			redirect(base_url('cpanel/dashboard/categories'));
		} 
	}

	public function deleteCategories(){
		$id = $this->uri->segment(4);
		if(isset($id) && !empty($id)){
			$conduction = 	array('id'=>$id);
			$updatedata	=	array('status'=>0);
			$updating	=	$this->Model_default->update_data('meat_categories',$updatedata,$conduction);
			if($updating != 0){
				$this->Model_default->update_data('meat_sub_categories',$updatedata,array('category_id'=>$id));
				$this->successalert('Successfully Delete Category Details.','You have Save SubCategory details sucessfully please check once..!');
				redirect(base_url('cpanel/dashboard/categories'));
			}else{
				$this->failedalert('Failed to Delete Category Details.','Unable to Delete SubCategory details or oops error..!');
				redirect(base_url('cpanel/dashboard/categories'));
			}
		}else{
			$this->failedalert('Failed to Delete Category Details.','Unable to Delete Category details or Invalid oops error..!');
			redirect(base_url('cpanel/dashboard/categories'));
		}
	}



	public function SubCategories(){
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Banners Page';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$data['subcategories']	=	$this->Model_default->select_data('meat_sub_categories',array('status'=>1),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/subcategories_page','cpanel/footer',$data);
	}

	public function editSubCategories(){
		$id = $this->uri->segment(4);
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Edit SubCategory Page';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$data['subcategories']	=	$this->Model_default->select_data('meat_sub_categories',array('status'=>1),'id DESC');
		$data['subcategoriesdata']	=	$this->Model_default->select_data('meat_sub_categories',array('status'=>1,'id'=>$id),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/subcategories_page','cpanel/footer',$data);
	}

	public function saveEditSubdetails(){
		extract($_REQUEST);
		// $this->print_r($_REQUEST);
		// $this->print_r($_FILES);
		// exit;
		$path = 'uploads/SubCategories/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = $uploaded_image;
			}
		}else{
			$uploadedfile = $uploaded_image;
		}

		$conduction	=	array('id'=>$edit_id);
		$insertdata = array('image'=>$uploadedfile,'category_id'=>$category_name,'sub_category_name'=>$subcategory_name,'information'=>$Information,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->update_data('meat_sub_categories',$insertdata,$conduction);
		if($insertbanners != 0){
			$this->successalert('Successfully Update SubCategory Details.','You have Update SubCategory details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/subcategories'));
		}else{
			$this->failedalert('Failed to Update SubCategory Details.','Unable to Update SubCategory details or oops error..!');
			redirect(base_url('cpanel/dashboard/subcategories'));
		} 
	}

	public function saveSubCategories(){
		extract($_REQUEST);
		$path = 'uploads/SubCategories/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = '';
			}
		}else{
			$uploadedfile = '';
		}


		$insertdata = array('image'=>$uploadedfile,'category_id'=>$category_name,'sub_category_name'=>$subcategory_name,'information'=>$Information,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->insert_data('meat_sub_categories',$insertdata);
		if($insertbanners != 0){
			$this->successalert('Successfully Saved SubCategory Details.','You have Save SubCategory details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/subcategories'));
		}else{
			$this->failedalert('Failed to save SubCategory Details.','Unable to save SubCategory details or oops error..!');
			redirect(base_url('cpanel/dashboard/subcategories'));
		} 
	}

	public function deleteSubCategories(){
		$id = $this->uri->segment(4);
		if(isset($id) && !empty($id)){
			$conduction = 	array('id'=>$id);
			$updatedata	=	array('status'=>0);
			$updating	=	$this->Model_default->update_data('meat_sub_categories',$updatedata,$conduction);
			if($updating != 0){
				$this->successalert('Successfully Updated SubCategory Details.','You have Save SubCategory details sucessfully please check once..!');
				redirect(base_url('cpanel/dashboard/subcategories'));
			}else{
				$this->failedalert('Failed to Update SubCategory Details.','Unable to Update SubCategory details or oops error..!');
				redirect(base_url('cpanel/dashboard/subcategories'));
			} 
		}else{
			$this->failedalert('Failed to Update SubCategory Details.','Unable to Update SubCategory details or Invalid oops error..!');
			redirect(base_url('cpanel/dashboard/subcategories'));
		}
	}



	public function productsAdd(){
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Projects list';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$data['subcategories']	=	$this->Model_default->select_data('meat_sub_categories',array('status'=>1),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/products_page','cpanel/footer',$data);
	}

	public function subcategoriesListAjax()
	{
		extract($_REQUEST);
		$category_id = $this->Model_default->select_data('meat_sub_categories', array('status'=>1,'category_id'=>$category_id),'id DESC');
		echo json_encode($category_id);
	}

	public function productsaveDetails(){
		extract($_REQUEST);
		$path = 'uploads/products/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = '';
			}
		}else{
			$uploadedfile = '';
		}

		$insertdata = array('image'=>$uploadedfile,'category_id'=>$category_name,'sub_category_id'=>$subcategory_id,'product_name'=>$product_name,'information'=>$Information,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->insert_data('meat_products',$insertdata);
		if($insertbanners != 0){

			foreach ($sizeunits as $key => $value){
				$amountdetails = array('product_id' => $insertbanners,'unit_size'=>$value,'price'=>$amountcost[$key]);
				$this->Model_default->insert_data('meat_product_price_details',$amountdetails);
			}

			$this->successalert('Successfully Saved Products Details.','You have Save Products details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/productslist'));
		}else{
			$this->failedalert('Failed to save Products Details.','Unable to save Products details or oops error..!');
			redirect(base_url('cpanel/dashboard/addproducts'));
		}
	}

	public function productsEdit(){
		$id = $this->uri->segment(4);
		if($id != '') {
			$data['userdata'] = $this->session->userdata('loginuserdata');
			$data['pagetitle'] = 'Projects list';
			$data['categories'] = $this->Model_default->select_data('meat_categories', array('status' => 1), 'id DESC');
			$data['productdata'] = $this->Model_default->select_data('meat_products', array('id'=>$id), 'id DESC');
			$data['subcategories'] = $this->Model_default->select_data('meat_sub_categories', array('status' => 1), 'id DESC');
			$this->manualLoadView('cpanel/header', 'cpanel/product_edit_page', 'cpanel/footer', $data);
		}else{
			$this->session->set_flashdata('failed','Invalid requst to edit.');
			redirect(base_url('cpanel/dashboard/productslist'));
		}
	}

	public function deleteproductPricedata(){
		$id = $this->uri->segment(4);
		$product = $this->uri->segment(5);
		if($id != '' && $product != '') {
			$conduction = array('id'=>$id);
			$updatedata = array('status'=>0);
			$updated = $this->Model_default->update_data('meat_product_price_details',$updatedata,$conduction);
			if($updated != 0){
				$this->session->set_flashdata('success','Successfully removed data..!');
				redirect(base_url('cpanel/dashboard/products/'.$product.'/edit'));
			}else{
				$this->session->set_flashdata('failed','Failed to remove data.!');
				redirect(base_url('cpanel/dashboard/products/'.$product.'/edit'));
			}
		}else{
			$this->session->set_flashdata('failed','Invalid request to delete data.!');
			redirect(base_url('cpanel/dashboard/productslist'));
		}
	}

	public function productsaveEditDetails(){
		extract($_REQUEST);
		$this->print_r($_REQUEST);
		$dblist = count($insert_id);
		$uplist = count($sizeunits);

		$path = 'uploads/products/';
		if($_FILES['CategoryImages']['name'] != ''){
			if(file_exists($path)){
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}else{
				$this->createdir($path,$path);
				$uploadfile = $this->uploadfiles($path,'CategoryImages','jpg|png|jpeg',TRUE);
			}
			if($uploadfile['status'] == 1){
				$uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
			}else{
				$uploadedfile = $uploaded_image;
			}
		}else{
			$uploadedfile = $uploaded_image;
		}
		$conduction	=	array('id'=>$edit_id);
		$insertdata = array('image'=>$uploadedfile,'category_id'=>$category_name,'sub_category_id'=>$subcategory_id,'product_name'=>$product_name,'information'=>$Information,'updated'=>date('Y-m-d H:i:s'));
		$insertbanners = $this->Model_default->update_data('meat_products',$insertdata,$conduction);
		if($insertbanners != 0){
			//$this->Model_default->delete_data('meat_product_price_details',array('product_id'=>$edit_id));

			foreach ($sizeunits as $key => $value){
				$amountdetails = array('product_id' => $edit_id,'unit_size'=>$value,'price'=>$amountcost[$key]);
				if($uplist < $dblist){
					$this->Model_default->insert_data('meat_product_price_details',$amountdetails);
				}else{
					//update
					$conduction = array('id'=>$insert_id[$key]);
					$this->Model_default->update_data('meat_product_price_details',$amountdetails,$conduction);

				}
			}
			$this->successalert('Successfully Update Product Details.','You have Update Product details sucessfully please check once..!');
			redirect(base_url('cpanel/dashboard/productslist'));
		}else{
			$this->failedalert('Failed to Update Product Details.','Unable to Update Product details or oops error..!');
			redirect(base_url('cpanel/dashboard/productslist'));
		}
	}

	public function productDelete(){
		$id = $this->uri->segment(4);
		if($id != '') {
			$conduction = array('id'=>$id);
			$updatedata = array('status'=>0);
			$updated = $this->Model_default->update_data('meat_products',$updatedata,$conduction);
			if($updated != 0){
				$this->Model_default->update_data('meat_product_price_details',$updatedata,array('product_id'=>$id));
				$this->session->set_flashdata('success','Successfully delete product..!');
				redirect(base_url('cpanel/dashboard/productslist'));
			}else{
				$this->session->set_flashdata('failed','Failed to delete product.!');
				redirect(base_url('cpanel/dashboard/productslist'));
			}
		}else{
			$this->session->set_flashdata('failed','Invalid request to delete data.!');
			redirect(base_url('cpanel/dashboard/productslist'));
		}
	}

	public function productsList(){
		$data['userdata'] = $this->session->userdata('loginuserdata');
		$data['pagetitle']	=	'Projects list';
		$data['categories']	=	$this->Model_default->select_data('meat_categories',array('status'=>1),'id DESC');
		$data['products']	=	$this->Model_default->select_data('meat_products',array('status'=>1),'updated DESC');
		$data['subcategories']	=	$this->Model_default->select_data('meat_sub_categories',array('status'=>1),'id DESC');
		$this->manualLoadView('cpanel/header','cpanel/products_list_page','cpanel/footer',$data);
	}

}
