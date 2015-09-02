<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Hosting'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?>
<div class="hostings index large-12 medium-9 columns col-sm-12">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('sale', [
                'placeholder' => 'Type Sale name'
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
            <th><?= $this->Paginator->sort('sale_id') ?></th>
            <th><?= $this->Paginator->sort('hosting_server_id') ?></th>
            <th><?= $this->Paginator->sort('db_name') ?></th>
            <th><?= $this->Paginator->sort('db_username') ?></th>
            <th><?= $this->Paginator->sort('db_password') ?></th>
            <th><?= $this->Paginator->sort('ftp_username') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($hostings as $hosting): ?>
        <tr>
            <td><?= $this->Number->format($hosting->id) ?></td>
            <td>
                <?= $hosting->has('sale') ? $this->Html->link($hosting->sale->name, ['controller' => 'Sales', 'action' => 'view', $hosting->sale->id]) : '' ?>
            </td>
            <td>
                <?= $hosting->has('hosting_server') ? $this->Html->link($hosting->hosting_server->name, ['controller' => 'HostingServers', 'action' => 'view', $hosting->hosting_server->id]) : '' ?>
            </td>
            <td><?= h($hosting->db_name) ?></td>
            <td><?= h($hosting->db_username) ?></td>
            <td><?= h($hosting->db_password) ?></td>
            <td><?= h($hosting->ftp_username) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $hosting->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hosting->id]) ?>
                
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hosting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hosting->id)]) ?>
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
