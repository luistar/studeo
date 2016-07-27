<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
	<div class="exams col-sm-12">
	    <h3><?= __('Exams') ?></h3>
	    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('professorship_id') ?></th>
	                <th><?= $this->Paginator->sort('file_path') ?></th>
	                <th><?= $this->Paginator->sort('date') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($exams as $exam): ?>
	            <tr>
	                <td><?= $this->Number->format($exam->id) ?></td>
	                <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->id, ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
	                <td><?= h($exam->file_path) ?></td>
	                <td><?= h($exam->date) ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $exam->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exam->id]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
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