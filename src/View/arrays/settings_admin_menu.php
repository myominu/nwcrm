<?php
$badge_extend = '';
$badge_balance_cash_receipt = '';
$badge_balance_invoice = '';
$badge_task = '';
//for extend
if($recentExtendEndSalesCount > 0){
	$badge_extend = '<span class="badge badge-warning">'.$recentExtendEndSalesCount.'</span>';	
}

//for cash receipt balance
if($balanceSalesCount > 0){
	$badge_balance_cash_receipt = '<span class="badge badge-warning">'.$balanceSalesCount.'</span>';	
}

//for invoice balance
if($balanceInvoicesSalesCount > 0){
	$badge_balance_invoice = '<span class="badge badge-warning">'.$balanceInvoicesSalesCount.'</span>';	
}

//for appointment tasks
if($appointmentTasksCount > 0){
	$badge_task = '<span class="badge badge-warning">'.$appointmentTasksCount.'</span>';	
}

$array['settings_admin_menu'] = array(	
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Sales' .$badge_extend,
		'links'    => array(
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Sales List',
				'path' =>'/sales',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Sale',
				'path' =>'/sales/add',
				'opt' => array(),
			),
			
		),
	),	
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Invoices' .$badge_balance_invoice,
		'links'    => array(
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Invoices List',
				'path' =>'/invoices',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Invoices',
				'path' =>'/invoices/add',
				'opt' => array(),
			),
		),
	),
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Cash Receipts' .$badge_balance_cash_receipt,
		'links'    => array(
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Cash Receipts List',
				'path' =>'/cash_receipts',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Cash Receipts',
				'path' =>'/cash_receipts/add',
				'opt' => array(),
			)
		),
	),
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Marketing' .$badge_task,
		'links'    => array(
			
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Tasks',
				'path' =>'/marketing_tasks',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Task',
				'path' =>'/marketing_tasks/add',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Market Resources',
				'path' =>'/market_resources',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Market Resource',
				'path' =>'/market_resources/add',
				'opt' => array(),
			),
		),
	),
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Clients',
		'links'    => array(
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Clients List',
				'path' =>'/clients',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'New Client',
				'path' =>'/clients/add',
				'opt' => array(),
			),
		),
	),
	array(
		'role'     => array('admin','developer'),
		'title'     => 'Development Info',
		'links'    => array(
			array(
				'role'=> array('admin','developer'),
				'title'=>'Sales Email Accounts',
				'path' =>'/emails',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','developer'),
				'title'=>'Sales Hostings/Admin',
				'path' =>'/hostings',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','developer'),
				'title'=>'Hosting Servers',
				'path' =>'/hosting_servers',
				'opt' => array(),
			),
		),
	),
	array(
		'role'     => array('admin','marketing'),
		'title'     => 'Setting',
		'links'    => array(
			array(
				'role'=> array('admin'),
				'title'=>'Employees',
				'path' =>'/users',
				'opt' => array(),
			),
			
			array(
				'role'=> array('admin'),
				'title'=>'Items',
				'path' =>'/items',
				'opt' => array(),
			),
			array(
				'role'=> array('admin'),
				'title'=>'Categories',
				'path' =>'/categories',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Countries',
				'path' =>'/countries',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'States',
				'path' =>'/states',
				'opt' => array(),
			),
			array(
				'role'=> array('admin','marketing'),
				'title'=>'Cities',
				'path' =>'/cities',
				'opt' => array(),
			),
		),
	),
	array(
		'role'     => array('admin'),
		'title'     => 'Masters',
		'links'    => array(
			array(
				'role'=> array('admin'),
				'title'=>'Masters',
				'path' =>'/masters',
				'opt' => array(),
			),
		)
	),
);

//common admin menu
$array['common_admin_menu'] = array(	
	
);