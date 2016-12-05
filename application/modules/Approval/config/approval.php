<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Columns*/
$config['columns'] = array(
	'Invoices' => array('Date Received', 'Invoice Number', 'Supplier', 'Description', 'Amount', 'Program Manager', 'Status', 'Allocation', 'Preview', 'Voucher','Reject', 'Action'), 									
	'EmployeeAdvances' => array('Request Date', 'Staff', 'Description', 'Amount', 'Program Manager', 'Status', 'Reject', 'Approve'),
	'Conferences' => array(''),
	'LPO' => array('Request Date', 'Title', 'Supplier', 'Requested By', 'PM', 'Program', 'Amount', 'Quotation', 'Preview', 'Reject', 'Approve'),
	'Allowances' => array('Request Date', 'Title', 'Requested By', 'Program', 'Status', 'Amount', 'Payees', 'Instruction', 'Reject', 'Approve'),
	'StaffClaims' => array('')
);

