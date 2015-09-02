<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Cash Receipts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="cashReceipts form large-10 medium-9 columns">
    <?= $this->Form->create($cashReceipt) ?>
    <fieldset>
        <legend><?= __('Add Cash Receipt') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('client_id', ['options' => $clients, 'empty'=>true]);    
            echo '<div id="sales_list_box"></div>';        
            echo $this->Form->input('description');
            //echo $this->Form->input('total_amount');
            //echo $this->Form->input('sales._ids', ['options' => $sales]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php 
    echo $this->element('common_js', [
    "data" => "sales"
]);
?>