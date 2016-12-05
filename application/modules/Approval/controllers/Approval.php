<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends MX_Controller {

	/**
	 * Approval main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('approval_model');
	    $this->load->module('template');
	   	$this->load->config('approval');
	}

	public function index()
	{	
		$data['approval_statuses'] = $this->approval_model->get_approval_status();
		$data['page_header'] = 'Approvals';
		$data['content_view'] = 'approval/approval_view';
		$data['active_menu'] = 'approval';
		$data['page_title'] = 'GIFMS | Approval';
		$this->template->load_view($data);
	}


	public function get_approval_data($approval_table){
		//Get data
		$columns = $this->config->item('columns')[$approval_table];
		$table_data = $this->approval_model->get_approval_items($approval_table);
		$data = array('columns' => array(), 'data' => array());
		foreach ($table_data as $row) {
			$data['data'][] = array_values($row);
		}
		//Get columns 
		foreach ($columns as $key => $column) {
			$data['columns'][] = array('title' => $column);
		}
		echo json_encode($data);
	}

}
