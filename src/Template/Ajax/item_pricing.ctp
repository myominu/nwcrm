<?php
echo $this->Form->input('sale_item_cost_price', ['label' => 'Contract Amount', 'value'=>$items->item_cost_price]);
echo $this->Form->input('sale_item_extend_price', ['label' => 'Extend amount (per year)', 'value'=>$items->item_extend_price]);

?>