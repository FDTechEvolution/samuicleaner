<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Package'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="packages index large-9 medium-8 columns content">
    <h3><?= __('Packages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_th') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_en') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ismonthly') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isdiscount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_per_month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packages as $package): ?>
            <tr>
                <td><?= h($package->id) ?></td>
                <td><?= h($package->name_th) ?></td>
                <td><?= h($package->name_en) ?></td>
                <td><?= h($package->ismonthly) ?></td>
                <td><?= h($package->isdiscount) ?></td>
                <td><?= $this->Number->format($package->service_per_month) ?></td>
                <td><?= h($package->description) ?></td>
                <td><?= h($package->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $package->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $package->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id)]) ?>
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
