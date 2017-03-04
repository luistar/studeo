<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('/DataTables/datatables.min.css', ['block'=>'css']);?>
<?= $this->Html->script('/DataTables/datatables.min.js', ['inline' => false, 'block' => 'script']);?>

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
    
    <?php if($isAdmin):?>
    <table class="table table-striped table-bordered" id="examsTable">
        <thead>
            <tr>
                <?php /*<th scope="col"><?= __('id') ?></th>*/?>
                <th scope="col"><?= __('Professorship') ?></th>
                <th scope="col"><?= __('url') ?></th>
                <th scope="col"><?= __('path') ?></th>
                <th scope="col"><?= __('isExercise') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('info') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exams as $exam): ?>
            <tr>
                <?php /*<td><?= $this->Number->format($exam->id) ?></td>*/?>
                <td><?= $exam->has('professorship') ? $this->Html->link($exam->professorship->course->name.' - '.$exam->professorship->professor->name.' ('.$exam->professorship->start_date.'-'.$exam->professorship->end_date.')', ['controller' => 'Professorships', 'action' => 'view', $exam->professorship->id]) : '' ?></td>
                <td><?= $this->Html->link('link',$exam->url) ?></td>
                <td><?= h($exam->path) ?></td>
                <td><?= h($exam->isExercise) ?></td>
                <td><?= h($exam->date) ?></td>
                <td><?= h($exam->info) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-fw fa-eye"></i>', ['action' => 'view', $exam->id],['class'=>'btn btn-xs btn-primary','escape'=>false]) ?>
                    <?= $this->Html->link('<i class="fa fa-fw fa-edit"></i>', ['action' => 'edit', $exam->id],['class'=>'btn btn-xs btn-warning','escape'=>false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i>', ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id),'class'=>'btn btn-xs btn-danger','escape'=>false]) ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php /*
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
    */?>
    <?php endif;?>
</div>

<script>
$(document).ready(function(){
	$('#examsTable').DataTable({
		"columnDefs": [
			{ "searchable": false, "orderable": false, "targets": [1,2,3,6] }
		],
		"drawCallback": function( settings ) {
			$('[data-toggle="popover"]').popover(); 
	    }
	});
});
</script>
