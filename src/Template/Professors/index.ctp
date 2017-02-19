<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('/DataTables/datatables.min.css', ['block'=>'css']);?>
<?= $this->Html->script('/DataTables/datatables.min.js', ['inline' => false, 'block' => 'script']);?>

<?php if($isAdmin):?>
<div class="btn-group">
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
</div>
<?php endif;?>

<div class="">
    <h1 class="page-header"><?= __('Professors') ?></h1>
    <table class="table table-striped table-bordered" id="professorsTable">
        <thead>
            <tr>
                <th scope="col"><?= __('First name') ?></th>
                <th scope="col"><?= __('Last name') ?></th>
                <th scope="col"><?= __('Contacts') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professors as $professor): ?>
            <tr>
                <td><?= h($professor->firstName) ?></td>
                <td><?= h($professor->lastName) ?></td>
                <td>
                	<?php if($professor->website):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-globe"></i>',$professor->website,
                				['escape'=>false,'target'=>'_blank','_full'=>true,
                				 'data-toggle'=>"popover", 'data-trigger'=>'hover', 'data-placement'=>'top', 'title'=>__('Personal Website'), 'data-content'=>$professor->website
                		])?>
                	<?php endif; ?>
                	<?php if($professor->docentiWebsite):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-bank"></i>',$professor->docentiWebsite,
                				['escape'=>false,'target'=>'_blank','_full'=>true,
                				 'data-toggle'=>"popover", 'data-trigger'=>'hover','data-placement'=>'top', 'title'=>__('Istitutional Website'), 'data-content'=>$professor->docentiWebsite
                		])?>
                	<?php endif; ?>
                	<?php if($professor->email1):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-envelope"></i>','mailto:'.$professor->email1,
                				['escape'=>false,'target'=>'_blank','_full'=>true,
                						'data-toggle'=>"popover", 'data-trigger'=>'hover','data-placement'=>'top', 'title'=>__('Email'), 'data-content'=>$professor->email1
                		])?>
                	<?php endif; ?>
                	<?php if($professor->email2):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-envelope"></i>','mailto:'.$professor->email2,[
                				'escape'=>false,'target'=>'_blank','_full'=>true,
                				'data-toggle'=>"popover", 'data-trigger'=>'hover','data-placement'=>'top', 'title'=>__('Email'), 'data-content'=>$professor->email2
                		])?>
                	<?php endif; ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-fw fa-info-circle"></i>'. __('Details'), ['action' => 'view', $professor->id],['class'=>'btn btn-xs btn-primary','escape'=>false]) ?>
                    <?php if($isAdmin): ?> 
	                    <?= $this->Html->link('<i class="fa fa-fw fa-edit"></i>'.__('Edit'), ['action' => 'edit', $professor->id],['class'=>'btn btn-xs btn-warning','escape'=>false]) ?>
	                    <?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i>'.__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete {0}?', $professor->name),'class'=>'btn btn-xs btn-danger','escape'=>false]) ?>
	                <?php endif;?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
	$('#professorsTable').DataTable({
		"columnDefs": [
			{ "searchable": false, "orderable": false, "targets": [2,3] }
		],
		"drawCallback": function( settings ) {
			$('[data-toggle="popover"]').popover(); 
	    }
	});
});
</script>
