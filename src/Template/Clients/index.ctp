<?php $this->start('actions'); ?>
    
    <?= $this->Html->link(__('New Client'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 

<div class="clients index large-12 columns">
     <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('name', [
                'placeholder' => 'Type client name'
                ]);           

            echo '<div class="input"><br/>';

            echo $this->Form->submit(__('Search'), array('class' => 'btn btn-primary'));
            echo '</div>';

            echo $this->Form->end();
        ?>
    </div>
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('contact_person') ?></th>
            <th><?= $this->Paginator->sort('contact_phone_number') ?></th>
            <th><?= $this->Paginator->sort('contact_email') ?></th>
            <th><?= $this->Paginator->sort('contact_address') ?></th>
            <th><?= $this->Paginator->sort('city_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $this->Number->format($client->id) ?></td>
            <td><?= h($client->name) ?></td>
            <td><?= h($client->contact_person) ?></td>
            <td><?= h($client->contact_phone_number) ?></td>
            <td><?= h($client->contact_email) ?></td>
            <td><?= h($client->contact_address) ?></td>
            <td>
                <?= $client->has('city') ? $this->Html->link($client->city->name, ['controller' => 'Cities', 'action' => 'view', $client->city->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                
                <?= $this->element('delete_btn', ['data'=>$client]) ?> 
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
