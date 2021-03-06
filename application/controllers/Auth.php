<?php
#===================================================|
# Please DO NOT modify this information :			      |
#---------------------------------------------------|
# @Author 		: Susantokun
# @Date 		  : 2018-05-25T05:18:17+07:00
# @Email 		  : susantokun.com@gmail.com
# @Project 		: CodeIgniter
# @Filename 	: Auth.php
# @Instagram 	: susantokun
# @Website 		: http://www.susantokun.com
# @Youtube 		: http://youtube.com/susantokun
# @Last modified time: 2018-05-25T06:57:45+07:00
#===================================================|

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='admin'){
          $this->load->view('dashboard1');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      $this->load->view('dashboard2');
    }else{
        echo "Access Denied";
    }
  }
}
