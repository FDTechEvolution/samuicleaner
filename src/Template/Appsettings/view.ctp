<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Appsetting'), ['action' => 'edit', $appsetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Appsetting'), ['action' => 'delete', $appsetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appsetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Appsettings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appsetting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appsettings view large-9 medium-8 columns content">
    <h3><?= h($appsetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($appsetting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Per Hour') ?></th>
            <td><?= $this->Number->format($appsetting->price_per_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Percent') ?></th>
            <td><?= $this->Number->format($appsetting->discount_percent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($appsetting->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($appsetting->updated) ?></td>
        </tr>
    </table>
</div>
