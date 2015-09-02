<?php
$this->assign('title', 'Dashboard'); 
use Cake\Utility\Hash;
global $array;

require ROOT . DS . APP_DIR . DS . 'View' . DS . 'arrays' .DS . 'settings_admin_menu.php';
    $count = 0;
    
    $menu_array = Hash::mergeDiff($array['settings_admin_menu'], $array['common_admin_menu']);
    //print_r($menu_array);
?>
<div class="col-md-6">
	<?php 
		foreach ($menu_array as $key => $admin_menu) {
		
		if ($admin_menu['title'] == 'Sales' && is_array($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {

	?>
	<h4>Sales <?= $this->Html->link('More sales', ['controller' => 'Sales', 'action' => 'index'], array('class' => 'more pull-right')) ?> </h4> 
	<table cellpadding="0" cellspacing="0" class="">
    <thead>
        <tr>
            <th class="list_no">ID</th>
            <th>Name</th>            
            <th class="actions public_status">Extend End Date (Period)</th>
            <th class="actions view-actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($sales as $sale): ?>
        <tr>
            <td><?= $this->Number->format($sale->id) ?></td>
            <td>
                <?= $this->Html->link($sale->name, ['controller' => 'Sales', 'action' => 'view', $sale->id]) ?>        

            </td>          
            <td class="actions">
                <?php if (!empty($sale->item_extend_start_date) && !empty($sale->item_extend_end_date)) { ?>
                <p class="mbottom0">
                    <span class="label label-info">Period date</span>            
                          <?= $sale->item_extend_start_date->i18nFormat('d-M-Y') .' ~ '. $sale->item_extend_end_date->i18nFormat('d-M-Y') ?>        
                          
                </p> 
                <p class="mbottom0">
                    <span class="label label-info">Period status</span>
                    <?php if ($sale->vf_extend_period >= 31) { ?>
                        <span class="label label-success">The publication period</span>
                    
                <?php }else if ($sale->vf_extend_period >= 1) { ?>
                            <span class="label label-warning">The publication period <?= $sale->vf_extend_period ?></span>
                        <?php } else { ?>
                            <span class="label label-default">Published out of period</span>
                        <?php } ?>
                </p>

                 <?php } ?>             
                
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sale->id]) ?>
                             
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
    </table>
    <?php }
    	if ($admin_menu['title'] == 'Invoices' && is_array($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {
     ?>
    <!-- invoices -->
    <h4>Invoices <?= $this->Html->link('More invoices', ['controller' => 'Invoices', 'action' => 'index'], array('class' => 'more pull-right')) ?> </h4> 
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no">ID</th>
            <th>Name</th>            
            <th>Client</th>
            <th>Balance Status</th>            
           
            <th class="actions view-actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?= $this->Number->format($invoice->id) ?></td>
            <td><?= h($invoice->name) ?></td>  
            
            <td>
            	<?= $invoice->has('client') ? $this->Html->link($invoice->client->name, ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?>
            </td>          
            <td>
                <?php if($invoice->balance_flg == 1)
                {
                    echo '<span class="label label-warning">Balance</span> ';
                    echo $this->Number->format($invoice->balance_amount);
                }else{
                    echo '<span class="label label-success">Paid</span>';
                }             
                ?>                
            </td>           
            
            <td class="actions">
                <?php
                    if($invoice->balance_flg == 1){
                        echo $this->Html->link(__('View Balance'), ['controller' => 'Invoices', 'action' => 'view_balance', $invoice->id]);
                    }else{
                        echo $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoice->id]);
                    }
                      ?> 
                
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
     <?php }
    	if ($admin_menu['title'] == 'Cash Receipts' && is_array($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {
     ?>
    <!-- get cash receipts -->
    <h4>Cash Receipts <?= $this->Html->link('More cash receipts', ['controller' => 'CashReceipts', 'action' => 'index'], array('class' => 'more pull-right')) ?> </h4> 
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no">ID</th>
            <th>Name</th>
            <th>Client</th>
            <th>Balance Status</th>           
           
            <th class="actions view-actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cashReceipts as $cashReceipt): ?>
        <tr>
            <td><?= $this->Number->format($cashReceipt->id) ?></td>
            <td><?= h($cashReceipt->name) ?></td>
            <td>
                <?= $cashReceipt->has('client') ? $this->Html->link($cashReceipt->client->name, ['controller' => 'Clients', 'action' => 'view', $cashReceipt->client->id]) : '' ?>
            </td>            
            <td>
                <?php if($cashReceipt->balance_flg == 1)
                {
                    echo '<span class="label label-warning">Balance</span> ';
                    echo $this->Number->format($cashReceipt->balance_amount);
                }else{
                    echo '<span class="label label-success">Paid</span>';
                }             
                ?>                
            </td>           
            <td class="actions">
                <?php
                    if($cashReceipt->balance_flg == 1){
                        echo $this->Html->link(__('View Balance'), ['controller' => 'CashReceipts', 'action' => 'view_balance', $cashReceipt->id]);
                    }else{
                        echo $this->Html->link(__('View'), ['controller' => 'CashReceipts', 'action' => 'view', $cashReceipt->id]);
                    }
                      ?>                
                
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <?php } } ?>
</div>
<div class="col-md-6">
	<?php
		foreach ($menu_array as $key => $admin_menu) {
    	if ($admin_menu['links'][0]['title'] == 'Tasks' && is_array($admin_menu['role']) && in_array($this->request->session()->read('Auth.User.role'), $admin_menu['role'])) {
     ?>
	<h4>Tasks <?= $this->Html->link('More tasks', ['controller' => 'MarketingTasks', 'action' => 'index'], array('class' => 'more pull-right')) ?> </h4> 
	<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no">ID</th>
            <th>Title</th>
            <th>Task type</th>
            <th class="public_status">Appointment Date</th>

           
            <th class="actions view-actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($marketingTasks as $marketingTask): ?>
        <tr>
            <td><?= $this->Number->format($marketingTask->id) ?></td>
            <td><?= h($marketingTask->title) ?></td>
            <td><span class="label label-info"><?= ucwords($marketingTask->task_type) ?></span></td>
            <td>
                <p class="mbottom0">
                    <span class="label label-info">Date</span>            
                          <?= h($marketingTask->appointment_date) ?>        
                          
                </p> 
                 <p class="mbottom0">
                    <span class="label label-info">Period status</span>
                    <?php if ($marketingTask->vf_appointment_date_period >= 1 && $marketingTask->vf_appointment_date_period <= 31) { ?>
                        <span class="label label-warning">The period <?= $marketingTask->vf_appointment_date_period ?></span>                    
                    <?php }else { ?>
                    <span class="label label-default">Period over</span>
                    <?php } ?>
                </p>
            </td>
           
           <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'MarketingTasks', 'action' => 'view', $marketingTask->id]) ?>
                
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
     <?php }
    	}
     ?>
</div>