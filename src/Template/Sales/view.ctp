<?php $this->start('actions'); ?>
    <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], array('class'=>'btn btn-default glyphicon glyphicon-edit')) ?>
    <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class'=>'btn btn-danger glyphicon glyphicon-trash']) ?>
    <?= $this->Html->link(__('List Sales'), ['action' => 'index'], array('class'=>'btn btn-primary glyphicon glyphicon-th-list')) ?>
    <?= $this->Html->link(__('New Sale'), ['action' => 'add'], array('class'=>'btn btn-success glyphicon glyphicon-edit')) ?>
<?php $this->end(); ?> 

<div class="sales view large-12 medium-9 columns col-md-12">
    <h2><?= h($sale->id) ?> <?= h($sale->name) ?></h2>
    <table cellpadding="0" cellspacing="0" class="">
        <thead>
            <tr>
                <th class="list_no">Id</th>
                <th>Item</th>
                <th>Client</th>
                <th>Domain URL</th>
                <th>Sale Price</th>
                <th>Extend Price</th>
                <th>Item Unit</th>
                <th class="actions public_status">Extend End Date (Period)</th>
                <th class="actions"><?= __('Created') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= h($sale->id) ?></td>
                <td><?= $sale->has('item') ? $this->Html->link($sale->item->name, ['controller' => 'Items', 'action' => 'view', $sale->item->id]) : '' ?></td>
                <td><?= $sale->has('client') ? $this->Html->link($sale->client->name, ['controller' => 'Clients', 'action' => 'view', $sale->client->id]) : '' ?></td>
                <td><?= $sale->item_domain_url ? $this->Html->link($sale->item_domain_url, $sale->item_domain_url, array('target'=> '_blank')) : '' ?></td>
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
                <td>
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($sale->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($sale->modified) ?></p>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($sale->description)) ?>
        </div>
    </div>
</div>
