<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="emails view large-10 medium-9 columns">
    <h2><?= h($email->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Sale') ?></h6>
            <p><?= $email->has('sale') ? $this->Html->link($email->sale->name, ['controller' => 'Sales', 'action' => 'view', $email->sale->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($email->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($email->password) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($email->url) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($email->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($email->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($email->modified) ?></p>
        </div>
    </div>
</div>
