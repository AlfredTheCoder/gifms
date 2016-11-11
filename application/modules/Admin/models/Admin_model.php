<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_table_data($tablename, $columns){
		$this->db->select($columns);
		$query = $this->db->get($tablename);
        return $query->result_array();
	}

}