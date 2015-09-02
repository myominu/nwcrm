<div class="sales_list">
    <?php if (!empty($sales)): ?>
    <table>
        <tr>
            <th class="list_no">#</th>
            <th>Sale Name</th>
            <th class="actions public_status">Extend End Date (Period)</th>
            <th>Add Cash List</th>
            <th>Choose Cash Type</th>
        </tr>
    <?php 
    $no = 1;
    $i = 0;
    foreach ($sales as $key => $sales): ?>
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
            //             ['value' => 'sale', 'text' => 'Sale'],
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
