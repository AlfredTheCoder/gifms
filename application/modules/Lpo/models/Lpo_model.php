<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpo_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_lpo_status(){
		$sql = "SELECT 
					ls.ID,
					ls.LPOStatus,
					ls.NextStatus,
					ls.StatusSecurityLevel,
					ISNULL(l.StatusCount,0) AS StatusCount
				FROM LPOStatuses ls
				INNER JOIN LPOStatusView lsv ON lsv.LPOStatus = ls.ID AND lsv.SecurityLevel = ?
                LEFT JOIN(
                	SELECT Status,COUNT(*) as StatusCount 
                	FROM LPO 
                	WHERE (RequestedBy = ? OR ProjectManager = ?) 
                	GROUP BY Status
                ) l ON l.Status = ls.ID";
		        $query = $this->db->query($sql, array($this->session->userdata('SecurityGroup'), $this->session->userdata('EID'), $this->session->userdata('EID')));
        return $query->result_array();
	}

	public function get_lpo_status_items($status){
		$sql = "SELECT 
					CONVERT(VARCHAR(11),RequestDate,106) AS RequestDate,
					Title,
					CONCAT(e.FirstName, CONCAT(' ', e.LastName)) RequestedBy,
					s.Supplier,
					lq.Quotation,
					li.Amount
				FROM LPO l
				LEFT JOIN Employees e ON e.EID = l.RequestedBy
				LEFT JOIN Suppliers s ON s.ID = l.Supplier
				LEFT JOIN LPOQuotations lq ON lq.LPO = l.ID
				LEFT JOIN (
						SELECT 
							LPO,
							CASE WHEN VATCharge = 1 THEN CONCAT('Ksh.',FORMAT(SUM(UnitPrice * Qty) + SUM(UnitPrice * Qty * 0.16), 'N0')) 
							ELSE CONCAT('Ksh.',FORMAT(SUM(UnitPrice * Qty), 'N0')) 
							END AS Amount
						FROM LPOItems
						GROUP BY LPO,VATCharge
				) li ON li.LPO = l.ID
                WHERE (RequestedBy = ? OR ProjectManager = ?)
                AND l.Status = ?";
		        $query = $this->db->query($sql, array($this->session->userdata('EID'), $this->session->userdata('EID'), $status));
        return $query->result_array();
	}

}