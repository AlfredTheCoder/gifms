<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Menus*/
$config['menus'] = array();
/*Sidemenus*/
$config['sidemenus'] = array(
	'Organization Setup' => array(
		'Organizations'=> 'admin/get_table_data/saleunits'
	),
	'Projects Setup' => array(
		'Strategic Groups' => 'admin/get_table_data/strategicgroups',
		'Countrys' => 'admin/get_table_data/countries',
		'Donors' => 'admin/get_table_data/donors',
		'Grant Status' => 'admin/get_table_data/grantstatus',
		'Restriction Levels' => 'admin/get_table_data/restrictionlevels'
	),
	'Finance' => array(
		'Account Types' => 'admin/saleunits',
		'Account Classifications' => 'admin/saleunits',
		'Bank Accounts' => 'admin/saleunits',
		'Advance Status' => 'admin/saleunits',
		'Invoice Status' => 'admin/saleunits',
		'Claims Status' => 'admin/saleunits',
		'Exchange Rate' => 'admin/saleunits',
		'Payment Modes' => 'admin/saleunits',
		'Office Cost Categories' => 'admin/saleunits',
		'Shared Cost Apportionment Plans' => 'admin/saleunits',
		'Invoice Types' => 'admin/saleunits',
		'Expense Types' => 'admin/saleunits',
		'Invoice Allocation Types' => 'admin/saleunits',
		'Cash Request Purposes' => 'admin/saleunits',
		'Unpayment Reasons' => 'admin/saleunits',
		'Purpose Berevity' => 'admin/saleunits'	
	),
	'Procurement' => array(
		'Allowances Status' => 'admin/saleunits',
		'Supply Categories' => 'admin/saleunits',
		'LPO Status' => 'admin/saleunits',
		'Conference Status' => 'admin/saleunits',
		'Conference Types' => 'admin/saleunits',
		'Allowance Types' => 'admin/saleunits'
	),
	'Approvals' => array(
		'Approval Types' => 'admin/saleunits'
	),
	'Security' => array(
		'System Users' => 'admin/saleunits',
		'Departments' => 'admin/saleunits',
		'User Groups' => 'admin/saleunits',
		'User Rights' => 'admin/saleunits',
		'Menus' => 'admin/saleunits'
	),
	'Others' => array(
		'Citys' => 'admin/saleunits',
		'Countys' => 'admin/saleunits',
		'Regions' => 'admin/saleunits',
		'SQL' => 'admin/saleunits',
		'Tables' => 'admin/saleunits',
		'Stored Procedures' => 'admin/saleunits',
	),
	'Logout' => 'logout',
);