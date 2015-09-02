<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Marketing Task'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 

<div class="marketingTasks index large-12 medium-12 columns">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('title', [
                'placeholder' => 'Type task title'
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
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('task_type') ?></th>
            <th class="public_status"><?= $this->Paginator->sort('appointment_date') ?></th>
            <th><?= $this->Paginator->sort('client_id') ?></th>
            <th><?= $this->Paginator->sort('market_resource_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
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
            <td>
                <?= $marketingTask->has('client') ? $this->Html->link($marketingTask->client->name, ['controller' => 'Clients', 'action' => 'view', $marketingTask->client->id]) : '' ?>
            </td>
            <td>
                <?= $marketingTask->has('market_resource') ? $this->Html->link($marketingTask->market_resource->name, ['controller' => 'MarketResources', 'action' => 'view', $marketingTask->market_resource->id]) : '' ?>
            </td>
            <td>
                <?= $marketingTask->has('user') ? $this->Html->link($marketingTask->user->name, ['controller' => 'Users', 'action' => 'view', $marketingTask->user->id]) : '' ?>
            </td>
            <td><?= h($marketingTask->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $marketingTask->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $marketingTask->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $marketingTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketingTask->id)]) ?>
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
