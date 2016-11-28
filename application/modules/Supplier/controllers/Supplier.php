<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends MX_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('supplier_model');
	    $this->load->module('template');
	}
	public function index(){
		$data['page_header'] = 'Suppliers';
		$data['content_view'] = 'supplier/suppliers_view';
		$data['active_menu'] = 'suppliers';
		$data['page_title'] = 'GIFMS | Supplier';
		$this->template->load_view($data);
	}
	public function add_supplier_view(){
		$data['page_header'] = 'Add/Edit Supplier';
		$data['content_view'] = 'supplier/supplier_add';
		$data['active_menu'] = 'add new supplier';
		$data['page_title'] = 'GIFMS | Add New Supplier';
		$this->template->load_view($data);
	}
	public function get_cities(){
		$cities = $this->supplier_model->get_cities();
	   	foreach ($cities as $citi){
			$data[] = array(
				'id' => $citi['cityidd'], 
				'text' => $citi['city']
			);			 	
	   	} 
		echo json_encode($data);
	}
	public function get_payment_modes(){
		$modes = $this->supplier_model->get_payment_modes();
	   	foreach($modes as $mode) {
			$data[] = array(
				'id' => $mode['id'], 
				'text' => $mode['paymentmode']
			);			 	
	   	} 
		echo json_encode($data);
	}
	public function get_banks(){
		$banks = $this->supplier_model->get_banks();
	   	foreach($banks as $bank) {
			$data[] = array(
				'id' => $bank['id'], 
				'text' => $bank['bankname']
			);			 	
	   	} 
		echo json_encode($data);
	}
	public function get_bank_branch($bank_id){ 
		$bankbranch = $this->supplier_model->get_bank_branch($bank_id);
		foreach($bankbranch as $branch){
			$data[] = array(
				'id' => $branch['id'], 
				'text' => $branch['bankbranch']
			);			 	
		} 
		echo json_encode($data);
	}
	public function get_supply_categories(){
		$categories = $this->supplier_model->get_supply_categories();
	   	foreach($categories as $category) {
			$data[] = array(
				'id' => $category['id'], 
				'text' => $category['supplycategory']
			);			 	
	   	} 
		echo json_encode($data);
	}
	public function get_staff(){
		$staffs = $this->supplier_model->get_staff();
	   	foreach($staffs as $staff) {
			$data[] = array(
				'id' => $staff['firstname'], 
				'text' => $staff['lastname']
			);			 	
	   	} 
		echo json_encode($data);
	}
	public function get_suppliers($filter = "All", $status = 'All'){
		//Get data
		$table_data = $this->supplier_model->get_suppliers($filter, $status);
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$row['lpo'] = "<a href='#'class='pull-right'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></a>";
			$row['invoice'] = "<a href='#' class='pull-right'><i class='fa fa-file-o' aria-hidden='true'></i></a>";
			$row['profile'] = "<a href='#' class='pull-right'><i class='fa fa-user' aria-hidden='true'></i></a>";
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}
	public function save(){
		if( $this->input->post('submit') ) 
		{
			$this->supplier_model->add_Supplier();
		}
		redirect('supplier/index');  
	}
}