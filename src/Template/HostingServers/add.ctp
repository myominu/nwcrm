<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Hosting Servers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Hostings'), ['controller' => 'Hostings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hosting'), ['controller' => 'Hostings', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="hostingServers form large-10 medium-9 columns">
    <?= $this->Form->create($hostingServer) ?>
    <fieldset>
        <legend><?= __('Add Hosting Server') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('server_dns');
            echo $this->Form->input('server_ip');
            echo $this->Form->input('ftp_host');
            echo $this->Form->input('db_host');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
