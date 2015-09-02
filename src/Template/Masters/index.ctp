<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Master'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="masters index large-12 medium-12 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="list_no"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('parent_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>            
            <th><?= $this->Paginator->sort('var1') ?></th>
            <th><?= $this->Paginator->sort('var2') ?></th>
            <th><?= $this->Paginator->sort('var3') ?></th>
            <th><?= $this->Paginator->sort('text') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($masters as $master): ?>
        <tr>
            <td><?= $this->Number->format($master->id) ?></td>
            <td><?= $this->Number->format($master->parent_id) ?></td>
            <td><?= h($master->name) ?></td>            
            <td><?= h($master->var1) ?></td>
            <td><?= h($master->var2) ?></td>
            <td><?= h($master->var3) ?></td>
            <td><?= h($master->text) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $master->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $master->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $master->id], ['confirm' => __('Are you sure you want to delete # {0}?', $master->id)]) ?>
                <?= $this->Form->postLink(__('Move down'), ['action' => 'move_down', $master->id], ['confirm' => __('Are you sure you want to move down # {0}?', $master->id)]) ?>
                <?= $this->Form->postLink(__('Move up'), ['action' => 'move_up', $master->id], ['confirm' => __('Are you sure you want to move up # {0}?', $master->id)]) ?>
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
