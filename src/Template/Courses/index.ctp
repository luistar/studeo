	<div class="page-header">
    	<h1><?= __('Courses') ?></h1>
    </div>
    
    <!--
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
                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?>
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
    -->

<div>
	<table class="table table-striped">
		<thead>
			<tr style="font-size:1.2em"><th colspan="4">First year <i class="fa fa-caret-square-o-down pull-right" style="margin-right:10px; text-size:1.2em"></i></th></tr>
			<tr>
				<th></th><th><?=__('Course')?></th>
				<th class="hidden-xs"><?=__('Tests')?></th><th class="hidden-xs"><?=__('Solutions')?></th></tr>
		</thead>
		<tbody>
			<?php foreach ($courses as $course): ?>
				<td class="col-md-1"><img src="http://placehold.it/64x64"/></td>
				<td>
					<?=$this->Html->link($course->name,['action'=>'view',$course->id],['class'=>'course-name']);?><br>
					<i><?=$course->description?></i></td>
				<td class="col-md-1 hidden-xs">25</td>
				<td class="col-md-1 hidden-xs">52</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>	

