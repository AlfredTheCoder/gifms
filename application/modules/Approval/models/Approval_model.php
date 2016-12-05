<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_approval_status(){
		$data = array();
		$sql = "SELECT 
					a.ID,
					a.Approval,
					a.StatusTable,
					a.ApprovalTable, 	
					a.StatusField	
				FROM Approvals a
				INNER JOIN ApprovalAllocation aa ON aa.Approval = a.ID AND aa.SecurityLevel = ?
                ORDER BY a.DisplayOrder";
		$query = $this->db->query($sql, array($this->session->userdata('SecurityGroup')));
		$results = $query->result_array();

		foreach ($results as $result) {
			$StatusField = $result['StatusField'];
			$ApprovalTable = $result['ApprovalTable'];
			$StatusTable = $result['StatusTable'];
			//Get status count per approval type
			$sql = "SELECT COUNT(*) as StatusCount 
                	FROM $ApprovalTable a1
                	INNER JOIN $StatusTable a2 ON a2.ID = a1.$StatusField and a2.NextStatus = ?"; 
            $query = $this->db->query($sql, array($this->session->userdata('SecurityGroup')));
			$statusresults = $query->row_array();
			//Add count to main result
			$data[] = array(
				'ID' => $result['ID'], 
				'Approval' => $result['Approval'], 
				'StatusTable' => $result['StatusTable'], 
				'ApprovalTable' => $result['ApprovalTable'], 
				'StatusField' => $result['StatusField'], 
				'StatusCount' => $statusresults['StatusCount']
			);
		}

        return $data;
	}

	public function get_approval_items($approval_table){
		$results = array();
		if($approval_table == 'LPO'){
			$results = $this->get_lpo_approval_items();
		}
		return $results;
	}

	public function get_lpo_approval_items(){
		$sql = "SELECT 
					RequestDate Date, 
					Title, 
					s.Supplier, 
					CONCAT(e.FirstName, CONCAT(' ', e.LastName)) RequestedBy, 
					CONCAT(pm.FirstName, CONCAT(' ', pm.LastName)) PM, 
					p.ProjectID Project,
					CONCAT(c.Currency,CONCAT('. ',li.Amount)) AS Amount, 
					'quotation' quotation,
					'preview' preview,
					'reject' reject,
					'approve' approve
				FROM LPO l
				INNER JOIN LPOStatuses ls ON ls.ID = l.Status AND ls.NextStatus = ?
				INNER JOIN Suppliers s ON s.ID = l.Supplier
				INNER JOIN Employees e ON e.EID = l.RequestedBy
				INNER JOIN Employees pm ON pm.EID = l.ProjectManager
				INNER JOIN Projects p ON p.ID = l.Project
				INNER JOIN LPOQuotations lq ON lq.LPO = l.ID
				INNER JOIN Currencys c ON c.ID = l.LPOCurrency
				INNER JOIN (
					SELECT 
						LPO,
						CASE WHEN VATCharge = 0 THEN FORMAT(SUM(UnitPrice * Qty) + SUM(UnitPrice * Qty * 0.16), 'N0')
						ELSE FORMAT(SUM(UnitPrice * Qty), 'N0')
						END AS Amount
					FROM LPOItems
					GROUP BY LPO,VATCharge
				) li ON li.LPO = l.ID";
		$query = $this->db->query($sql, array($this->session->userdata('SecurityGroup')));
		return $query->result_array();
	}

}