<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit C Role'), ['action' => 'edit', $cRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete C Role'), ['action' => 'delete', $cRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List C Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New C Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List C Roleaccesses'), ['controller' => 'CRoleaccesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New C Roleaccess'), ['controller' => 'CRoleaccesses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List C Userroles'), ['controller' => 'CUserroles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New C Userrole'), ['controller' => 'CUserroles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cRoles view large-9 medium-8 columns content">
    <h3><?= h($cRole->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($cRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cRole->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($cRole->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($cRole->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isdefault') ?></th>
            <td><?= h($cRole->isdefault) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($cRole->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updatedby') ?></th>
            <td><?= h($cRole->updatedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($cRole->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($cRole->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related C Roleaccesses') ?></h4>
        <?php if (!empty($cRole->c_roleaccesses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('C Role Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cRole->c_roleaccesses as $cRoleaccesses): ?>
            <tr>
                <td><?= h($cRoleaccesses->id) ?></td>
                <td><?= h($cRoleaccesses->c_role_id) ?></td>
                <td><?= h($cRoleaccesses->controller) ?></td>
                <td><?= h($cRoleaccesses->action) ?></td>
                <td><?= h($cRoleaccesses->description) ?></td>
                <td><?= h($cRoleaccesses->isactive) ?></td>
                <td><?= h($cRoleaccesses->created) ?></td>
                <td><?= h($cRoleaccesses->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CRoleaccesses', 'action' => 'view', $cRoleaccesses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CRoleaccesses', 'action' => 'edit', $cRoleaccesses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CRoleaccesses', 'action' => 'delete', $cRoleaccesses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cRoleaccesses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related C Userroles') ?></h4>
        <?php if (!empty($cRole->c_userroles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('C Role Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Updatedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cRole->c_userroles as $cUserroles): ?>
            <tr>
                <td><?= h($cUserroles->id) ?></td>
                <td><?= h($cUserroles->user_id) ?></td>
                <td><?= h($cUserroles->c_role_id) ?></td>
                <td><?= h($cUserroles->description) ?></td>
                <td><?= h($cUserroles->created) ?></td>
                <td><?= h($cUserroles->updated) ?></td>
                <td><?= h($cUserroles->createdby) ?></td>
                <td><?= h($cUserroles->updatedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CUserroles', 'action' => 'view', $cUserroles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CUserroles', 'action' => 'edit', $cUserroles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CUserroles', 'action' => 'delete', $cUserroles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cUserroles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
