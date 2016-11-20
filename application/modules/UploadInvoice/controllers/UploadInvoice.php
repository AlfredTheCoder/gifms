<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadinvoice extends MX_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('uploadinvoice_model');
	    $this->load->module('template');
	}

	public function index(){
		$data['page_header'] = 'Upload Invoice';
		$data['content_view'] = 'uploadinvoice/uploadinvoice_view';
		$data['active_menu'] = 'uploadinvoice';
		$data['page_title'] = 'GIFMS | Upload Invoice';
		$this->template->load_view($data);
	}

	public function invoices_view(){
		$data['page_header'] = 'Receive Project Invoice';
		$data['content_view'] = 'uploadinvoice/invoices_view';
		$data['active_menu'] = 'suppliers';
		$data['page_title'] = 'GIFMS | Invoices';
		$this->template->load_view($data);
	}

	public function get_supplier(){
		$suppliers = $this->uploadinvoice_model->get_supplier();
	   	foreach ($suppliers as $supplier){
			$data[] = array(
				'id' => $supplier['id'], 
				'text' => $supplier['supplier']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_lpo(){
		$lpos = $this->uploadinvoice_model->get_lpo();
	   	foreach($lpos as $lpo) {
			$data[] = array(
				'id' => $lpo['id'], 
				'text' => $lpo['lpostatus']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_office_shared_cost(){
		$banks = $this->supplier_model->get_office_shared_cost();
	   	foreach($banks as $bank) {
			$data[] = array(
				'id' => $bank['id'], 
				'text' => $bank['bankname']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_office_cost_account($bank_id){ 
		$bankbranch = $this->supplier_model->get_office_cost_account($bank_id);
		foreach($bankbranch as $branch){
			$data[] = array(
				'id' => $branch['id'], 
				'text' => $branch['bankbranch']
			);			 	
		} 
		echo json_encode($data);
	}

	public function get_recurring_invoice(){
		$categories = $this->supplier_model->get_recurring_invoice();
	   	foreach($categories as $category) {
			$data[] = array(
				'id' => $category['id'], 
				'text' => $category['supplycategory']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_payment_modes(){
		$modes = $this->uploadinvoice_model->get_payment_modes();
	   	foreach($modes as $mode) {
			$data[] = array(
				'id' => $mode['id'], 
				'text' => $mode['paymentmode']
			);			 	
	   	} 
		echo json_encode($data);
	}
	
	public function get_country(){
		$countrys = $this->uploadinvoice_model->get_country();
	   	foreach($countrys as $country) {
			$data[] = array(
				'id' => $country['id'], 
				'text' => $country['country']
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