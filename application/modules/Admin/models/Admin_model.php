<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
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

}