<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	/**
	 * User main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function authenticate(){
		$authdata = $this->input->post();
		#Hash password
		$authdata['password'] = $this->encrypt_password($authdata['password']);
		#Use User_model to authenticate user
		$userdata = $this->user_model->authenticate($authdata);
		#Set userdata into session
		if($userdata){	
			//Disabled account
			if($userdata['Status'] == 2){
	        	$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Failed! Sorry this Account is Disabled</div>';
			}else{
				//Matching passwords
				if($authdata['password'] == $userdata['PasswdOne']){
					//Create session
		        	$this->session->set_userdata($userdata);
		        	//Update last login
		        	$this->user_model->update_last_logged($userdata['EID']);
		        	//Create user log
		        	$log_data = array(
		        		'EID' => $userdata['EID'],
		        		'LogTime' => date('Y-m-d H:i:s'),
		        		'LogDate' => date('Y-m-d'),
		        		'IPAddress' => $this->input->ip_address(),
		        		'ID' => rand()
		        	);
		        	$this->user_model->log_user($log_data);
		        	$home_page = str_ireplace('.x', '', $userdata['HomePage']);
		        	redirect('lpo'); //replace with $home_page
				}else{
					$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Failed! Incorrect Password</div>';
				}
			}
		}else{
			//No matching email
        	$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Failed! Unregistered Email Address</div>';
		}
		$this->session->set_flashdata('login_msg', $message);
        redirect('login');
	}

	public function encrypt_password($password_str){
		$offset = 8;
		$encrypted_password = '';
		for ($i = 1; $i <= strlen($password_str); $i++) 
		{
			$encrypted_password.=chr((ord(substr($password_str,$i-1,1)) + $offset));
		}
		return $encrypted_password;
	}

	public function logout(){	
    	$this->session->sess_destroy();
    	redirect('login');
    }
}
