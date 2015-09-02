<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="invoices index large-12 medium-9 columns">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('name', [
                'placeholder' => 'Type invoice name'
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
    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?= $this->Number->format($invoice->id) ?></td>
            <td><?= h($invoice->name) ?></td>  
             <td>
                <?= $invoice->has('client') ? $this->Html->link($invoice->client->name, ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($invoice->total_amount) ?></td>          
            <td>
                <?php if($invoice->balance_flg == 1)
                {
                    echo '<span class="label label-warning">Balance</span> ';
                    echo $this->Number->format($invoice->balance_amount);
                }else{
                    echo '<span class="label label-success">Paid</span>';
                }             
                ?>                
            </td>
           
            <td><?= h($invoice->created) ?></td>
            <td><?= h($invoice->modified) ?></td>
            <td class="actions">
                <?php
                    if($invoice->balance_flg == 1){
                        echo $this->Html->link(__('View Balance'), ['action' => 'view_balance', $invoice->id]);
                    }else{
                        echo $this->Html->link(__('View'), ['action' => 'view', $invoice->id]);
                    }
                      ?> 
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                
                <?= $this->element('delete_btn', ['data'=>$invoice]) ?> 
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
