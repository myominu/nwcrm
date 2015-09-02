<?php $this->start('actions'); ?>
<?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class'=>'btn btn-danger glyphicon glyphicon-trash']
            )
        ?>
   
    <?= $this->Html->link(__('List Clients'), ['action' => 'index'], array('class'=>'btn btn-primary glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="actions columns large-2 medium-3">
   
</div>
<div class="clients form large-10 medium-9 columns">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('contact_person');
            echo $this->Form->input('contact_phone_number');
            echo $this->Form->input('contact_email');
            echo $this->Form->input('contact_address');
            echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->input('state_id', ['options' => $states, 'empty' => true]);
            echo $this->Form->input('zip');
            echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);
            
            echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
