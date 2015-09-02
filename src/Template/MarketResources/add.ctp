<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Market Resources'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="marketResources form large-10 medium-9 columns">
    <?= $this->Form->create($marketResource) ?>
    <fieldset>
        <legend><?= __('Add Market Resource') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('contact_info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
