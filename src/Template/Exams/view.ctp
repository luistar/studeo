<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exams view large-9 medium-8 columns content">
    <h3><?= h($exam->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Professorship') ?></th>
            <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->id, ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($exam->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($exam->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info') ?></th>
            <td><?= h($exam->info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($exam->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsExercise') ?></th>
            <td><?= $exam->isExercise ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
