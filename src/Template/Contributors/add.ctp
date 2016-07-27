<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contributors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contributors form large-9 medium-8 columns content">
    <?= $this->Form->create($contributor) ?>
    <fieldset>
        <legend><?= __('Add Contributor') ?></legend>
        <?php
            echo $this->Form->input('ext_id');
            echo $this->Form->input('username');
            echo $this->Form->input('bio');
            echo $this->Form->input('website');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('avatar_path');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
