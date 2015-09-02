<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Email'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?>
<div class="emails index large-12 medium-9 columns col-sm-12">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);

            echo $this->Form->input('sale', [
                'placeholder' => 'Type Sale name'
                ]); 
            
            echo $this->Form->input('username', [
                'placeholder' => 'Type email username'
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
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('password') ?></th>
            <th><?= $this->Paginator->sort('url') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($emails as $email): ?>
        <tr>
            <td><?= $this->Number->format($email->id) ?></td>
            <td>
                <?= $email->has('sale') ? $this->Html->link($email->sale->name, ['controller' => 'Sales', 'action' => 'view', $email->sale->id]) : '' ?>
            </td>
            <td><?= h($email->username) ?></td>
            <td><?= h($email->password) ?></td>
            <td><?= h($email->url) ?></td>
            <td><?= h($email->created) ?></td>
            <td><?= h($email->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $email->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $email->id]) ?>
                
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id)]) ?>
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
