<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance extends MX_Controller {

	/**
	 * Allowance main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('allowance_model');
	    $this->load->module('template');
	   	$this->load->config('allowance');
	}

	public function index()
	{	
		$data['allowance_statuses'] = $this->allowance_model->get_allowance_status();
		$data['page_header'] = 'Allowances';
		$data['content_view'] = 'allowance/allowance_view';
		$data['active_menu'] = 'allowances';
		$data['page_title'] = 'GIFMS | allowance';
		$this->template->load_view($data);
	}

	public function request_allowance_view(){
		$data['page_header'] = 'Request Allowances (MPESA)';
		$data['content_view'] = 'allowance/request_allowance_view';
		$data['active_menu'] = 'allowances';
		$data['page_title'] = 'GIFMS | Allowances';
		$this->template->load_view($data);
	}

	public function request_allowance_payee_view($allowance_id){
		$data['allowance_id'] = $allowance_id;
		$data['page_header'] = 'Allowances>>Payees';
		$data['content_view'] = 'allowance/request_allowance_payee_view';
		$data['active_menu'] = 'allowances';
		$data['page_title'] = 'GIFMS | Allowance';
		$this->template->load_view($data);
	}

	public function get_allowance_data($status){
		//Get data
		$table_data = $this->allowance_model->get_allowance_status_items($status);
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_allowance_payee_data($allowance_id){
		//Get data
		$table_data = $this->allowance_model->get_allowance_payees($allowance_id);
		//Format data
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_regions(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,Region FROM Regions WHERE Region LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['Region']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Region Found');
		}
		echo json_encode($data);
	}

	public function get_counties(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,County FROM Countys WHERE County LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['County']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No County Found');
		}
		echo json_encode($data);
	}

	public function get_programs(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,ProjectID,ProjectName FROM Projects WHERE ProjectID LIKE ? AND Status = ?";
		$query = $this->db->query($sql, array('%'.$search.'%', 0));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['ProjectID'].' : '.$value['ProjectName']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Programs Found');
		}
		echo json_encode($data);
	}

	public function get_program_managers($program_id){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT EID AS ID,CONCAT(e.FirstName, CONCAT(' ', e.LastName)) AS Manager
				FROM Projects p
				INNER JOIN Employees e ON e.EID = p.ProjectManager
				WHERE p.ID = ? ";
		$query = $this->db->query($sql, array($program_id));
		$filters = $query -> result_array();
		foreach ($filters as $item) {
			$data[] = array('id'=> $item['ID'], 'text' =>  strtoupper($item['Manager']));
		}
		echo json_encode($data);
	}

	public function get_accounts(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,Account FROM Accounts2016 WHERE Account LIKE ? AND AccountType = ?";
		$query = $this->db->query($sql, array('%'.$search.'%', 10));
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

	public function get_brevities(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,Berevity FROM PurposeBerevity WHERE Berevity LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['Berevity']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Accounts Found');
		}
		echo json_encode($data);
	}

	public function save_allowance(){
		//Add Allowance
		$allowance_id = $this->allowance_model->get_next_id('Allowances', 'ID');
		$allowance = array(
			'ID' => $allowance_id,
			'Meeting' => 0,
			'RequestedDate' => date('Y-m-d h:i:s'),
			'RequestedBy' => $this->session->userdata('EID'),
			'Project' =>  $this->input->post('program'),
			'Account' =>  $this->input->post('account'),
			'AllowanceType' => 0,	
			'Title' =>   $this->input->post('title'),
			'AllowanceDescription' =>  $this->input->post('description'),
			'Status' => 1,
			'ProjectManager' =>  $this->input->post('project_manager'),
			'Berevity' =>  $this->input->post('brevity'),
			'Region' =>  $this->input->post('region'),
			'County' =>  $this->input->post('county')
		);
		$this->allowance_model->save('Allowances', $allowance);

		//Upload Allowance Payees
		if($this->input->post('payees_csv')){

			$this -> load -> library('PHPExcel');
			$tmp_file = $_FILES["mpesa_payees"]["tmp_name"];
			$objPHPExcel = PHPExcel_IOFactory::createReader(PHPExcel_IOFactory::identify($tmp_file))-> load($tmp_file);
			$highestRow = $objPHPExcel -> setActiveSheetIndex(0) -> getHighestRow();
			
			$initial_row = $this->config->item('initial_row');
			$columns = $this->config->item('mpesa_columns');

			for ($i = $initial_row; $i <= $highestRow; $i++) {
				$payee_id = $this->allowance_model->get_next_id('AllowancePayees', 'ID');
				$amount = $objPHPExcel->getActiveSheet()->getCell($columns['amount']. $i)->getValue();
				$mpesa_charges = $this->allowance_model->get_mpesa_charges($amount);
				$payee = array(
					'ID' => $payee_id,
					'AllowanceRequest' => $allowance_id,
					'Name' => $objPHPExcel->getActiveSheet()->getCell($columns['name']. $i)->getValue(),
					'Amount' => $amount,
					'MPESA' =>  $mpesa_charges,
					'Total' =>  ($amount + $mpesa_charges),
					'MobileNumber' => $objPHPExcel->getActiveSheet()->getCell($columns['phone']. $i)->getFormattedValue(),	 
					'Paid' => 0
				);
				$this->allowance_model->save('AllowancePayees', $payee);
			}
		}
		redirect('requestallowances/payees/'.$allowance_id);
	}

	public function save_allowance_payee(){
		$payee_id = $this->allowance_model->get_next_id('AllowancePayees', 'ID');
		$allowance_id = $this->input->post('allowance_id');
		$amount = $this->input->post('amount');
		$mpesa_charges = $this->allowance_model->get_mpesa_charges($amount);
		$payee = array(
			'ID' => $payee_id,
			'AllowanceRequest' => $allowance_id,
			'Name' => $this->input->post('name'),
			'Amount' => $amount,
			'MPESA' =>  $mpesa_charges,
			'Total' =>  ($amount + $mpesa_charges),
			'MobileNumber' => $this->input->post('phone'),	
			'Paid' =>   0
		);
		$this->allowance_model->save('AllowancePayees', $payee);
		redirect('requestallowances/payees/'.$allowance_id);
	}

}
