<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Hosting Server'), ['action' => 'edit', $hostingServer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hosting Server'), ['action' => 'delete', $hostingServer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hostingServer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hosting Servers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hosting Server'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hostings'), ['controller' => 'Hostings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hosting'), ['controller' => 'Hostings', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hostingServers view large-10 medium-9 columns">
    <h2><?= h($hostingServer->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Server Name') ?></h6>
            <p><?= h($hostingServer->name) ?></p>
            <h6 class="subheader"><?= __('Server Dns') ?></h6>
            <p><?= h($hostingServer->server_dns) ?></p>
            <h6 class="subheader"><?= __('Server Ip') ?></h6>
            <p><?= h($hostingServer->server_ip) ?></p>
            <h6 class="subheader"><?= __('Ftp Host') ?></h6>
            <p><?= h($hostingServer->ftp_host) ?></p>
            <h6 class="subheader"><?= __('Db Host') ?></h6>
            <p><?= h($hostingServer->db_host) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($hostingServer->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($hostingServer->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($hostingServer->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Hostings') ?></h4>
    <?php if (!empty($hostingServer->hostings)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Sale Id') ?></th>
            <th><?= __('Hosting Server Id') ?></th>
            <th><?= __('Db Name') ?></th>
            <th><?= __('Db Username') ?></th>
            <th><?= __('Db Password') ?></th>
            <th><?= __('Ftp Username') ?></th>
            <th><?= __('Ftp Password') ?></th>
            <th><?= __('Administrator Info') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($hostingServer->hostings as $hostings): ?>
        <tr>
            <td><?= h($hostings->id) ?></td>
            <td><?= h($hostings->sale_id) ?></td>
            <td><?= h($hostings->hosting_server_id) ?></td>
            <td><?= h($hostings->db_name) ?></td>
            <td><?= h($hostings->db_username) ?></td>
            <td><?= h($hostings->db_password) ?></td>
            <td><?= h($hostings->ftp_username) ?></td>
            <td><?= h($hostings->ftp_password) ?></td>
            <td><?= h($hostings->administrator_info) ?></td>
            <td><?= h($hostings->created) ?></td>
            <td><?= h($hostings->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Hostings', 'action' => 'view', $hostings->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Hostings', 'action' => 'edit', $hostings->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hostings', 'action' => 'delete', $hostings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hostings->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
