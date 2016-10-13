<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_user_menus(){
		$sql = "SELECT 
					m.Menu, m.URL, m.FootNote
				FROM menurights mr
				INNER JOIN menus m ON mr.menu = m.id
				INNER JOIN stations s ON s.licenselevel = mr.licenselevel
				WHERE s.STID = ? 
				AND mr.SecurityGroup = ? 
				AND mr.licenselevel = ? 
				AND m.MenuGroup = ?
				ORDER BY m.Ord asc";
		        $query = $this->db->query($sql, array($this->session->userdata('STID'), $this->session->userdata('SecurityGroup'), 3, 1));
        return $query->result_array();
	}

	public function get_user_side_menus(){
		$sql = "SELECT 
					m.Menu, m.URL, m.FootNote
				FROM menurights mr
				INNER JOIN menus m ON mr.menu = m.id
				INNER JOIN stations s ON s.licenselevel = mr.licenselevel
				WHERE s.STID = ? 
				AND mr.SecurityGroup = ? 
				AND mr.licenselevel = ? 
				AND m.MenuGroup = ?
				ORDER BY m.Ord asc";
		        $query = $this->db->query($sql, array($this->session->userdata('STID'), $this->session->userdata('SecurityGroup'), 3, 2));
        return $query->result_array();
	}
}