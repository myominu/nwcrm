<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $marketingTask->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $marketingTask->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Marketing Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Market Resources'), ['controller' => 'MarketResources', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Market Resource'), ['controller' => 'MarketResources', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="marketingTasks form large-10 medium-9 columns">
    <?= $this->Form->create($marketingTask) ?>
    <fieldset>
        <legend><?= __('Edit Marketing Task') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('task_type', ['options' => $task_type]);
            echo $this->Form->input('client_id', ['options' => $clients, 'empty' => true]);
            echo $this->Form->input('market_resource_id', ['options' => $marketResources, 'empty' => true]);
            echo $this->Form->input('appointment_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
