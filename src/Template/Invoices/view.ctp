<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>       
    </ul>
</div>
<div class="invoices view large-8 medium-9 columns strings">
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
                    <td class="td_label">INVOICE#</td>
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
                    <td class="td_value"><?= $this->Number->format($invoice->payment_amount) ?></td>
                </tr>
            </table>
        </div>

        </div>
    </div>
    <div class="row texts">
        <div class="large-12">
            <?= $this->Form->create($invoice) ?>
            <?= 
            $this->Form->input('description', ['value'=>$invoice->description,'label' => '', 'style'=>'font-weight:bold']);
            //'<p class="invoice_desc"><strong>'.h($cashReceipt->description).'</strong></p>' 
            ?>
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
                $i = 0;
                $total_amount = 0;
                foreach ($invoice->sales as $sales): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>
                        <?php
                        $sale_name = '<p>'.h($sales->name);                     
                        echo $sale_name;
                        if($sales->item_domain_url){
                            $sale_item_domain_url = ' ( '.h($sales->item_domain_url).' )';
                            echo $sale_item_domain_url;
                        }
                        echo '</p>';
                        if($sales->description){
                            echo $this->Form->hidden('sales.'.$i.'.id',['value' => $sales->id]);
                            echo $this->Form->input('sales.'.$i.'.Sales.description', ['value'=>$sales->description,'label' => '', 'style'=>'font-weight:bold']);
                        }

                        $cash_type = $sales->_joinData->cash_type;
                        
                        echo '<span class="label label-info">'.ucwords($cash_type).' Payment</span> ';
                        if (in_array($cash_type, ['contract','first','second','extend'])) {
                            $item_extend_start_date = $sales->item_extend_start_date->i18nFormat('MMM-dd-Y') .' ~ '. $sales->item_extend_end_date->i18nFormat('MMM-dd-Y');
                            echo $item_extend_start_date;
                            if($sales->vf_extend_year > 0){
                                $item_vf_extend_year = ' ('.$this->Number->format($sales->vf_extend_year).' Year)';
                                echo $item_vf_extend_year;
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
                $i++;                    
                endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td class="text-right" colspan="2"><strong>TOTAL (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php                            
                            echo $this->Form->input('total_amount', ['value'=>$total_amount,'label' => '', 'style'=>'font-weight:bold']);
                            echo $this->Form->hidden('confirm_flg', ['value'=>1]);
                        ?>
                       
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><strong>PAYMENT (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php                            
                            echo $this->Form->input('payment_amount', ['value'=>$invoice->payment_amount,'label' => '', 'style'=>'font-weight:bold']);                            
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><strong>BALANCE (MMK)</strong></td>
                    <td class="invoice_value">
                        <?php 
                            if($invoice->balance_flg == 1){
                                $balance = $invoice->balance_amount;
                            }else{
                                $balance = 0;
                            }                           
                            echo $this->Form->input('balance_amount', ['value'=>$balance,'label' => '', 'style'=>'font-weight:bold']);
                            
                        ?>
                    </td>
                </tr>
            </table>
            </div>
            <p class="text-center">THANK YOU IT’S BEEN A PLEASURE WORKING WITH YOU</p>

            <p class="text-center">
            <?= $this->Form->button(__('Confirm')) ?>
            <?php if($invoice->confirm_flg == 1){
                $url = $this->Url->build([
                        "controller" => "Print",
                        "action" => "invoice_view",
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