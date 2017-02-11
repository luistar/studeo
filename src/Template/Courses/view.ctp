<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="row studeo-course-detail">
    <div class="col-md-2">
    	<img class="thumbnail" src="//placehold.it/128x128"></img>
    </div>
    <div class="col-md-10">
	    <h3><?= h($course->name) ?></h3>
	    <table class="vertical-table">
	        <tr>
	            <th scope="row"><?= __('Name') ?></th>
	            <td><?= h($course->name) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Logo') ?></th>
	            <td><?= h($course->logo) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Id') ?></th>
	            <td><?= $this->Number->format($course->id) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Cfu') ?></th>
	            <td><?= $this->Number->format($course->cfu) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Year') ?></th>
	            <td><?= $this->Number->format($course->year) ?></td>
	        </tr>
	    </table>
    </div>
</div>

<div class="related">
	<?= $this->element('professorshipsDisplay',['professorships'=>$course->professorships])?>
</div>

<script>
//this should be moved in its own js file asap TODO
$('.download-button').click(function(event){
	event.stopPropagation(); //we do not want the event to toggle the solution list
	document.location.href = $(this).attr('data-link'); //go to download page
});
</script>
