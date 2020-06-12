<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List C Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List C Roleaccesses'), ['controller' => 'CRoleaccesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New C Roleaccess'), ['controller' => 'CRoleaccesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List C Userroles'), ['controller' => 'CUserroles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New C Userrole'), ['controller' => 'CUserroles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($cRole) ?>
    <fieldset>
        <legend><?= __('Edit C Role') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('seq');
            echo $this->Form->control('description');
            echo $this->Form->control('isactive');
            echo $this->Form->control('isdefault');
            echo $this->Form->control('createdby');
            echo $this->Form->control('updatedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
