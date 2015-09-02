<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="cities view large-10 medium-9 columns">
    <h2><?= h($city->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($city->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($city->id) ?></p>
            <h6 class="subheader"><?= __('Parent Id') ?></h6>
            <p><?= $this->Number->format($city->parent_id) ?></p>
            <h6 class="subheader"><?= __('State Id') ?></h6>
            <p><?= $this->Number->format($city->state_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($city->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($city->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Clients') ?></h4>
    <?php if (!empty($city->clients)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Contact Person') ?></th>
            <th><?= __('Contact Phone Number') ?></th>
            <th><?= __('Contact Email') ?></th>
            <th><?= __('Contact Address') ?></th>
            <th><?= __('City Id') ?></th>
            <th><?= __('State Id') ?></th>
            <th><?= __('Zip') ?></th>
            <th><?= __('Country Id') ?></th>
            <th><?= __('Comment') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($city->clients as $clients): ?>
        <tr>
            <td><?= h($clients->id) ?></td>
            <td><?= h($clients->name) ?></td>
            <td><?= h($clients->contact_person) ?></td>
            <td><?= h($clients->contact_phone_number) ?></td>
            <td><?= h($clients->contact_email) ?></td>
            <td><?= h($clients->contact_address) ?></td>
            <td><?= h($clients->city_id) ?></td>
            <td><?= h($clients->state_id) ?></td>
            <td><?= h($clients->zip) ?></td>
            <td><?= h($clients->country_id) ?></td>
            <td><?= h($clients->comment) ?></td>
            <td><?= h($clients->created) ?></td>
            <td><?= h($clients->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
