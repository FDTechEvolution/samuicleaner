<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Service Items'), ['controller' => 'ServiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service Item'), ['controller' => 'ServiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="services index large-9 medium-8 columns content">
    <h3><?= __('Services') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_th') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_eng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
            <tr>
                <td><?= h($service->id) ?></td>
                <td><?= h($service->name_th) ?></td>
                <td><?= h($service->name_eng) ?></td>
                <td><?= h($service->type) ?></td>
                <td><?= $this->Number->format($service->price) ?></td>
                <td><?= $this->Number->format($service->seq) ?></td>
                <td><?= h($service->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $service->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
