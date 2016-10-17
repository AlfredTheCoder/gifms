<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpo extends MX_Controller {

	/**
	 * Lpo main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('lpo_model');
	    $this->load->module('template');
	}

	public function index()
	{	
		$data['lpo_statuses'] = $this->lpo_model->get_lpo_status();
		$data['page_header'] = 'LPO';
		$data['content_view'] = 'lpo/lpo_view';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_view(){
		$data['page_header'] = 'Request LPO';
		$data['content_view'] = 'lpo/request_view';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_items_view(){
		$data['page_header'] = 'LPO>>Items';
		$data['content_view'] = 'lpo/request_item_view';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_terms_view(){
		$data['page_header'] = 'LPO>>Terms';
		$data['content_view'] = 'lpo/request_term_view';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function get_lpo_data($status){
		//Get data
		$table_data = $this->lpo_model->get_lpo_status_items($status);
		//Format data
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_suppliers(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ID,Supplier,Email,Contact FROM Suppliers WHERE Supplier LIKE ?";
		$query = $this->db->query($sql, array('%'.$search.'%'));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'], 
					'text' => $value['Supplier'], 
					'email' => $value['Email'], 
					'attention' => $value['Contact']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Suppliers Found');
		}
		echo json_encode($data);
	}

	public function get_programs(){
		$search = strip_tags(trim($this->input->get('q')));
		$sql = "SELECT ProjectID,ProjectName FROM Projects WHERE ProjectName LIKE ? AND Status = ?";
		$query = $this->db->query($sql, array('%'.$search.'%', 1));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ProjectID'], 
					'text' => $value['ProjectName']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Programs Found');
		}
		echo json_encode($data);
	}
}
