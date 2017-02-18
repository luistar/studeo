<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group">
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $professor->id],['class'=>'btn btn-warning','escape'=>false])?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->name),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?php endif;?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professors'), ['controller' => 'Professors', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="professors">
    <h1 class="page-header"><?= h($professor->name) ?></h1>
    <table class="table">
    	<?php if($professor->website):?>
        <tr>
            <th scope="row"><?= __('Personal Website') ?></th>
            <td><?= $this->Html->link(h($professor->website),h($professor->website),['target'=>'_blank','_isFull'=>'true']) ?></td>
        </tr>
        <?php endif;?>
        <?php if($professor->docentiWebsite):?>
        <tr>
            <th scope="row"><?= __('Istitutional Website') ?></th>
            <td><?= $this->Html->link(h($professor->docentiWebsite),h($professor->docentiWebsite),['target'=>'_blank','_isFull'=>'true']) ?></td>
        </tr>
        <?php endif;?>
        <?php if($professor->email1):?>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= $this->Html->link(h($professor->email1),'mailto:'.h($professor->email1),['target'=>'_blank']) ?></td>
        </tr>
        <?php endif;?>
        <?php if($professor->email2):?>
        <tr>
            <th scope="row"><?= __('Alternative Email') ?></th>
            <td><?= $this->Html->link(h($professor->email2),'mailto:'.h($professor->email1),['target'=>'_blank']) ?></td>
        </tr>
        <?php endif;?>
    </table>
    <?php if($professor->notes):?>
    <div class="">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($professor->notes)); ?>
    </div>
    <?php endif;?>
    
    <h3><?= __("Professorships")?></h3>
    <?php if(!empty($professor->professorships)):?>
    <div class="professorships">
    	<table class="table table-striped table-bordered">
    		<thead>
    			<tr>
		    	 	<th>Course</th>
		    	 	<th>Start Date</th>
		    	 	<th>End Date</th>
		    	 </tr>
    		</thead>
    		<tbody>
	    		<?php foreach($professor->professorships as $professorship): ?>
		    	 	<tr>
		    	 		<td><?=$this->Html->link($professorship->course->name, [
		    	 				'controller'=>'Professorships',
		    	 				'action'=>'view',
		    	 				$professorship->id
		    	 			])?>
		    	 		</td>
		    	 		<td><?=$professorship->start_date?></td>
		    	 		<td><?=$professorship->end_date?></td>
		    	 	</tr>
		    	<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>
    <?php else: ?>
    <div class="alert alert-danger"><p><?= __('There are no professorships linked to this professor.')?></p></div>
    <?php endif; ?>
</div>
