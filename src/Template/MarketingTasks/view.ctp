<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Marketing Task'), ['action' => 'edit', $marketingTask->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Marketing Task'), ['action' => 'delete', $marketingTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketingTask->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Marketing Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marketing Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Market Resources'), ['controller' => 'MarketResources', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Market Resource'), ['controller' => 'MarketResources', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="marketingTasks view large-10 medium-9 columns">
    <h2><?= h($marketingTask->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($marketingTask->title) ?></p>
            <h6 class="subheader"><?= __('Task Type') ?></h6>
            <p><?= h($marketingTask->task_type) ?></p>
            <h6 class="subheader"><?= __('Client') ?></h6>
            <p><?= $marketingTask->has('client') ? $this->Html->link($marketingTask->client->name, ['controller' => 'Clients', 'action' => 'view', $marketingTask->client->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Market Resource') ?></h6>
            <p><?= $marketingTask->has('market_resource') ? $this->Html->link($marketingTask->market_resource->name, ['controller' => 'MarketResources', 'action' => 'view', $marketingTask->market_resource->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $marketingTask->has('user') ? $this->Html->link($marketingTask->user->id, ['controller' => 'Users', 'action' => 'view', $marketingTask->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($marketingTask->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($marketingTask->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($marketingTask->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($marketingTask->description)) ?>
        </div>
    </div>
</div>
