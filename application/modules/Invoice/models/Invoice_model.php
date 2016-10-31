<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}

	public function get_invoice_status(){
		$sql = "SELECT 
					cs.ID,
					cs.invoiceStatus,
					cs.NextStatus,
					cs.StatusSecurityLevel,
					ISNULL(e.StatusCount,0) AS StatusCount
				FROM invoiceStatus cs
				INNER JOIN invoiceStatusView csv ON csv.invoiceStatus = cs.ID AND csv.SecurityLevel = ?
                LEFT JOIN(
                	SELECT invoice, COUNT(*) as StatusCount 
                	FROM Expenses 
                	WHERE (Staff = ?) 
                	GROUP BY invoice
                ) e ON e.invoice = cs.ID";
		        $query = $this->db->query($sql, array($this->session->userdata('SecurityGroup'), $this->session->userdata('EID')));
        return $query->result_array();
	}

	public function get_invoice_status_items($status){
		$sql = "SELECT 
					ex.UploadDate,
					ex.Description AS Title,
					CONCAT(e.FirstName, CONCAT(' ', e.LastName)) RequestedBy,
					p.ProjectID AS Program,
					'N/A' AS Status,
					CONCAT(c.Currency,CONCAT('. ',ex.Amount)) AS Amount, 
					'N/A' AS Payees,
					'N/A' AS Instruction
				FROM Expenses ex
				INNER JOIN Employees e ON e.EID = ex.Staff
				INNER JOIN Projects p ON p.ID = ex.Program
				INNER JOIN Currencys c ON c.ID = ex.ExpenseCurrency
                WHERE ex.Staff = ? 
                AND ex.invoice = ?";
		        $query = $this->db->query($sql, array($this->session->userdata('EID'), $status));
        return $query->result_array();
	}

}