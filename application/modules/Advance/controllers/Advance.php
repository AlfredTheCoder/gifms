<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advance extends MX_Controller {

	/**
	 * Advance main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('advance_model');
	    $this->load->module('template');
	   	$this->load->config('advance');
	}

	public function index()
	{	
		$data['advance_statuses'] = $this->advance_model->get_advance_status();
		$data['page_header'] = 'advance';
		$data['content_view'] = 'advance/advance_view';
		$data['active_menu'] = 'advances';
		$data['page_title'] = 'GIFMS | advance';
		$this->template->load_view($data);
	}

	public function request_advance_view(){
		$data['page_header'] = 'Request Advance';
		$data['content_view'] = 'advance/request_advance_view';
		$data['active_menu'] = 'advances';
		$data['page_title'] = 'GIFMS | Advance';
		$this->template->load_view($data);
	}

	public function get_expense_data($status){
		//Get data
		$table_data = $this->advance_model->get_advance_status_items($status);
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_expense_types(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,ExpenseType FROM ExpenseTypes WHERE ExpenseType LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['ExpenseType']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Expense Types Found');
		}
		echo json_encode($data);
	}

	public function get_programs(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,ProjectName,ProjectManager FROM Projects WHERE ProjectName LIKE ? AND Status = ?";
		$query = $this->db->query($sql, array('%'.$search.'%', 1));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'].'@'.$value['ProjectManager'], 
					'text' => $value['ProjectName']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Programs Found');
		}
		echo json_encode($data);
	}

	public function get_accounts(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,Account FROM Accounts2016 WHERE Account LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['Account']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Accounts Found');
		}
		echo json_encode($data);
	}

}
