<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professorship'), ['action' => 'edit', $professorship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professorship'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<?= $this->Html->link(__('<i class="fa fa-fw fa-file-text"></i> Add exam'),
						['controller'=>'Exams','action'=>'addToProfessorship',$professorship->id],
						['class'=>'btn btn-default studeo-action-button','escape'=>false])?>

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