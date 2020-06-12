<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Package'), ['action' => 'edit', $package->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Package'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Packages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Package'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="packages view large-9 medium-8 columns content">
    <h3><?= h($package->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($package->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Th') ?></th>
            <td><?= h($package->name_th) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name En') ?></th>
            <td><?= h($package->name_en) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ismonthly') ?></th>
            <td><?= h($package->ismonthly) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isdiscount') ?></th>
            <td><?= h($package->isdiscount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($package->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Per Month') ?></th>
            <td><?= $this->Number->format($package->service_per_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($package->created) ?></td>
        </tr>
    </table>
</div>
