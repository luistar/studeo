<?php
use Cake\Core\Configure;

/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group">
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $course->id],['class'=>'btn btn-warning','escape'=>false])?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete {0}?', $course->name),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Course'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?php endif;?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php endif;?>
</div>


<h1 class="page-header"><?= h($course->name) ?></h1>
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
