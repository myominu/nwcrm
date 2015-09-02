<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cashReceipt->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cashReceipt->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cash Receipts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="cashReceipts form large-10 medium-9 columns">
    <?= $this->Form->create($cashReceipt) ?>
    <fieldset>
        <legend><?= __('Edit Cash Receipt') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('client_id', ['options' => $clients, 'empty'=>true]);
        ?>
        <div id="sales_list_box">
            <div class="sales_list">
                <?php if (!empty($cashReceipt->sales)): ?>
                <table>
                    <tr>
                        <th class="list_no">#</th>
                        <th>Sale Name</th>
                        <th class="actions public_status">Extend End Date (Period)</th>
                        <th>Add Cash List</th>
                        <th class="inline-radio">Choose Cash Type</th>
                    </tr>
                <?php 
                $no = 1;
                $i = 0;
                foreach ($cashReceipt->sales as $key => $sales): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= h($sales->name) ?></td>
                    <td class="actions">
                            <?php if (!empty($sales->item_extend_start_date) && !empty($sales->item_extend_end_date)) { ?>
                            <p class="mbottom0">
                                <span class="label label-info">Period date</span>            
                                      <?= $sales->item_extend_start_date->i18nFormat('d-M-Y') .' ~ '. $sales->item_extend_end_date->i18nFormat('d-M-Y') ?>        
                                      
                            </p> 
                            <p class="mbottom0">
                                <span class="label label-info">Period status</span>
                                <?php if ($sales->vf_extend_period >= 31) { ?>
                                    <span class="label label-success">The publication period</span>
                                
                            <?php }else if ($sales->vf_extend_period >= 1) { ?>
                                        <span class="label label-warning">The publication period <?= $sales->vf_extend_period ?></span>
                                    <?php } else { ?>
                                        <span class="label label-default">Published out of period</span>
                                    <?php } ?>
                            </p>

                             <?php } ?>             
                            
                    </td>
                    <td>
                        <label>
                        <?php 
                        echo $this->Form->checkbox('sales.'.$i.'.id',['value' => $sales->id]);
                         ?>
                         Check
                        </label>
                    </td>
                    <td class="inline-radio">
                        <?= 
                        // $this->Form->radio(
                        //     'sales.'.$i.'._joinData.cash_type', [
                        //             ['value' => 'none', 'text' => 'None'],
                        //             ['value' => 'contract', 'text' => 'Contract'],                      
                        //             ['value' => 'extend', 'text' => 'Extend'],
                        //         ]);
                        $this->Form->input('sales.'.$i.'._joinData.cash_type', ['options' => $cash_type]);
                        ?>
                    </td>
                </tr>
                <?php 
                $no++;
                $i++;
                endforeach; ?>    
                </table>
                <?php endif; ?>
            </div>
        </div>
         <?php
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php 
    echo $this->element('common_js', [
    "data" => "sales"
]);
?>