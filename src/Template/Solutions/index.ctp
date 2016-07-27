<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contributors'), ['controller' => 'Contributors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contributor'), ['controller' => 'Contributors', 'action' => 'add']) ?></li>
    </ul>
</nav>
	<div class="row">
	<div class="solutions col-sm-12">
	    <h3><?= __('Solutions') ?></h3>
	    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('exam_id') ?></th>
	                <th><?= $this->Paginator->sort('url') ?></th>
	                <th><?= $this->Paginator->sort('number') ?></th>
	                <th><?= $this->Paginator->sort('contributor_id') ?></th>
	                <th><?= $this->Paginator->sort('is_deleted') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($solutions as $solution): ?>
	            <tr>
	                <td><?= $this->Number->format($solution->id) ?></td>
	                <td><?= $solution->has('exam') ? $this->Html->link($solution->exam->id, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) : '' ?></td>
	                <td><?= h($solution->url) ?></td>
	                <td><?= $this->Number->format($solution->number) ?></td>
	                <td><?= $solution->has('contributor') ? $this->Html->link($solution->contributor->id, ['controller' => 'Contributors', 'action' => 'view', $solution->contributor->id]) : '' ?></td>
	                <td><?= h($solution->is_deleted) ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $solution->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solution->id]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?>
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
</div>