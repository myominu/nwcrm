<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Market Resource'), ['action' => 'edit', $marketResource->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Market Resource'), ['action' => 'delete', $marketResource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marketResource->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Market Resources'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Market Resource'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="marketResources view large-10 medium-9 columns">
    <h2><?= h($marketResource->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($marketResource->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($marketResource->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($marketResource->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($marketResource->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Contact Info') ?></h6>
            <?= $this->Text->autoParagraph(h($marketResource->contact_info)) ?>
        </div>
    </div>
</div>
