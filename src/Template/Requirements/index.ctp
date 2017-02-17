<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirements index large-9 medium-8 columns content">
    <h3><?= __('Requirements') ?></h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('required_for') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirements as $requirement): ?>
            <tr>
                <td><?= $this->Number->format($requirement->id) ?></td>
                <td><?= $requirement->has('course') ? $this->Html->link($requirement->course->name, ['controller' => 'Courses', 'action' => 'view', $requirement->course->id]) : '' ?></td>
                <td><?= $requirement->has('required') ? $this->Html->link($requirement->required->name, ['controller' => 'Courses', 'action' => 'view', $requirement->required->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?>
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
