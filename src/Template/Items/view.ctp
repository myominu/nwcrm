<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="items view large-10 medium-9 columns">
    <h2><?= h($item->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($item->name) ?></p>
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= $item->has('category') ? $this->Html->link($item->category->name, ['controller' => 'Categories', 'action' => 'view', $item->category->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item Number') ?></h6>
            <p><?= h($item->item_number) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($item->id) ?></p>
            <h6 class="subheader"><?= __('Item Cost Price') ?></h6>
            <p><?= $this->Number->format($item->item_cost_price) ?></p>
            <h6 class="subheader"><?= __('Item Extend Price') ?></h6>
            <p><?= $this->Number->format($item->item_extend_price) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($item->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($item->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($item->description)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Sales') ?></h4>
    <?php if (!empty($item->sales)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Item Id') ?></th>
            <th><?= __('Client Id') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Sale Item Cost Price') ?></th>
            <th><?= __('Sale Item Extend Price') ?></th>
            <th><?= __('Item Extend Start Date') ?></th>
            <th><?= __('Item Extend End Date') ?></th>
            <th><?= __('Item Domain Url') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($item->sales as $sales): ?>
        <tr>
            <td><?= h($sales->id) ?></td>
            <td><?= h($sales->item_id) ?></td>
            <td><?= h($sales->client_id) ?></td>
            <td><?= h($sales->description) ?></td>
            <td><?= h($sales->sale_item_cost_price) ?></td>
            <td><?= h($sales->sale_item_extend_price) ?></td>
            <td><?= h($sales->item_extend_start_date) ?></td>
            <td><?= h($sales->item_extend_end_date) ?></td>
            <td><?= h($sales->item_domain_url) ?></td>
            <td><?= h($sales->created) ?></td>
            <td><?= h($sales->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
