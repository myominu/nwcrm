<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Masters'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="masters form large-10 medium-9 columns">
    <?= $this->Form->create($master) ?>
    <fieldset>
        <legend><?= __('Add Master') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentMasters, 'empty' => '(choose one)']);
            //echo $this->Form->input('parent_id');
            echo $this->Form->input('name');            
            echo $this->Form->input('var1');
            echo $this->Form->input('var2');
            echo $this->Form->input('var3');
            echo $this->Form->input('icon1_file_name');
            echo $this->Form->input('icon2_file_name');
            echo $this->Form->input('icon3_file_name');
            echo $this->Form->input('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
