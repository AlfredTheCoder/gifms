<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}
	public function authenticate($authdata)
	{
		$sql = "SELECT * 
				FROM Employees e 
				INNER JOIN Stations s ON s.STID = e.station
				INNER JOIN SecurityLevel sl ON sl.ID = e.SecurityGroup
				WHERE email = ?";
        $query = $this->db->query($sql, array($authdata['email']));
        return $query->row_array();
	}

	public function update_last_logged($user_id)
	{	
		$sql = "UPDATE Employees
				SET LastLogged = GETDATE() 
				WHERE EID = ?";
        $this->db->query($sql, array($user_id));
	}

	public function log_user($log_data = array()){
		$this->db->insert('LogTime', $log_data);
		return $this->db->insert_id();
	}
}