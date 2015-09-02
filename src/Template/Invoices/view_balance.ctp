<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>       
    </ul>
</div>
<div class="cashReceipts view large-8 medium-9 columns">
    <div class="row border-bottom invoice-header">
        <div class="large-6 columns">            
            <?= $this->Html->image('newworth_letterhead_logo.png', ['alt' => 'NewWorthLogo', 'class' => 'nwlogo']); ?>
        </div>       
        <div class="large-6 columns">
           <p class="contact_address">
            Room (205), 2nd Floor, Yuzana Tower, Shwe Gone Daing, Bahan Township, Yangon, Myanmar.<br/>
            Phone   : 01 1221 275, 09 431 74617<br/>
            E-mail    : info@newworth.asia<br/>
            Website : www.newworth.asia
            </p>
        </div>
        <div class="clearfix"></div>
        <div class="border-bottom2"></div>
    </div>

    <div class="row">
        <div class="invoices-content">
        <div class="large-8 columns">            
            <p class="bill_address">
                <strong>Bill To:</strong><br/>
                <?= h($invoice->client->contact_person) ?><br/>
                <?= h($invoice->client->name) ?><br/>
                <?= h($invoice->client->contact_address) ?><br/>
                <?= h($invoice->client->contact_phone_number) ?>
            </p>
        </div>
        <div class="large-4 columns">
            <h1 class="subheader">INVOICE</h1>
            <table class="no-border-table">
                <tr>
                    <td class="td_label">DATE:</td>
                    <td class="td_value"><?= date('F d, Y') ?></td>
                </tr>
                <tr>
                    <td class="td_label">RECEIPT#</td>
                    <td class="td_value">
                        <?= sprintf("%04d", $invoice->id); ?>
                    </td>
                </tr>
                <tr>
                    <td class="td_label">FOR:</td>
                    <td class="td_value"><?= h($invoice->name) ?></td>
                </tr>                
            </table>
            <table class="invoice_table amount_table">
                <tr>
                    <td class="td_label2">AMOUNT (MMK):</td>
                    <td class="td_value"><?= $this->Number->format($invoice->balance_amount) ?></td>
                </tr>
            </table>
        </div>

        </div>
    </div>
    <div class="row texts">
        <div class="large-12">
            <?= '<p class="invoice_desc"><strong>'.h($invoice->description).'</strong></p>' ?>
            <?= $this->Form->create($invoice) ?>
            <div class="">     
            <table class="invoice_table">
                <tr>
                    <th class="no">#</th>
                    <th>DESCRIPTION</th>
                    <th class="invoice_value">AMOUNT</th>
                </tr>
                <?php if (!empty($invoice->sales)): ?>
                <?php 

                $no = 1;
                $total_amount = 0;
                foreach ($invoice->sales as $sales): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>
                        <?php                         
                        echo '<p>'.h($sales->name);
                        if($sales->item_domain_url){
                            echo ' ( '.h($sales->item_domain_url).' )</p>';
                        }
                        if($sales->description){
                            echo '<p>'.h($sales->description).'</p>';
                        }

                        $cash_type = $sales->_joinData->cash_type;
                        if($cash_type == 'extend'){
                            $cash_type_text = 'Extend';
                        }else if($cash_type == 'contract'){
                            $cash_type_text = 'Contract';
                        }else{
                            $cash_type_text = 'Sale';
                        }
                        echo '<span class="label label-info">'.$cash_type_text.'</span> ';
                        if (in_array($cash_type, ['extend','contract'])) {
                            echo $sales->item_extend_start_date->i18nFormat('d-M-Y') .' ~ '. $sales->item_extend_end_date->i18nFormat('d-M-Y');
                            if($sales->vf_extend_year > 0){
                                echo ' ('.$this->Number->format($sales->vf_extend_year).' Year)';
                            }
                        }        


                     ?>
                    </td>
                    <td class="invoice_value">
                        <?php
                        if($sales->_joinData->cash_type == 'extend'){
                            $amount = $sales->sale_item_extend_price*$sales->item_unit*$sales->vf_extend_year;                           
                        }else{
                            $amount = $sales->sale_item_cost_price*$sales->item_unit;
                        }
                        $total_amount = $total_amount + $amount;
                        echo $this->Number->format($amount);
                        
                         ?>
                    </td>
                </tr>
                <?php 
                $no++;                
                endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td class="text-right" colspan="2"><strong>TOTAL (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php
                            echo '<strong>'.$this->Number->format($invoice->total_amount).'</strong>';
                            echo $this->Form->hidden('total_amount', ['value'=>$invoice->total_amount]);
                        ?>                       
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><strong>BALANCE TOTAL (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php
                            echo '<strong>'.$this->Number->format($invoice->balance_amount).'</strong>';
                            
                        ?>                       
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><strong>PAYMENT (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php
                            echo '<strong>'.$this->Number->format($invoice->balance_amount).'</strong>';
                            echo $this->Form->hidden('payment_amount', ['value'=>$invoice->total_amount]);
                        ?>                        
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><strong>BALANCE (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php
                            echo '<strong>'.$this->Number->format(0).'</strong>'; 
                            echo $this->Form->hidden('balance_flg', ['value'=>0]);                   
                        ?>
                    </td>
                </tr>
            </table>
            </div>
                <div class="large-12">
                    <p class="text-right">
                        <strong>AMOUNT (MMK):</strong> <?= $this->Number->format($invoice->balance_amount) ?><br/>
                        <strong>RECEIVED BY:</strong><br/><br/>
                        ----------------------------<br/>
                        Marketing Department
                    </p>
                </div>
         
            <p class="text-center">THANK YOU IT’S BEEN A PLEASURE WORKING WITH YOU</p>

            <p class="text-center">
            <?= $this->Form->button(__('Confirm')) ?>
            <?php if($invoice->balance_flg == 0){
                $url = $this->Url->build([
                        "controller" => "Print",
                        "action" => "balance_invoice_view",
                        $invoice->id,                    
                    ]);


                echo $this->Form->button('Print This', ['type' => 'button', 'style'=>'cursor:pointer', 'onclick'=>"window.open('{$url}','','scrollbars=yes,menubar=yes,width=780, resizable=yes,toolbar=no,location=no,status=no')"]);
                
            }
            ?>            
            </p>
            <?= $this->Form->end() ?>
        </div>
    </div>

</div>
<div class="columns large-2 medium-3">
    
</div>
