<?php	
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier_model extends CI_Model{
	public function __construct()  
	{
		parent::__construct();
	}
	
	public function get_cities(){	
		$sql = "SELECT cityidd,city FROM citys";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
	public function get_payment_modes(){
		$sql = "SELECT id,paymentmode FROM paymentmodes";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
	public function get_banks(){
		$sql = "SELECT id,bankname FROM banks";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
	public function get_bank_branch($bank_id){
		$sql = "SELECT id,bankbranch FROM bankbranches WHERE bank = ?";
		$query = $this->db->query($sql, array($bank_id));
		return $query -> result_array();
	}
	public function get_supply_categories(){
		$sql = "SELECT id,supplycategory FROM supplycategories";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
	public function get_staff(){
		$sql = "SELECT eid,firstname FROM employees";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
	public function get_suppliers($filter = 'All', $status = 'All'){
		if($filter != 'All')
		{
			$this->db->like('supplier', $filter, 'after');
		}
		if($status != 'All'){
			$this->db->where('status', $status);
		}
		$query = $this->db->select("supplier,contact,telephone,email,0 AS lpo, 0 AS invoice, 0 AS profile")->from('suppliers')->get();
		return $query->result_array();
	}
	public function add_Supplier(){
		$data = array(
		'supplier' => $this->input->post('supplier'),
		'taxpin' => $this->input->post('taxpin'),
		'contact' => $this->input->post('contact'),
		'addresss' => $this->input->post('addresss'),
		'city' => $this->input->post('city'),
		'telephone' => $this->input->post('telephone'),
		'email' => $this->input->post('email'),
		'website' => $this->input->post('website'),
		'paymentmode' => $this->input->post('paymentmode'),
		'bankaccount' => $this->input->post('bankaccount'),
		'usdaccount' => $this->input->post('usdaccount'),
		'bank' => $this->input->post('bank'),
		'bankbranch' => $this->input->post('bankbranch'),
		'bankcode' => $this->input->post('bankcode'),
		'swiftcode' => $this->input->post('swiftcode'),
		'mobilepaymentnumber' => $this->input->post('mobilepaymentnumber'),
		'mobilepaymentname' => $this->input->post('mobilepaymentname'),
		'chequeddressee' => $this->input->post('chequeddressee'),
		'status' => $this->input->post('status'),
		'categorysuppliers' => $this->input->post('categorysuppliers'),
		'staff' => $this->input->post('staff')
		);
		$this->db->insert('suppliers', $data);
	}
}