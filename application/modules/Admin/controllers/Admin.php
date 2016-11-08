<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	/**
	 * Admin main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('admin_model');
	    $this->load->module('template');
	   	$this->load->config('admin');
	}

	public function index()
	{	
		$data['menus'] = $this->config->item('menus'); 
		$data['sidemenus'] = $this->config->item('sidemenus'); 
		$data['page_header'] = 'Admin';
		$data['content_view'] = 'admin/admin_view';
		$data['active_menu'] = 'admin';
		$data['page_title'] = 'GIFMS | Admin';
		$this->template->load_view($data);
	}

	public function get_table_data($sidemenu){

	}

}
