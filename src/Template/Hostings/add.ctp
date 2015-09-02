<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Hostings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hosting Servers'), ['controller' => 'HostingServers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hosting Server'), ['controller' => 'HostingServers', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="hostings form large-10 medium-9 columns">
    <?= $this->Form->create($hosting) ?>
    <fieldset>
        <legend><?= __('Add Hosting') ?></legend>
        <?php
            echo $this->Form->input('sale_id', ['options' => $sales, 'empty' => true]);
            echo $this->Form->input('hosting_server_id', ['options' => $hostingServers]);
            echo $this->Form->input('db_name');
            echo $this->Form->input('db_username');
            echo $this->Form->input('db_password');
            echo $this->Form->input('ftp_username');
            echo $this->Form->input('ftp_password');
            echo $this->Form->input('administrator_info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
