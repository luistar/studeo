<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professorship'), ['action' => 'edit', $professorship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professorship'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="professorships view large-9 medium-8 columns content">
    <h3><?= h($professorship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Professor') ?></th>
            <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->id, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $professorship->has('course') ? $this->Html->link($professorship->course->name, ['controller' => 'Courses', 'action' => 'view', $professorship->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($professorship->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($professorship->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= $this->Number->format($professorship->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= $this->Number->format($professorship->end_date) ?></td>
        </tr>
    </table>
</div>