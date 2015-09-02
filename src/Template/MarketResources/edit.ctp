<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $marketResource->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $marketResource->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Market Resources'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="marketResources form large-10 medium-9 columns">
    <?= $this->Form->create($marketResource) ?>
    <fieldset>
        <legend><?= __('Edit Market Resource') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('contact_info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
