<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id], array('class'=>'btn btn-default glyphicon glyphicon-edit')) ?>
    <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class'=>'btn btn-danger glyphicon glyphicon-trash']) ?>
    <?= $this->Html->link(__('List Clients'), ['action' => 'index'], array('class'=>'btn btn-primary glyphicon glyphicon-th-list')) ?>
    <?= $this->Html->link(__('New Client'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 

<div class="clients view large-12 medium-9 columns">
    <h2><?= h($client->name) ?></h2>
    <table cellpadding="0" cellspacing="0" class="">
        <thead>
            <tr>
                <th class="list_no">Id</th>
                <th>Contact Person</th>
                <th>Contact Phone Number</th>
                <th>Contact Email</th>
                <th>Contact Address</th>
                <th>City/State/Country</th>           
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= h($client->id) ?></td>
                <td>
                    <?= h($client->contact_person) ?>
                </td>                
                <td><?= h($client->contact_phone_number) ?></td>
                <td><?= h($client->contact_email) ?></td>
                <td><?= h($client->contact_address) ?></td>
                <td><?= $client->has('city') ? $this->Html->link($client->city->name, ['controller' => 'Cities', 'action' => 'view', $client->city->id]) : '' ?>/<?= $client->has('state') ? $this->Html->link($client->state->name, ['controller' => 'States', 'action' => 'view', $client->state->id]) : '' ?>/<?= $client->has('country') ? $this->Html->link($client->country->name, ['controller' => 'Countries', 'action' => 'view', $client->country->id]) : '' ?></td>
               
            </tr>
        </tbody>
    </table>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Comment') ?></h6>
            <?= $this->Text->autoParagraph(h($client->comment)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Sales') ?></h4>
    <?php if (!empty($client->sales)): ?>
     <table cellpadding="0" cellspacing="0" class="">
        <thead>
            <tr>
                <th class="list_no">Id</th>
                <th>Item</th>                
                <th>Domain URL</th>
                <th>Sale Price</th>
                <th>Extend Price</th>
                <th>Item Unit</th>
                <th class="actions public_status">Extend End Date (Period)</th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client->sales as $sales): ?>
            <tr>
                <td><?= h($sales->id) ?></td>
                <td><?= $sales->has('item') ? $this->Html->link($sales->item->name, ['controller' => 'Items', 'action' => 'view', $sales->item->id]) : '' ?></td>
               
                <td><?= $sales->item_domain_url ? $this->Html->link($sales->item_domain_url, $sales->item_domain_url, array('target'=> '_blank')) : '' ?></td>
                <td><?= $this->Number->format($sales->sale_item_cost_price) ?></td>
                <td><?= $this->Number->format($sales->sale_item_extend_price) ?></td>
                <td><?= $this->Number->format($sales->item_unit) ?></td>
                <td class="actions">
                    <?php if (!empty($sales->item_extend_start_date) && !empty($sales->item_extend_end_date)) { ?>
                    <p class="mbottom0">
                        <span class="label label-info">Period date</span>            
                              <?= $sales->item_extend_start_date->i18nFormat('d-M-Y') .' ~ '. $sales->item_extend_end_date->i18nFormat('d-M-Y') ?>        
                              
                    </p> 
                    <p class="mbottom0">
                        <span class="label label-info">Period status</span>
                        <?php if ($sales->vf_extend_period >= 31) { ?>
                            <span class="label label-success">The publication period</span>
                        
                    <?php }else if ($sales->vf_extend_period >= 1) { ?>
                                <span class="label label-warning">The publication period <?= $sales->vf_extend_period ?></span>
                            <?php } else { ?>
                                <span class="label label-default">Published out of period</span>
                            <?php } ?>
                    </p>

                     <?php } ?>             
                    
                </td>                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
    <?php endif; ?>
    </div>
</div>
