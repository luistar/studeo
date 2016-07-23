<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
	<div class="professorships col-sm-12">
	    <h3><?= __('Professorships') ?></h3>
	    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('year_start') ?></th>
	                <th><?= $this->Paginator->sort('year_end') ?></th>
	                <th><?= $this->Paginator->sort('group_id') ?></th>
	                <th><?= $this->Paginator->sort('professor_id') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($professorships as $professorship): ?>
	            <tr>
	                <td><?= $this->Number->format($professorship->id) ?></td>
	                <td><?= $this->Number->format($professorship->year_start) ?></td>
	                <td><?= $this->Number->format($professorship->year_end) ?></td>
	                <td><?= $professorship->has('group') ? $this->Html->link($professorship->group->name, ['controller' => 'Groups', 'action' => 'view', $professorship->group->id]) : '' ?></td>
	                <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->id, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $professorship->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professorship->id]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	    <p><?= $this->Paginator->counter() ?></p>
	    <div class="paginator">
	        <ul class="pagination">
	            <?= $this->Paginator->prev('< ' . __('previous')) ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next(__('next') . ' >') ?>
	        </ul>
	    </div>
	</div>
</div>