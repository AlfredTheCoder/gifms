<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MX_Controller {

	/**
	 * Invoice main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('invoice_model');
	    $this->load->module('template');
	   	$this->load->config('invoice');
	}

	public function index()
	{	
		$data['invoice_statuses'] = $this->invoice_model->get_invoice_status();
		$data['page_header'] = 'invoice';
		$data['content_view'] = 'invoice/invoice_view';
		$data['active_menu'] = 'invoices';
		$data['page_title'] = 'GIFMS | invoice';
		$this->template->load_view($data);
	}

	public function upload_expense_view(){
		$data['page_header'] = 'invoice Expenses';
		$data['content_view'] = 'invoice/upload_expense_view';
		$data['active_menu'] = 'invoices';
		$data['page_title'] = 'GIFMS | invoice';
		$this->template->load_view($data);
	}

	public function get_expense_data($status){
		//Get data
		$table_data = $this->invoice_model->get_invoice_status_items($status);
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
