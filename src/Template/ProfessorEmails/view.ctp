<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professor Email'), ['action' => 'edit', $professorEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professor Email'), ['action' => 'delete', $professorEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professor Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="professorEmails view large-9 medium-8 columns content">
    <h3><?= h($professorEmail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($professorEmail->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Professor') ?></th>
            <td><?= $professorEmail->has('professor') ? $this->Html->link($professorEmail->professor->id, ['controller' => 'Professors', 'action' => 'view', $professorEmail->professor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($professorEmail->id) ?></td>
        </tr>
    </table>
</div>
