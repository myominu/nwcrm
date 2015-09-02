<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Hosting'), ['action' => 'edit', $hosting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hosting'), ['action' => 'delete', $hosting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hosting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hostings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hosting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hosting Servers'), ['controller' => 'HostingServers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hosting Server'), ['controller' => 'HostingServers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hostings view large-10 medium-9 columns">
    <h2><?= h($hosting->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Sale') ?></h6>
            <p><?= $hosting->has('sale') ? $this->Html->link($hosting->sale->name, ['controller' => 'Sales', 'action' => 'view', $hosting->sale->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Hosting Server') ?></h6>
            <p><?= $hosting->has('hosting_server') ? $this->Html->link($hosting->hosting_server->name, ['controller' => 'HostingServers', 'action' => 'view', $hosting->hosting_server->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Db Name') ?></h6>
            <p><?= h($hosting->db_name) ?></p>
            <h6 class="subheader"><?= __('Db Username') ?></h6>
            <p><?= h($hosting->db_username) ?></p>
            <h6 class="subheader"><?= __('Db Password') ?></h6>
            <p><?= h($hosting->db_password) ?></p>
            <h6 class="subheader"><?= __('Ftp Username') ?></h6>
            <p><?= h($hosting->ftp_username) ?></p>
            <h6 class="subheader"><?= __('Ftp Password') ?></h6>
            <p><?= h($hosting->ftp_password) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($hosting->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($hosting->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($hosting->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Administrator Info') ?></h6>
            <?= $this->Text->autoParagraph(h($hosting->administrator_info)) ?>
        </div>
    </div>
</div>
