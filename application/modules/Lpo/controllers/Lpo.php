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
}
