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

	public function get_allowance_data($status){
		//Get data
		$table_data = $this->allowance_model->get_allowance_status_items($status);
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
		$query = $this->db->query($sql, array('%'.$search.'%', 1));
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

}
