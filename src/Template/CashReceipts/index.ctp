<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Cash Receipt'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="cashReceipts index large-12 medium-9 columns">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('name', [
                'placeholder' => 'Type cash receipt name'
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
            <th><?= $this->Paginator->sort('client_id') ?></th>
            <th><?= $this->Paginator->sort('total_amount') ?></th>
            <th><?= $this->Paginator->sort('balance_amount') ?></th>            
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cashReceipts as $cashReceipt): ?>
        <tr>
            <td><?= $this->Number->format($cashReceipt->id) ?></td>
            <td><?= h($cashReceipt->name) ?></td>
            <td>
                <?= $cashReceipt->has('client') ? $this->Html->link($cashReceipt->client->name, ['controller' => 'Clients', 'action' => 'view', $cashReceipt->client->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($cashReceipt->total_amount) ?></td>
            <td>
                <?php if($cashReceipt->balance_flg == 1)
                {
                    echo '<span class="label label-warning">Balance</span> ';
                    echo $this->Number->format($cashReceipt->balance_amount);
                }else{
                    echo '<span class="label label-success">Paid</span>';
                }             
                ?>                
            </td>
            <td><?= h($cashReceipt->created) ?></td>
            <td><?= h($cashReceipt->modified) ?></td>
            <td class="actions">
                <?php
                    if($cashReceipt->balance_flg == 1){
                        echo $this->Html->link(__('View Balance'), ['action' => 'view_balance', $cashReceipt->id]);
                    }else{
                        echo $this->Html->link(__('View'), ['action' => 'view', $cashReceipt->id]);
                    }
                      ?>                
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cashReceipt->id]) ?>
                <?= $this->element('delete_btn', ['data'=>$cashReceipt]) ?>
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
