<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Master'), ['action' => 'edit', $master->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master'), ['action' => 'delete', $master->id], ['confirm' => __('Are you sure you want to delete # {0}?', $master->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Masters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="masters view large-10 medium-9 columns">
    <h2><?= h($master->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($master->name) ?></p>
            <h6 class="subheader"><?= __('Var1') ?></h6>
            <p><?= h($master->var1) ?></p>
            <h6 class="subheader"><?= __('Var2') ?></h6>
            <p><?= h($master->var2) ?></p>
            <h6 class="subheader"><?= __('Var3') ?></h6>
            <p><?= h($master->var3) ?></p>
            <h6 class="subheader"><?= __('Icon1 File Name') ?></h6>
            <p><?= h($master->icon1_file_name) ?></p>
            <h6 class="subheader"><?= __('Icon2 File Name') ?></h6>
            <p><?= h($master->icon2_file_name) ?></p>
            <h6 class="subheader"><?= __('Icon3 File Name') ?></h6>
            <p><?= h($master->icon3_file_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($master->id) ?></p>
            <h6 class="subheader"><?= __('Parent Id') ?></h6>
            <p><?= $this->Number->format($master->parent_id) ?></p>
            <h6 class="subheader"><?= __('Lft') ?></h6>
            <p><?= $this->Number->format($master->lft) ?></p>
            <h6 class="subheader"><?= __('Rght') ?></h6>
            <p><?= $this->Number->format($master->rght) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($master->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($master->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Text') ?></h6>
            <?= $this->Text->autoParagraph(h($master->text)) ?>
        </div>
    </div>
</div>
