<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $group->has('course') ? $this->Html->link($group->course->name, ['controller' => 'Courses', 'action' => 'view', $group->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($group->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Professorships') ?></h4>
        <?php if (!empty($group->professorships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Year Start') ?></th>
                <th><?= __('Year End') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Professor Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->professorships as $professorships): ?>
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
