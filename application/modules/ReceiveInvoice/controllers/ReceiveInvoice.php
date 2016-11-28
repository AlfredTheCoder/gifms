<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiveinvoice extends MX_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('receiveinvoice_model');
	    $this->load->module('template');
	}

	public function index(){
		$data['page_header'] = 'Receive Project Invoice';
		$data['content_view'] = 'receiveinvoice/receiveinvoice_view';
		$data['active_menu'] = 'receive invoice';
		$data['page_title'] = 'GIFMS | Receive Invoice';
		$this->template->load_view($data);
	}

	public function get_supplier(){ 
		$suppliers = $this->receiveinvoice_model->get_supplier();
	   	foreach ($suppliers as $supplier){
			$data[] = array(
				'id' => $supplier['id'], 
				'text' => $supplier['supplier']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_lpo(){
		$lpos = $this->receiveinvoice_model->get_lpo();
	   	foreach($lpos as $lpo) {
			$data[] = array(
				'id' => $lpo['id'], 
				'text' => $lpo['lpostatus']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_office_shared_cost(){
		$sharedcost = $this->receiveinvoice_model->get_office_shared_cost();
	   	foreach($sharedcost as $cost) {
			$data[] = array(
				'id' => $cost['id'], 
				'text' => $cost['apportionmentplan']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_office_cost_account(){ 
		$costaccount = $this->receiveinvoice_model->get_office_cost_account();
		foreach($costaccount as $account){
			$data[] = array(
				'id' => $account['id'], 
				'text' => $account['account']
			);			 	
		} 
		echo json_encode($data);
	}

	public function get_recurring_invoice(){
		$recurringinvoice = $this->receiveinvoice_model->get_recurring_invoice();
	   	foreach($recurringinvoice as $invoice) {
			$data[] = array(
				'id' => $invoice['id'], 
				'text' => $invoice['recurrperiod']
			);			 	
	   	} 
		echo json_encode($data);
	}

	public function get_payment_modes(){
		$modes = $this->receiveinvoice_model->get_payment_modes();
	   	foreach($modes as $mode) {
			$data[] = array(
				'id' => $mode['id'], 
				'text' => $mode['paymentmode']
			);			 	
	   	} 
		echo json_encode($data);
	}
	
	public function get_country(){
		$countrys = $this->receiveinvoice_model->get_country();
	   	foreach($countrys as $country) {
			$data[] = array(
				'id' => $country['id'], 
				'text' => $country['country']
			);			 	
	   	} 
		echo json_encode($data);
	}

}