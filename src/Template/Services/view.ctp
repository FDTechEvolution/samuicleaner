<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Service Items'), ['controller' => 'ServiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Item'), ['controller' => 'ServiceItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($service->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Th') ?></th>
            <td><?= h($service->name_th) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Eng') ?></th>
            <td><?= h($service->name_eng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($service->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($service->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($service->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($service->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Service Items') ?></h4>
        <?php if (!empty($service->service_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Booking Id') ?></th>
                <th scope="col"><?= __('Service Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Seq') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($service->service_items as $serviceItems): ?>
            <tr>
                <td><?= h($serviceItems->id) ?></td>
                <td><?= h($serviceItems->booking_id) ?></td>
                <td><?= h($serviceItems->service_id) ?></td>
                <td><?= h($serviceItems->amount) ?></td>
                <td><?= h($serviceItems->seq) ?></td>
                <td><?= h($serviceItems->description) ?></td>
                <td><?= h($serviceItems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ServiceItems', 'action' => 'view', $serviceItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceItems', 'action' => 'edit', $serviceItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceItems', 'action' => 'delete', $serviceItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
