<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professor Emails'), ['controller' => 'ProfessorEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor Email'), ['controller' => 'ProfessorEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
	<div class="professors col-sm-12">
	    <h3><?= __('Professors') ?></h3>
	    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('first_name') ?></th>
	                <th><?= $this->Paginator->sort('last_name') ?></th>
	                <th><?= $this->Paginator->sort('office') ?></th>
	                <th><?= $this->Paginator->sort('website') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($professors as $professor): ?>
	            <tr>
	                <td><?= $this->Number->format($professor->id) ?></td>
	                <td><?= h($professor->first_name) ?></td>
	                <td><?= h($professor->last_name) ?></td>
	                <td><?= h($professor->office) ?></td>
	                <td><?= h($professor->website) ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id],['class'=>'btn btn-xs btn-info']) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id],['class'=>'btn btn-xs btn-warning']) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->id], ['class'=>'btn btn-xs btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
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