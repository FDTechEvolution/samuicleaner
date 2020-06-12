<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New C Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List C Roleaccesses'), ['controller' => 'CRoleaccesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New C Roleaccess'), ['controller' => 'CRoleaccesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List C Userroles'), ['controller' => 'CUserroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New C Userrole'), ['controller' => 'CUserroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cRoles index large-9 medium-8 columns content">
    <h3><?= __('C Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isdefault') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cRoles as $cRole): ?>
            <tr>
                <td><?= h($cRole->id) ?></td>
                <td><?= h($cRole->name) ?></td>
                <td><?= $this->Number->format($cRole->seq) ?></td>
                <td><?= h($cRole->description) ?></td>
                <td><?= h($cRole->isactive) ?></td>
                <td><?= h($cRole->isdefault) ?></td>
                <td><?= h($cRole->created) ?></td>
                <td><?= h($cRole->updated) ?></td>
                <td><?= h($cRole->createdby) ?></td>
                <td><?= h($cRole->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cRole->id)]) ?>
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
