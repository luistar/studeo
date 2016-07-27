<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exams view large-9 medium-8 columns content">
    <h3><?= h($exam->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Professorship') ?></th>
            <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->id, ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('File Path') ?></th>
            <td><?= h($exam->file_path) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($exam->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Keywords') ?></h4>
        <?= $this->Text->autoParagraph(h($exam->keywords)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solutions') ?></h4>
        <?php if (!empty($exam->solutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Exam Id') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Number') ?></th>
                <th><?= __('Contributor Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exam->solutions as $solutions): ?>
            <tr>
                <td><?= h($solutions->id) ?></td>
                <td><?= h($solutions->exam_id) ?></td>
                <td><?= h($solutions->url) ?></td>
                <td><?= h($solutions->number) ?></td>
                <td><?= h($solutions->contributor_id) ?></td>
                <td><?= h($solutions->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Solutions', 'action' => 'view', $solutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Solutions', 'action' => 'edit', $solutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Solutions', 'action' => 'delete', $solutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
