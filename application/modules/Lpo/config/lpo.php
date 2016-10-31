<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Default mailing list*/
$config['to'] = '';
$config['cc'] = array(
	'rwangatia@clintonhealthaccess.org', 
	'jayuma@clintonhealthaccess.org', 
	'dkarambi@clintonhealthaccess.org'
);
$config['bcc'] = '';

/*Default terms*/
$config['terms'] = array(
	'Payment: 14 day upon delivery of goods/ services and Invoice to our offices.', 
	'Payment: Please quote the LPO reference number in your invoice for it to be successfully processed.',
	'Invoice Delivery: Invoices submitted after more than 3 months will not be honoured.'
);

/*Default upload options*/
$config['upload_options'] = array(
	'upload_path' => 'public/files/quotations',
	'allowed_types' => '*'
);