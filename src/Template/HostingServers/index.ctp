<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Hosting Server'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hostings'), ['controller' => 'Hostings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hosting'), ['controller' => 'Hostings', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="hostingServers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('server_dns') ?></th>
            <th><?= $this->Paginator->sort('server_ip') ?></th>
            <th><?= $this->Paginator->sort('ftp_host') ?></th>
            <th><?= $this->Paginator->sort('db_host') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($hostingServers as $hostingServer): ?>
        <tr>
            <td><?= $this->Number->format($hostingServer->id) ?></td>
            <td><?= h($hostingServer->name) ?></td>
            <td><?= h($hostingServer->server_dns) ?></td>
            <td><?= h($hostingServer->server_ip) ?></td>
            <td><?= h($hostingServer->ftp_host) ?></td>
            <td><?= h($hostingServer->db_host) ?></td>
            <td><?= h($hostingServer->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $hostingServer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hostingServer->id]) ?>
                
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hostingServer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hostingServer->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
