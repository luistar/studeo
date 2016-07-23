<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professor Email'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
	<div class="professorEmails col-sm-12">
	    <h3><?= __('Professor Emails') ?></h3>
	    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('email') ?></th>
	                <th><?= $this->Paginator->sort('professor_id') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($professorEmails as $professorEmail): ?>
	            <tr>
	                <td><?= $this->Number->format($professorEmail->id) ?></td>
	                <td><?= h($professorEmail->email) ?></td>
	                <td><?= $professorEmail->has('professor') ? $this->Html->link($professorEmail->professor->id, ['controller' => 'Professors', 'action' => 'view', $professorEmail->professor->id]) : '' ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $professorEmail->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professorEmail->id]) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professorEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorEmail->id)]) ?>
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