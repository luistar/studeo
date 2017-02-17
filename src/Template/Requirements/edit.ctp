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
                ['action' => 'delete', $requirement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirements form large-9 medium-8 columns content">
    <?= $this->Form->create($requirement) ?>
    <fieldset>
        <legend><?= __('Edit Requirement') ?></legend>
        <?php
            echo $this->Form->input('course_id', ['options' => $courses]);
            echo $this->Form->input('required_for',['options' => $courses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
