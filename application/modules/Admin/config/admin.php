<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Menus*/
$config['menus'] = array();
/*Sidemenus*/
$config['sidemenus'] = array(
	'Organization Setup' => array(
		'Organizations'=> 'admin/get_table_data/Stations'
	),
	'Projects Setup' => array(
		'Strategic Groups' => 'admin/get_table_data/StrategicGroups',
		'Countrys' => 'admin/get_table_data/Countrys',
		'Donors' => 'admin/get_table_data/Donors',
		'Grant Status' => 'admin/get_table_data/GrantStatus',
		'Restriction Levels' => 'admin/get_table_data/RestrictionLevels'
	),
	'Finance' => array(
		'Account Types' => 'admin/get_table_data/AccountTypes',
		'Account Classifications' => 'admin/get_table_data/AccountClassifications',
		'Bank Accounts' => 'admin/get_table_data/BankAccounts',
		'Advance Status' => 'admin/get_table_data/AdvanceStatuses',
		'Invoice Status' => 'admin/get_table_data/InvoiceStatuses',
		'Claims Status' => 'admin/get_table_data/ClaimStatus',
		'Exchange Rate' => 'admin/get_table_data/ExchangeRates',
		'Payment Modes' => 'admin/get_table_data/PaymentModes',
		'Office Cost Categories' => 'admin/get_table_data/OfficeCostCategories',
		'Shared Cost Apportionment Plans' => 'admin/get_table_data/SharedCostApportionmentPlans',
		'Invoice Types' => 'admin/get_table_data/InvoiceTypes',
		'Expense Types' => 'admin/get_table_data/ExpenseTypes',
		'Invoice Allocation Types' => 'admin/get_table_data/InvoiceAllocationType',
		'Cash Request Purposes' => 'admin/get_table_data/CashRequestPurposes',
		'Unpayment Reasons' => 'admin/get_table_data/UnpaymentReasons',
		'Purpose Berevity' => 'admin/get_table_data/PurposeBerevity'	
	),
	'Procurement' => array(
		'Allowances Status' => 'admin/get_table_data/AllowanceStatuses',
		'Supply Categories' => 'admin/get_table_data/SupplyCategories',
		'LPO Status' => 'admin/get_table_data/LPOStatuses',
		'Conference Status' => 'admin/get_table_data/Conferences',
		'Conference Types' => 'admin/get_table_data/ConferenceTypes',
		'Allowance Types' => 'admin/get_table_data/AllowanceTypes'
	),
	'Approvals' => array(
		'Approval Types' => 'admin/get_table_data/Approvals'
	),
	'Security' => array(
		'System Users' => 'admin/get_table_data/Employees',
		'Departments' => 'admin/get_table_data/Departments',
		'User Groups' => 'admin/get_table_data/SecurityLevel',
		'User Rights' => 'admin/get_table_data/MenuRights',
		'Menus' => 'admin/get_table_data/Menus'
	),
	'Others' => array(
		'Citys' => 'admin/get_table_data/Citys',
		'Countys' => 'admin/get_table_data/Countys',
		'Regions' => 'admin/get_table_data/Regions',
		'SQL' => 'admin/saleunits',
		'Tables' => 'admin/saleunits',
		'Stored Procedures' => 'admin/saleunits',
	),
	'Logout' => 'logout',
);

/*Columns*/
$config['columns'] = array(
	'Stations' => array('Station', 'StationAdd', 'Telephone', 'PrimaryContact', 'EmailAddress'),
	'StrategicGroups' => array('StrategicGroup'),
	'Countrys' => array('Country'),
	'Donors' => array('Donor', 'DonorCode'),
	'GrantStatus' => array('GrantStatus'),
	'RestrictionLevels' => array('ParentLevel', 'RestrictionLevel'),
	'AccountTypes'=> array('AccountType', 'AccountClassification'),
	'AccountClassifications'=> array('AccountClassification'),
	'BankAccounts'=> array('Title', 'BankName', 'AccountNumber', 'Currency'),
	'AdvanceStatuses' => array('AdvanceStatus', 'NextStatus', 'StatusSecurityLevel'),
	'InvoiceStatuses' => array('InvoiceStatus', 'NextStatus', 'StatusSecurityLevel'),
	'ClaimStatus' => array('ClaimStatus', 'NextStatus', 'StatusSecurityLevel'),
	'ExchangeRates' => array('ExchangeRate', 'CurrRate', 'ActiveDate', 'EndDate'),
	'PaymentModes' => array('PaymentMode', 'Abbrv'),
	'OfficeCostCategories' => array('OfficeCostCategory'),
	'SharedCostApportionmentPlans' => array('ApportionmentPlan'),
	'InvoiceTypes' => array('InvoiceTypes'),
	'ExpenseTypes' => array('ExpenseType'),
	'InvoiceAllocationType' => array('AllocationType'),
	'CashRequestPurposes' => array('CashRequestPurpose'),
	'UnpaymentReasons' => array('Reason'),
	'PurposeBerevity' => array('Berevity', 'Account'),
	'AllowanceStatuses' => array('AllowanceStatus', 'NextStatus', 'StatusSecurityLevel'),
	'SupplyCategories' => array('SupplyCategory'),
	'LPOStatuses' => array('LPOStatus', 'NextStatus', 'StatusSecurityLevel'),
	'Conferences' => array('Title', 'ConferenceDate'),
	'ConferenceTypes' => array('ConferenceType '),
	'AllowanceTypes' => array('AllowanceType'),
	'Approvals' => array('Approval', 'StatusTable', 'ApprovalTable', 'StatusField', 'DisplayOrder'),
	'Employees' => array('FirstName', 'LastName', 'email', 'Mobile', 'Department', 'Post', 'SecurityGroup', 'LastLogged'),
	'Departments' => array('Department', 'Description', 'Acronym'),
	'SecurityLevel' => array('Description', 'HomePage'),
	'MenuRights' => array('Menu', 'SecurityGroup', 'licenselevel'),
	'Menus' => array('Menu', 'URL', 'Icon', 'FootNote'),
	'Citys' => array('City'),
	'Countys' => array('County'),
	'Regions' => array('Region')
);