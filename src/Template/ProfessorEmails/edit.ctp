<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professorEmail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professorEmail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professor Emails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="professorEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($professorEmail) ?>
    <fieldset>
        <legend><?= __('Edit Professor Email') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('professor_id', ['options' => $professors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
