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
					l.Quotation AS LineItems,
					l.ID AS Terms,
					CONCAT(c.Currency,CONCAT('. ',li.Amount)) AS Amount, 
					'preview' AS preview,
					'submit/approve' AS actions
				FROM LPO l
				LEFT JOIN Employees e ON e.EID = l.RequestedBy
				LEFT JOIN Suppliers s ON s.ID = l.Supplier
				LEFT JOIN LPOQuotations lq ON lq.LPO = l.ID
				LEFT JOIN Currencys c ON c.ID = l.LPOCurrency
				LEFT JOIN (
						SELECT 
							LPO,
							CASE WHEN VATCharge = 0 THEN FORMAT(SUM(UnitPrice * Qty) + SUM(UnitPrice * Qty * 0.16), 'N0')
							ELSE FORMAT(SUM(UnitPrice * Qty), 'N0')
							END AS Amount
						FROM LPOItems
						GROUP BY LPO,VATCharge
				) li ON li.LPO = l.ID
                WHERE (RequestedBy = ? OR ProjectManager = ?)
                AND l.Status = ?";
		        $query = $this->db->query($sql, array($this->session->userdata('EID'), $this->session->userdata('EID'), $status));
        return $query->result_array();
	}

	public function get_lpo_items($lpo_id, $quotation_id){
		$sql = "SELECT 
					Item,
					Qty,
					UnitPrice,
					FORMAT((Qty*UnitPrice),'N0') AS SubTotal,
					CASE WHEN VATCharge = 0 THEN FORMAT((UnitPrice*0.16*Qty),'N0') ELSE FORMAT((UnitPrice*0*Qty),'N0') END AS VAT,
					CASE WHEN VATCharge = 0 THEN FORMAT((Qty*UnitPrice)+(UnitPrice*0.16*Qty),'N0') ELSE FORMAT((Qty*UnitPrice)+(UnitPrice*0*Qty),'N0') END AS Total,
					ID AS is_delete
				FROM LPOItems
                WHERE LPO = ? 
                AND Quotation = ?";
		        $query = $this->db->query($sql, array($lpo_id, $quotation_id));
        return $query->result_array();
	}

	public function get_lpo_terms($lpo_id){
		$sql = "SELECT 
					Terms,
					ID AS is_delete
				FROM LPOTerms
                WHERE LPO = ?";
		        $query = $this->db->query($sql, array($lpo_id));
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

	public function update($table, $updatedata, $conditions){
		$this->db->where($conditions);
		$this->db->update($table, $updatedata);
	}

	public function delete($table, $conditions){
		$this->db->where($conditions);
		$this->db->delete($table);
	}

}