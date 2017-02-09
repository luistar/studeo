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
                ['action' => 'delete', $professorship->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professorships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="professorships form large-9 medium-8 columns content">
    <?= $this->Form->create($professorship) ?>
    <fieldset>
        <legend><?= __('Edit Professorship') ?></legend>
        <?php
            echo $this->Form->input('professor_id', ['options' => $professors]);
            echo $this->Form->input('course_id', ['options' => $courses]);
            echo $this->Form->input('description');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
