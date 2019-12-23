<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Sitedetails extends BaseController {

	public function __construct(){
        parent::__construct();
		$this->isLoggedIn();
        $this->load->model('Model_default');
    }

    //sitedetails
    public function sitedetails(){
        $data['userdata']   =   $this->session->userdata('loginuserdata');
        $data['pagetitle']	=	'About us page';
        $data['sitedetails']=	 $this->Model_default->select_data('meat_site_details',array('status'=>1),'updated DESC');
		$this->manualLoadView('cpanel/header','cpanel/sitedetails_page','cpanel/footer',$data);
    }

    public function saveSiteDetails(){
        extract($_REQUEST);
        $path = 'uploads/sitedetails/';
        if(file_exists($path)){
            $uploadfile = $this->uploadfiles($path,'SiteLogo','jpg|png|jpeg',TRUE);
        }else{
            $this->createdir($path,$path);
            $uploadfile = $this->uploadfiles($path,'SiteLogo','jpg|png|jpeg',TRUE);
        }

        if($uploadfile['status'] == 1){
            $uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
            $insertdata = array('site_name'=>$site_name,'site_url'=>$domain_name,'site_logo'=>$uploadedfile,'address'=>$address,'state'=>$state_name,'city'=>$city_name,'pincode'=>$pincode,'mobile'=>$mobile,'email_id'=>$mail_id,'facebook'=>$facebook_link,'twitter'=>$twitter_link,'instagram'=>$instagram_link,'linkedin'=>$linkedin_link,'updated'=>date('Y-m-d H:i:s'));
            $insertbanners = $this->Model_default->insert_data('meat_site_details',$insertdata);
            if($insertbanners != 0){
                $this->successalert('Successfully Saved Site Details.','You have Save Site details sucessfully please check once..!');
                redirect(base_url('cpanel/dashboard/sitedetails'));
            }else{
                $this->failedalert('Failed to save Site Details.','Unable to save Site details or oops error..!');
                redirect(base_url('cpanel/dashboard/sitedetails'));
            }
        }else{
            $this->failedalert('Image upload Failed. Try again..!','Unable to uload image file or oops error..!');
            redirect(base_url('cpanel/dashboard/sitedetails'));
        }
    }

    public function saveEditSiteDetails(){
        extract($_REQUEST);
        $path = 'uploads/sitedetails/';
        if(!empty($_FILES['SiteLogo']['name'])){
            $uploadfile = $this->uploadfiles($path,'SiteLogo','jpg|png|jpeg',TRUE);
            if($uploadfile['status'] == 1){
                //unlink last upload file
                $sitedetails = $this->Model_default->select_data('meat_site_details',array('id'=>$edit_id));
                @unlink($sitedetails[0]->site_logo);
                $uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
            }else{
                $this->failedalert('Image upload Failed. Try again..!','Unable to uload image file or oops error..!');
                redirect(base_url('cpanel/dashboard/sitedetails'));
            }
        }else{
            if(isset($Uploaded_image) && !empty($Uploaded_image)){
                $uploadedfile =  $Uploaded_image;
            }else{
                $uploadedfile = '';
            }
        }
        
        $uploadedfile = $path.$uploadfile['uploaddata']['file_name'];
        $insertdata = array('site_name'=>$site_name,'site_url'=>$domain_name,'site_logo'=>$uploadedfile,'address'=>$address,'state'=>$state_name,'city'=>$city_name,'pincode'=>$pincode,'mobile'=>$mobile,'email_id'=>$mail_id,'facebook'=>$facebook_link,'twitter'=>$twitter_link,'instagram'=>$instagram_link,'linkedin'=>$linkedin_link,'updated'=>date('Y-m-d H:i:s'));
        $conduction = array('id'=>$edit_id);
        $insertbanners = $this->Model_default->update_data('meat_site_details',$insertdata,$conduction);
        if($insertbanners != 0){
            $this->successalert('Successfully Saved site Details.','You have Save site details sucessfully please check once..!');
            redirect(base_url('cpanel/dashboard/sitedetails'));
        }else{
            $this->failedalert('Failed to save site Details.','Unable to save site details or oops error..!');
            redirect(base_url('cpanel/dashboard/sitedetails'));
        }
    }

}
