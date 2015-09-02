<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Market Resource'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="marketResources index large-12 medium-9 columns">
     <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('name', [
                'placeholder' => 'Type market resource name'
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
            <th><?= $this->Paginator->sort('contact_info') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($marketResources as $marketResource): ?>
        <tr>
            <td><?= $this->Number->format($marketResource->id) ?></td>
            <td><?= h($marketResource->name) ?></td>
            <td><?= $this->Text->autoParagraph(h($marketResource->contact_info)) ?></td>
            <td><?= h($marketResource->created) ?></td>
            <td><?= h($marketResource->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $marketResource->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $marketResource->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $marketResource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketResource->id)]) ?>
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
