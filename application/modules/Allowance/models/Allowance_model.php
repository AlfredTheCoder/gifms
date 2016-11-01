<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_allowance_status(){
		$sql = "SELECT 
					s.ID,
					s.AllowanceStatus,
					s.NextStatus,
					s.StatusSecurityLevel,
					ISNULL(a.StatusCount,0) AS StatusCount
				FROM AllowanceStatuses s
				INNER JOIN AllowanceStatusView asv ON asv.AllowanceStatus = s.ID AND asv.SecurityLevel = ?
                LEFT JOIN(
                	SELECT Status, COUNT(*) as StatusCount 
                	FROM Allowances 
                	WHERE (RequestedBy = ? OR ProjectManager = ?) 
                	GROUP BY Status
                ) a ON a.Status = s.ID";
		        $query = $this->db->query($sql, array($this->session->userdata('SecurityGroup'), $this->session->userdata('EID'), $this->session->userdata('EID')));
        return $query->result_array();
	}

	public function get_allowance_status_items($status){
		$sql = "SELECT 
					a.RequestedDate,
					a.Title,
					CONCAT(e.FirstName, CONCAT(' ', e.LastName)) RequestedBy,
					p.ProjectID AS Program,
					als.AllowanceStatus AS Status,
					ap.Amount, 
					'N/A' AS Payees,
					'N/A' AS Instruction,
					'N/A' AS Copy
				FROM Allowances a
				INNER JOIN Employees e ON e.EID = a.RequestedBy
				INNER JOIN Projects p ON p.ID = a.Project
				INNER JOIN AllowanceStatuses als ON als.ID = a.Status
				LEFT JOIN (
						SELECT 
							AllowanceRequest,
							SUM(Amount) AS Amount
						FROM AllowancePayees
						GROUP BY AllowanceRequest
				) ap ON ap.AllowanceRequest = a.ID
                WHERE (a.RequestedBy = ? OR a.ProjectManager = ?)
                AND a.Status = ?";
		        $query = $this->db->query($sql, array($this->session->userdata('EID'), $this->session->userdata('EID'), $status));
        return $query->result_array();
	}

	public function get_allowance_payees($allowance_id){
		$sql = "SELECT 
					Name,
					MobileNumber,
					Amount,
					MPESA,
					FORMAT((Amount+MPESA), 'N0') AS Total
				FROM AllowancePayees
                WHERE AllowanceRequest = ?";
		        $query = $this->db->query($sql, array($allowance_id));
        return $query->result_array();
	}

	public function get_next_id($table, $column){
		$this->db->select_max($column);
		$query = $this->db->get($table);
		return $query->row_array()[$column] + 1;
	}

	public function save($table, $savedata){
		$this->db->insert($table, $savedata);
	}


	public function get_mpesa_charges($amount){
		$sql = "SELECT 
					Tarrif
				FROM MPESATarrifs
                WHERE $amount >= MinLimit 
                AND $amount <= MaxLimit";
		        $query = $this->db->query($sql);
        $result = $query->row_array();
        $tarrif = 0;
        if(!empty($result)){
        	$tarrif = $result['Tarrif'];
        }
        return $tarrif;
	}

}