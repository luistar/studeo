<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="professors view large-9 medium-8 columns content">
    <h3><?= h($professor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($professor->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($professor->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website') ?></th>
            <td><?= h($professor->website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DocentiWebsite') ?></th>
            <td><?= h($professor->docentiWebsite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email1') ?></th>
            <td><?= h($professor->email1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email2') ?></th>
            <td><?= h($professor->email2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($professor->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($professor->notes)); ?>
    </div>
    
    <div class="relations row">
    	<h3><?= __("Relationships")?></h3>
    	<table class="table table-striped table-bordered">
    		<thead>
    			<tr>
		    	 	<th>Id</th>
		    	 	<th>Professor</th>
		    	 	<th>Start Date</th>
		    	 	<th>End Date</th>
		    	 </tr>
    		</thead>
    		<tbody>
	    		<?php foreach($professor->professorships as $professorship): ?>
		    	 	<tr>
		    	 		<td><?=$professorship->id?></td>
		    	 		<td><?=$this->Html->link($professorship->professor->name, [
		    	 				'controller'=>'Professors',
		    	 				'action'=>'view',
		    	 				$professorship->professor->id
		    	 			])?>
		    	 		</td>
		    	 		<td><?=$professorship->start_date?></td>
		    	 		<td><?=$professorship->end_date?></td>
		    	 	</tr>
		    	<?php endforeach; ?>
    		</tbody>
    	</table>
    </div>
</div>
