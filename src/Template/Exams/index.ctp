<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group">
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Exam'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?php endif;?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php endif;?>
</div>

<div class="exams">
    <h1 class="page-header"><?= __('Exams') ?></h1>
    <div class="jumbotron">
    	<h2><?=__('Studeo is currently managing {0} exams',$exams->count())?></h2>
    	<p><?=__('You can access the exams and all related functionality by selecting the {0} you\'re interested in.',
    			$this->Html->link(__('course'),['controller'=>'Courses']))?></p>
    </div>
    
    <?php if(true): //TODO only admins and mods should see this section?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('professorship_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isExercise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exams as $exam): ?>
            <tr>
                <td><?= $this->Number->format($exam->id) ?></td>
                <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->course->name.' - '.$exam->professorship->professor->name.' ('.$exam->professorship->start_date.'-'.$exam->professorship->end_date.')', ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
                <td><?= h($exam->url) ?></td>
                <td><?= h($exam->path) ?></td>
                <td><?= h($exam->isExercise) ?></td>
                <td><?= h($exam->date) ?></td>
                <td><?= h($exam->info) ?></td>
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <?php endif;?>
</div>
