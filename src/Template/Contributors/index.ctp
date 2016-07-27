<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contributor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contributors col-sm-12">
    <h3><?= __('Contributors') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ext_id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('avatar_path') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contributors as $contributor): ?>
            <tr>
                <td><?= $this->Number->format($contributor->id) ?></td>
                <td><?= $this->Number->format($contributor->ext_id) ?></td>
                <td><?= h($contributor->username) ?></td>
                <td><?= h($contributor->website) ?></td>
                <td><?= h($contributor->first_name) ?></td>
                <td><?= h($contributor->last_name) ?></td>
                <td><?= h($contributor->avatar_path) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contributor->id],['class'=>'btn btn-xs btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contributor->id],['class'=>'btn btn-xs btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contributor->id], ['class'=>'btn btn-xs btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $contributor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
