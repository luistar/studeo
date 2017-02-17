<?php
use Cake\Core\Configure;

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

<h3><?= h($course->name) ?></h3>
<div class="row studeo-course-detail">
    <div class="col-md-2">
    	<?php if(!$course->logo): ?>
    		<?= $this->Html->image(Configure::read('App.courseLogosFolder').'/'.Configure::read('App.courseLogoDefault'), ['class'=>'thumbnail studeo-course-logo']); ?>
    	<?php else: ?>
    		<?= $this->Html->image(Configure::read('App.courseLogosFolder').'/'.$course->logo, ['class'=>'thumbnail studeo-course-logo']); ?>
    	<?php endif; ?>
    </div>
    <div class="col-md-10">
	    <table class="table table-bordered table-striped">
	        <tr>
	            <th scope="row"><?= __('Cfu') ?></th>
	            <td><?= $this->Number->format($course->cfu) ?></td>
	        </tr>
	        <tr>
	            <th scope="row"><?= __('Year') ?></th>
	            <td><?= $this->Number->format($course->year) ?></td>
	        </tr>
	        <?php if($course->description!=0):?>
	        <tr>
	            <th scope="row"><?= __('Description') ?></th>
	            <td><?= h($course->description) ?></td>
	        </tr>
	        <?php endif;?>
	        <?php if($requiredBy->count()!=0):?>
	        <tr>
	            <th scope="row"><?= __('Requires') ?></th>
	            <td>
	            	<?php $count = 0;?>
					<?php foreach($requiredBy as $requiredByCourse):?>
						<?php $count++; ?>
						<?= $this->Html->link(h($requiredByCourse->course->name),['controller'=>'Courses','action'=>'view',$requiredByCourse->course->id])?>
 						<?php if($count < $requiredBy->count()) echo ", ";?>
					<?php endforeach;?>
				</td>
	        </tr>
	        <?php endif; ?>
	        <?php if($requiredFrom->count()!=0):?>
	        <tr>
	            <th scope="row"><?= __('Required by') ?></th>
	            <td>
	            	<?php $count = 0;?>
					<?php foreach($requiredFrom as $requiredFromCourse):?>
						<?php $count++; ?>
						<?= $this->Html->link(h($requiredFromCourse->required->name),['controller'=>'Courses','action'=>'view',$requiredFromCourse->required->id])?>
						<?php if($count < $requiredFrom->count()) echo ", ";?>
					<?php endforeach;?>
				</td>
	        </tr>
	        <?php endif; ?>
	    </table>
    </div>
</div>

<div class="related">
	<h3><?= __('Professorships')?></h3>
	<?= $this->element('professorshipsDisplay',['professorships'=>$course->professorships])?>
</div>
