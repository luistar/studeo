<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<?php 
	$groups = $course->groups;
	$professorships = [];
	if($groups){
		foreach($groups as $group){
			$professorships = array_merge($professorships, $group->professorships);
		}
	}
	$professors = [];
	$exams = [];
	foreach($professorships as $professorship){
		$professors = array_push($professors, $professorship->professor);
		$exams      = array_merge($exams, $professorship->exams);
	}
	$solutions = [];
	foreach($exams as $exam){
		$solutions  = array_merge($solutions,$exam->solutions);
	}

	$groupsNum = count($groups);
	$examsNum = count($exams);
	$solutionsNum = count($solutions);

?>

  <div class="row">
    <div class="col-sm-12">
      <div class="well panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
            	<?= $this->Html->image('courses/icons/'.$course->picture_path,['alt'=>'Course logo', 'class'=>'center-block img-circle img-thumbnail img-responsive'])?>
            </div>
            <!--/col--> 
            <div class="col-xs-12 col-sm-8">
              <h2><?= $course->name?></h2>
              <p><strong><?=__('Description')?>: </strong> <?= $course->description?> </p>
              <p><strong><?=__('Degree')?>: </strong> <?= $course->has('degree') ? $this->Html->link($course->degree->name, ['controller' => 'Degrees', 'action' => 'view', $course->degree->id]) : '' ?> </p>
            </div>
            <!--/col-->          
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-4">
              <h3><strong> <?= $examsNum ?></strong> </h3>
              <p><small><?= $examsNum==1 ? __('Exam'):__('Exams')?></small></p>
              <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> <?=__('Add exam')?> </button>
            </div>
            <!--/col-->
            <div class="col-xs-12 col-sm-4">
              <h3><strong> <?= $solutionsNum ?> </strong></h3>
              <p><small><?= $solutionsNum==1 ? __('Solution'):__('Solutions')?></small></p>
              <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
            </div>
            <!--/col-->
            <div class="col-xs-12 col-sm-4">
              <h3><strong><?= $groupsNum ?></strong></h3>
              <p><small><?= $groupsNum==1 ? __('Group'):__('Groups')?></small></p>
              <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> <?=__('View groups')?> </button>  
            </div>
            <!--/col-->
          </div>
          <!--/row-->
        </div>
        <!--/panel-body-->
      </div>
      <!--/panel-->
    </div>
    <!--/col--> 
  </div>
  <!--/row--> 
