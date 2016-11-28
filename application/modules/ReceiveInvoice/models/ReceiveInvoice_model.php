<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiveinvoice_model extends CI_Model{
	public function __construct() 
	{
		parent::__construct();
	} 
	
	public function get_supplier(){	
		$sql = "SELECT id,supplier FROM suppliers order by supplier asc";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_lpo(){
		$sql = "SELECT id, lpostatus from lpostatuses";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_office_shared_cost(){
		$sql = "SELECT id,apportionmentplan FROM sharedcostapportionmentplans";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_office_cost_account(){
		$sql = "SELECT id, account FROM accounts2016 order by account";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_recurring_invoice(){
		$sql = "SELECT id,recurrperiod FROM recurringperiods";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_payment_modes(){
		$sql = "SELECT id,paymentmode FROM paymentmodes";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}

	public function get_country(){
		$sql = "SELECT id,country FROM countrys";
		$query = $this->db->query($sql);
		return $query -> result_array();
	}
}