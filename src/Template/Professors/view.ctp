<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professor Emails'), ['controller' => 'ProfessorEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor Email'), ['controller' => 'ProfessorEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="professors view large-9 medium-8 columns content">
    <h3><?= h($professor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($professor->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($professor->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Office') ?></th>
            <td><?= h($professor->office) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($professor->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($professor->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($professor->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Professor Emails') ?></h4>
        <?php if (!empty($professor->professor_emails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Professor Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($professor->professor_emails as $professorEmails): ?>
            <tr>
                <td><?= h($professorEmails->id) ?></td>
                <td><?= h($professorEmails->email) ?></td>
                <td><?= h($professorEmails->professor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProfessorEmails', 'action' => 'view', $professorEmails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProfessorEmails', 'action' => 'edit', $professorEmails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProfessorEmails', 'action' => 'delete', $professorEmails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorEmails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Professorships') ?></h4>
        <?php if (!empty($professor->professorships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Year Start') ?></th>
                <th><?= __('Year End') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Professor Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($professor->professorships as $professorships): ?>
            <tr>
                <td><?= h($professorships->id) ?></td>
                <td><?= h($professorships->year_start) ?></td>
                <td><?= h($professorships->year_end) ?></td>
                <td><?= h($professorships->group_id) ?></td>
                <td><?= h($professorships->professor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Professorships', 'action' => 'view', $professorships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Professorships', 'action' => 'edit', $professorships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Professorships', 'action' => 'delete', $professorships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
