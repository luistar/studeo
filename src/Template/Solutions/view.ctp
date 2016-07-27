<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solution'), ['action' => 'edit', $solution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solution'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contributors'), ['controller' => 'Contributors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contributor'), ['controller' => 'Contributors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="solutions view large-9 medium-8 columns content">
    <h3><?= h($solution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Exam') ?></th>
            <td><?= $solution->has('exam') ? $this->Html->link($solution->exam->id, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($solution->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Contributor') ?></th>
            <td><?= $solution->has('contributor') ? $this->Html->link($solution->contributor->id, ['controller' => 'Contributors', 'action' => 'view', $solution->contributor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($solution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number') ?></th>
            <td><?= $this->Number->format($solution->number) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Deleted') ?></th>
            <td><?= $solution->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
