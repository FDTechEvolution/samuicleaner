<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Packages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="packages form large-9 medium-8 columns content">
    <?= $this->Form->create($package) ?>
    <fieldset>
        <legend><?= __('Add Package') ?></legend>
        <?php
            echo $this->Form->control('name_th');
            echo $this->Form->control('name_en');
            echo $this->Form->control('ismonthly');
            echo $this->Form->control('isdiscount');
            echo $this->Form->control('service_per_month');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
