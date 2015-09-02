<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('New Sale'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 
<div class="sales index large-12 columns col-sm-12">
    <div class="well well-sm filter">
        <?php
            echo $this->Form->create(null,[
                'class' => 'form-inline'
                ]);
            
            echo $this->Form->input('sale_name', [
                'placeholder' => 'Type sale name'
                ]);

            echo '<div class="input date">';           

            echo $this->Form->label('Extend End Date');
            echo $this->Form->year('date', [                
                'empty'      => '',
                'maxYear'    => date('Y')+1,
                'minYear'    => date('Y')-2,
                'orderYear'  => 'asc',
            ]);

            echo $this->Form->month('date', array(
                'empty'      => '',
                'monthNames' => false,
            ));
         
            echo '</div>';

            echo '<div class="input"><br/>';

            echo $this->Form->submit(__('Search'), array('class' => 'btn btn-primary'));
            echo '</div>';

            echo $this->Form->end();
        ?>
    </div>
    <table cellpadding="0" cellspacing="0" class="">
    <thead>
        <tr>
            <th class="list_no"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('item_domain_url', 'Domain URL') ?></th>
            <th><?= $this->Paginator->sort('sale_item_cost_price', 'Sale Price') ?></th>
            <th><?= $this->Paginator->sort('sale_item_extend_price', 'Extend Price') ?></th>
            <th><?= $this->Paginator->sort('item_unit') ?></th>
            <th class="actions public_status"><?= $this->Paginator->sort('item_extend_end_date', 'Extend End Date') ?> <?= __('(Period)') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($sales as $sale): ?>
        <tr>
            <td><?= $this->Number->format($sale->id) ?></td>
            <td>
                <?= $this->Html->link($sale->name, ['action' => 'view', $sale->id]) ?>        

            </td>
            <td>
                <?= $sale->item_domain_url ? $this->Html->link($sale->item_domain_url, $sale->item_domain_url, array('target'=> '_blank')) : '' ?>
            </td>
            <td><?= $this->Number->format($sale->sale_item_cost_price) ?></td>
            <td><?= $this->Number->format($sale->sale_item_extend_price) ?></td>
            <td><?= $this->Number->format($sale->item_unit) ?></td>
            <td class="actions">
                <?php if (!empty($sale->item_extend_start_date) && !empty($sale->item_extend_end_date)) { ?>
                <p class="mbottom0">
                    <span class="label label-info">Period date</span>            
                          <?= $sale->item_extend_start_date->i18nFormat('d-M-Y') .' ~ '. $sale->item_extend_end_date->i18nFormat('d-M-Y') ?>        
                          
                </p> 
                <p class="mbottom0">
                    <span class="label label-info">Period status</span>
                    <?php if ($sale->vf_extend_period >= 31) { ?>
                        <span class="label label-success">The publication period</span>
                    
                <?php }else if ($sale->vf_extend_period >= 1) { ?>
                            <span class="label label-warning">The publication period <?= $sale->vf_extend_period ?></span>
                        <?php } else { ?>
                            <span class="label label-default">Published out of period</span>
                        <?php } ?>
                </p>

                 <?php } ?>             
                
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sale->id]) ?>
               
                <?= $this->element('delete_btn', ['data'=>$sale]) ?>              
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
