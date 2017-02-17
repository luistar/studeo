<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement'), ['action' => 'edit', $requirement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirements view large-9 medium-8 columns content">
    <h3><?= h($requirement->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $requirement->has('course') ? $this->Html->link($requirement->course->name, ['controller' => 'Courses', 'action' => 'view', $requirement->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Required For') ?></th>
            <td><?= $requirement->has('required') ? $this->Html->link($requirement->required->name, ['controller' => 'Courses', 'action' => 'view', $requirement->required->id]) : '' ?></td>
        </tr>
    </table>
</div>
