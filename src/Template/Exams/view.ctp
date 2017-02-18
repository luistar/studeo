<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="btn-group">
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $exam->id],['class'=>'btn btn-warning','escape'=>false])?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete {0}?', $exam->date.'('.$exam->info.')'),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Exam'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?php endif;?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php endif;?>
</div>

<div class="exams view large-9 medium-8 columns content">
    <h3><?= h($exam->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Professorship') ?></th>
            <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->id, ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($exam->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($exam->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info') ?></th>
            <td><?= h($exam->info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($exam->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsExercise') ?></th>
            <td><?= $exam->isExercise ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="related">
	<h3 class="page-header"><?= __('Solutions')?></h3>
	<div class="panel panel-default"><div><?= $this->element('examsDisplayGroup',['exams'=>array($exam)])?></div></div>
</div>