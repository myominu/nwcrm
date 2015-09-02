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
    <h4 class="subheader"><?= __('Related Marketings') ?></h4>
    <?php if (!empty($client->marketings)): ?>
     <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no">Id</th>
            <th>Title</th>
            <th>Comment</th>
            <th>Market Type</th>
            <th class="public_status">Appointment Date</th>
            
            <th>User</th>
            <th>Created</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($client->marketings as $marketing): ?>
        <tr>
            <td><?= $this->Number->format($marketing->id) ?></td>
            <td><?= h($marketing->title) ?></td>
            <td><h6 class="subheader"><?= __('Comment') ?></h6>
            <?= $this->Text->autoParagraph(h($marketing->comment)) ?></td>
            <td>        
                <span class="label label-info"><?= ucwords($marketing->market_type) ?></span>
            </td>
            <td>
                <p class="mbottom0">
                    <span class="label label-info">Date</span>            
                          <?= h($marketing->appointment_date) ?>        
                          
                </p> 
                 <p class="mbottom0">
                    <span class="label label-info">Period status</span>
                    <?php if ($marketing->vf_appointment_date_period >= 1 && $marketing->vf_appointment_date_period <= 31) { ?>
                        <span class="label label-warning">The publication period <?= $marketing->vf_appointment_date_period ?></span>                    
                    <?php } ?>
                </p>
                
            </td>
            
            <td>
               
            </td>
            <td><?= h($marketing->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $marketing->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $marketing->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $marketing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketing->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   
    <?php endif; ?>
    </div>
</div>
