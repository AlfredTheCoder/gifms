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
	   	$this->load->config('lpo');
	}

	public function index()
	{	
		$data['lpo_statuses'] = $this->lpo_model->get_lpo_status();
		$data['page_header'] = 'LPO';
		$data['content_view'] = 'lpo/lpo_view';
		$data['active_menu'] = 'lpo';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_view(){
		$data['page_header'] = 'Request LPO';
		$data['content_view'] = 'lpo/request_view';
		$data['active_menu'] = 'lpo';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_items_view($lpo_id, $quotation_id){
		$data['lpo_id'] = $lpo_id;
		$data['quotation_id'] = $quotation_id;
		$data['page_header'] = 'LPO>>Items';
		$data['content_view'] = 'lpo/request_item_view';
		$data['active_menu'] = 'lpo';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function request_lpo_terms_view($lpo_id){
		$data['lpo_id'] = $lpo_id;
		$data['page_header'] = 'LPO>>Terms';
		$data['content_view'] = 'lpo/request_term_view';
		$data['active_menu'] = 'lpo';
		$data['page_title'] = 'GIFMS | LPO';
		$this->template->load_view($data);
	}

	public function get_lpo_data($status){
		//Get data
		$table_data = $this->lpo_model->get_lpo_status_items($status);
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$quotation_file = $row['Quotation'];
			$lpo_id = $row['Terms']; 
			$quotation_id = $row['LineItems'];

			$row['Quotation'] = "<a href='".base_url()."public/files/quotations/".$quotation_file."'><i class='fa fa-low-vision' aria-hidden='true'></i></a>";
			$row['LineItems'] = "<a href='".base_url()."requestlpo/items/".$lpo_id."/".$quotation_id."'><i class='fa fa-pencil-square-o aria-hidden='true'></i></a>";
			$row['Terms'] = "<a href='".base_url()."requestlpo/terms/".$lpo_id."'><i class='fa fa-file-text-o aria-hidden='true'></i></a>";
			$row['preview'] = "<a href='#'><i class='fa fa-files-o aria-hidden='true'></i></a>";
			$row['actions'] = "<a href='#'><i class='fa fa-share aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".base_url()."lpo/delete/".$lpo_id."' class='delete'><i class='fa fa-times alert-danger' aria-hidden='true'></i></a>";
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_lpo_item_data($lpo_id, $quotation_id){
		//Get data
		$table_data = $this->lpo_model->get_lpo_items($lpo_id, $quotation_id);
		//Format data
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$id = $row['is_delete'];
			$row['is_delete'] = "<a href='".base_url()."requestlpo/items/delete/".$id."' class='delete'><i class='fa fa-times alert-danger' aria-hidden='true'></i></a>";
			$data['data'][] = array_values($row);
		}
		echo json_encode($data);
	}

	public function get_lpo_term_data($lpo_id){
		//Get data
		$table_data = $this->lpo_model->get_lpo_terms($lpo_id);
		//Format data
		$data = array('data' => array());
		foreach ($table_data as $row) {
			$id = $row['is_delete'];
			$row['is_delete'] = "<a href='".base_url()."requestlpo/terms/delete/".$id."' class='delete'><i class='fa fa-times alert-danger' aria-hidden='true'></i></a>";
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
		$sql = "SELECT ID,ProjectID,ProjectManager FROM Projects WHERE ProjectID LIKE ? AND Status = ?";
		$query = $this->db->query($sql, array('%'.$search.'%', 1));
		$list = $query -> result_array();
		if(count($list) > 0){
		   	foreach ($list as $key => $value) {
				$data[] = array(
					'id' => $value['ID'].'@'.$value['ProjectManager'], 
					'text' => $value['ProjectID']
				);			 	
		   	} 
		} 
		else {
		   $data[] = array('id' => '0', 'text' => 'No Programs Found');
		}
		echo json_encode($data);
	}
	
	public function get_mailing_list(){
		//Set mailing list
		$mailing_list = array();
		$mailing_list['to'] = $this->config->item('to');
		$mailing_list['cc'] = $this->config->item('cc');
		$mailing_list['cc'][] = $this->session->userdata('email');
		$mailing_list['bcc'] = $this->config->item('bcc');

		echo json_encode($mailing_list);
	}

	public function save_lpo(){
		//Split project id & manager
		$program = explode('@', $this->input->post('program'));

		//Add LPO
		$lpo_id = $this->lpo_model->get_next_id('LPO', 'ID');
		$lpo = array(
			'ID' => $lpo_id,
			'Title' => $this->input->post('title'),
			'Supplier' => $this->input->post('supplier'),
			'RequestedBy' => $this->session->userdata('EID'),
			'RequestDate' => date('Y-m-d'),
			'Meeting' => 0,
			'Status' => 2, //Request Uploaded Pending Submission	
			'Attention' =>  $this->input->post('attention'),
			'LPOEmail' => implode(',', $this->input->post('email_to')),
			'LPOCurrency' => $this->input->post('currency'),
			'QuoteExempt' => $this->input->post('exemption_choice'),
			'QuotesExemptExplaination' => $this->input->post('reason_for_exemption'),
			'ProjectManager' => $program[1],
			'Project' => $program[0] 
		);
		$this->lpo_model->save('LPO', $lpo);

		//Upload LPO Quotation & Options 
	    $this->load->library('upload');
	    $files = $_FILES;
	    $cpt = count($_FILES['quotation']['name']);
	    $upload_errors = array();
	    for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['quotation']['name']= $files['quotation']['name'][$i];
	        $_FILES['quotation']['type']= $files['quotation']['type'][$i];
	        $_FILES['quotation']['tmp_name']= $files['quotation']['tmp_name'][$i];
	        $_FILES['quotation']['error']= $files['quotation']['error'][$i];
	        $_FILES['quotation']['size']= $files['quotation']['size'][$i];    

	        $this->upload->initialize($this->config->item('upload_options'));
	        if ($this->upload->do_upload('quotation')){
	        	//Add LPO Quotation 
	        	$quotation_id = $this->lpo_model->get_next_id('LPOQuotations', 'ID');
				$quotations = array(
					'ID' => $quotation_id,
					'Quotation' => $files['quotation']['name'][$i],
					'Supplier' => $this->input->post('supplier'),
					'UploadedBy' => $this->session->userdata('EID'),
					'QuoteDate' => date('Y-m-d'),
					'QuoteDescription' => $this->input->post('title'),
					'QuoteOption' => $i + 1 
				);

				//Only for quotation
				if($i == 0){
					$quotations['LPO'] = $lpo_id;
					//Update LPO with quotation
					$main_quotation_id = $quotation_id;
					$this->lpo_model->save('LPOQuotations', $quotations);
					$this->lpo_model->update('LPO', array('Quotation' => $quotation_id), array('ID' => $lpo_id));
				}else{
					$this->lpo_model->save('LPOQuotations', $quotations);
				}

	        }else{
	        	 $upload_errors[] = $this->upload->display_errors();
	        }
	    }

		//Add Default LPO Terms
		$default_terms = $this->config->item('terms');
		foreach($default_terms as $term){
			$term_id = $this->lpo_model->get_next_id('LPOTerms', 'ID');
			$terms = array(
				'ID' => $term_id,
				'LPO' => $lpo_id, 
				'Terms' => $term
			);
			$this->lpo_model->save('LPOTerms', $terms);
		}
		
		redirect('requestlpo/items/'.$lpo_id.'/'.$main_quotation_id);
	}

	public function save_lpo_item(){
		$item_id = $this->lpo_model->get_next_id('LPOItems', 'ID');
		$item = array(
			'ID' => $item_id,
			'Item' => $this->input->post('item'),
			'ItemDescription' => $this->input->post('item_description'),
			'UnitPrice' => $this->input->post('unit_price'),
			'VATCharge' => $this->input->post('vat_charge'),
			'Qty' => $this->input->post('quantity'),
			'QuantityDescription' => $this->input->post('quantity_description'),
			'Quotation' => $this->input->post('quotation_id'),
			'LPO' => $this->input->post('lpo_id')
		);
		$this->lpo_model->save('LPOItems', $item);

		redirect('requestlpo/items/'.$this->input->post('lpo_id').'/'.$this->input->post('quotation_id'));
	}

	public function save_lpo_term(){
		$term_id = $this->lpo_model->get_next_id('LPOTerms', 'ID');
		$term = array(
			'ID' => $term_id,
			'Terms' => $this->input->post('terms'),
			'LPO' => $this->input->post('lpo_id')
		);
		$this->lpo_model->save('LPOTerms', $term);

		redirect('requestlpo/terms/'.$this->input->post('lpo_id'));
	}

	public function request_lpo_delete($table, $conditions){
		if(!is_array($conditions)){
			$conditions = array('ID' => $conditions);
		}
		$this->lpo_model->delete($table, $conditions);
		//Go back to previous page
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}

	public function delete($id){
		$this->request_lpo_delete('LPO', $id);
		$this->request_lpo_delete('LPOQuotations', array('LPO' => $id));
		$this->request_lpo_delete('LPOItems', array('LPO' => $id));
		$this->request_lpo_delete('LPOTerms', array('LPO' => $id));
		//Go back to previous page
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}

}
