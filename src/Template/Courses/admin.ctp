<div class="page-header">
	<h1>Courses: Admin Control Panel</h1>
</div>

<div class="row">
	<div class="col-xs-12">
		<?=$this->Html->link(__('Add new course'),['action'=>'add'],['class'=>'btn btn-primary', 'style'=>'margin-bottom:10px'])?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
	        <thead>
	            <tr>
	                <th><?= $this->Paginator->sort('id') ?></th>
	                <th><?= $this->Paginator->sort('name') ?></th>
	                <th><?= $this->Paginator->sort('picture_path') ?></th>
	                <th><?= $this->Paginator->sort('degree_id') ?></th>
	                <th><?= $this->Paginator->sort('isMandatory') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($courses as $course): ?>
	            <tr>
	                <td><?= $this->Number->format($course->id) ?></td>
	                <td><?= h($course->name) ?></td>
	                <td><?= h($course->picture_path) ?></td>
	                <td><?= $course->has('degree') ? $this->Html->link($course->degree->name, ['controller' => 'Degrees', 'action' => 'view', $course->degree->id]) : '' ?></td>
	                <td><?= h($course->isMandatory) ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->id],['class'=>'btn btn-xs btn-primary']) ?>
	                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id],['class'=>'btn btn-xs btn-warning']) ?>
	                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id),'class'=>'btn btn-xs btn-danger']) ?>
	                    <?= $this->Html->link(__('Edit groups'), ['controller'=>'Groups','action' => 'index', $course->id],['class'=>'btn btn-xs btn-info']) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
    	</table>
    	<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
    
    <div class="paginator pull-right">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>