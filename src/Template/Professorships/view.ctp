<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group">
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $professorship->id],['class'=>'btn btn-warning','escape'=>false]) ?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professors'), ['controller'=>'Professors','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller'=>'Courses','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['controller'=>'Professors','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Course'), ['controller'=>'Course','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="professorships">
    <h1 class="page-header"><?= h($professorship->course->name.' - '. $professorship->professor->name) ?></h1>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Professor') ?></th>
            <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->name, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $professorship->has('course') ? $this->Html->link($professorship->course->name, ['controller' => 'Courses', 'action' => 'view', $professorship->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($professorship->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($professorship->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($professorship->end_date) ?></td>
        </tr>
    </table>
</div>

<div class="related">
	<h3><?=_('Exams and solutions')?></h3>
	<div class="panel panel-default">
		<div>
			<?= $this->element('examsDisplayGroup', ["exams" => $professorship->exams]); ?>
		</div>
	</div>
</div>