<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="professorships index large-9 medium-8 columns content">
    <h3><?= __('Professorships') ?></h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('professor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professorships as $professorship): ?>
            <tr>
                <td><?= $this->Number->format($professorship->id) ?></td>
                <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->name, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
                <td><?= $professorship->has('course') ? $this->Html->link($professorship->course->name, ['controller' => 'Courses', 'action' => 'view', $professorship->course->id]) : '' ?></td>
                <td><?= h($professorship->description) ?></td>
                <td><?= $this->Number->format($professorship->start_date) ?></td>
                <td><?= $this->Number->format($professorship->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $professorship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professorship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
