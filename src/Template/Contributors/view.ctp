<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contributor'), ['action' => 'edit', $contributor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contributor'), ['action' => 'delete', $contributor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contributor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contributors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contributor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contributors view large-9 medium-8 columns content">
    <h3><?= h($contributor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($contributor->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($contributor->website) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($contributor->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($contributor->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Avatar Path') ?></th>
            <td><?= h($contributor->avatar_path) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contributor->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ext Id') ?></th>
            <td><?= $this->Number->format($contributor->ext_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($contributor->bio)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solutions') ?></h4>
        <?php if (!empty($contributor->solutions)): ?>
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
            <?php foreach ($contributor->solutions as $solutions): ?>
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
