<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="professors index large-9 medium-8 columns content">
    <h3><?= __('Professors') ?></h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docentiWebsite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email2') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professors as $professor): ?>
            <tr>
                <td><?= $this->Number->format($professor->id) ?></td>
                <td><?= h($professor->firstName) ?></td>
                <td><?= h($professor->lastName) ?></td>
                <td><?= h($professor->website) ?></td>
                <td><?= h($professor->docentiWebsite) ?></td>
                <td><?= h($professor->email1) ?></td>
                <td><?= h($professor->email2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
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
