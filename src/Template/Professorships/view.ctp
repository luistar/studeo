<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professorship'), ['action' => 'edit', $professorship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professorship'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="professorships view large-9 medium-8 columns content">
    <h3><?= h($professorship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $professorship->has('group') ? $this->Html->link($professorship->group->name, ['controller' => 'Groups', 'action' => 'view', $professorship->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Professor') ?></th>
            <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->id, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($professorship->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Year Start') ?></th>
            <td><?= $this->Number->format($professorship->year_start) ?></td>
        </tr>
        <tr>
            <th><?= __('Year End') ?></th>
            <td><?= $this->Number->format($professorship->year_end) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Exams') ?></h4>
        <?php if (!empty($professorship->exams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Professorship Id') ?></th>
                <th><?= __('File Path') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Keywords') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($professorship->exams as $exams): ?>
            <tr>
                <td><?= h($exams->id) ?></td>
                <td><?= h($exams->professorship_id) ?></td>
                <td><?= h($exams->file_path) ?></td>
                <td><?= h($exams->date) ?></td>
                <td><?= h($exams->keywords) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exams', 'action' => 'view', $exams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exams', 'action' => 'edit', $exams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exams', 'action' => 'delete', $exams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
