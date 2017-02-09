<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutions index large-9 medium-8 columns content">
    <h3><?= __('Solutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorAlt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('addedBy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutions as $solution): ?>
            <tr>
                <td><?= $this->Number->format($solution->id) ?></td>
                <td><?= $solution->has('exam') ? $this->Html->link($solution->exam->id, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) : '' ?></td>
                <td><?= $this->Number->format($solution->author) ?></td>
                <td><?= h($solution->authorAlt) ?></td>
                <td><?= $this->Number->format($solution->addedBy) ?></td>
                <td><?= h($solution->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $solution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?>
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
