<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('/DataTables/datatables.min.css', ['block'=>'css']);?>
<?= $this->Html->script('/DataTables/datatables.min.js', ['inline' => false, 'block' => 'script']);?>

<div class="btn-group">
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professors'), ['controller'=>'Professors','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller'=>'Courses','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['controller'=>'Professors','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Course'), ['controller'=>'Course','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="professorships">
    <h1 class="page-header"><?= __('Professorships') ?></h1>
    <table class="table table-striped table-bordered" id="professorshipsTable">
        <thead>
            <tr>
                <?php /* <th scope="col"><?= $this->Paginator->sort('id') ?></th> */?>
                <th scope="col"><?= $this->Paginator->sort('professor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professorships as $professorship): ?>
            <tr>
                <?php /* <td><?= $this->Number->format($professorship->id) ?></td> */?>
                <td><?= $professorship->has('professor') ? $this->Html->link($professorship->professor->name, ['controller' => 'Professors', 'action' => 'view', $professorship->professor->id]) : '' ?></td>
                <td><?= $professorship->has('course') ? $this->Html->link($professorship->course->name, ['controller' => 'Courses', 'action' => 'view', $professorship->course->id]) : '' ?></td>
                <td><?= h($professorship->description) ?></td>
                <td><?= $professorship->start_date ?></td>
                <td><?= $professorship->end_date ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-fw fa-info-circle"></i> '.__('View'), ['action' => 'view', $professorship->id],['class'=>'btn btn-xs btn-primary','escape'=>false]) ?>
                    <?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $professorship->id],['class'=>'btn btn-xs btn-warning','escape'=>false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id),'class'=>'btn btn-xs btn-danger','escape'=>false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
	$('#professorshipsTable').DataTable({
		"columnDefs": [
			{ "searchable": false, "orderable": false, "targets": [5] }
		]
	});
});
</script>
