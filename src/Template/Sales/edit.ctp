<?php $this->start('actions'); ?>
    <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class'=>'btn btn-danger glyphicon glyphicon-trash']
            )
        ?>
    <?= $this->Html->link(__('List Sales'), ['action' => 'index'], array('class'=>'btn btn-primary glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="actions columns large-2 medium-3 col-md-2">
   
</div>
<div class="sales form large-10 medium-9 columns col-md-10">
    <?= $this->Form->create($sale) ?>
    <fieldset>
        <legend><?= __('Edit Sale') ?></legend>
        <?php            
            echo $this->Form->input('client_id', ['options' => $clients, 'empty' => true]);
            echo $this->Form->input('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            
            echo '<div id="item_pricing_box">';
            echo $this->Form->input('sale_item_cost_price', ['label' => 'Contract Amount']);
            echo $this->Form->input('sale_item_extend_price', ['label' => 'Extend amount (per year)']);            
            echo '</div>';
            echo $this->Form->input('item_unit',['value'=>1]);
            echo $this->Form->input('item_extend_start_date', ['label' => 'Extend Start Date']);
            echo $this->Form->input('item_extend_end_date', ['label' => 'Extend End Date']);
            echo $this->Form->input('item_domain_url', ['label' => 'Domain Url']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php 
    echo $this->element('common_js', [
    "data" => "items"
]);
?>